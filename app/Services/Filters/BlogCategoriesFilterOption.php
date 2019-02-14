<?php
namespace App\Services\Filters;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoriesFilterOption
{
    /**
     * @var array
     */
    private $filter_option = [];
    /**
     * @var Category|null
     */
    private $category;

    /**
     * BlogCategoriesFilterOption constructor.
     * @param Category|null $category
     */
    public function __construct(Category $category = null)
    {
        $this->category = $category;
        $this->filter_option = $this->setFilterOption();
    }

    public function get()
    {
        return $this->filter_option;
    }

    /**
     * @return array
     */
    public function setFilterOption()
    {
        $filters = [];
        $posts =  Post::published()->get();
        $all_count = $posts->count();
        if ($all_count > 0) {
            $filters[] = [
                'name' => 'All Articles',
                'count' => $all_count,
                'show_count' => false,
                'url' => route('blog.index'),
                'active' => !$this->category
            ];
            $categories = Category::withPublishedPosts()->get();
            /** @var Category $category */
            foreach ($categories as $category) {
                $filters[] = [
                    'name' => $category->name,
                    'count' => $category->posts->count(),
                    'show_count' => true,
                    'url' => route('blog.category', $category->slug),
                    'active' => $this->category && $this->category->id === $category->id
                ];
            }
        }

        return $filters;
    }
}
