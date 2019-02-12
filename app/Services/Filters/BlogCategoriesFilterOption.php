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
     * @var Collection|null
     */
    private $posts;

    /**
     * BlogCategoriesFilterOption constructor.
     * @param Category|null $category
     * @param Collection|null $posts
     */
    public function __construct(Category $category = null, Collection $posts = null)
    {
        $this->category = $category;
        $this->posts = $posts;
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
        $posts =  $this->posts ?? Post::published()->get();
        $posts_ids =  $posts->keyBy('id')->toArray();
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
                $postsCount = $category->posts->filter(function (Post $value) use ($posts_ids) {
                    return array_key_exists($value->{'id'}, $posts_ids);
                })->count();

                if ($postsCount > 0) {
                    $filters[] = [
                        'name' => $category->name,
                        'count' => $postsCount,
                        'show_count' => true,
                        'url' => route('blog.category', $category->slug),
                        'active' => $this->category && $this->category->id === $category->id
                    ];
                }
            }
        }

        return $filters;
    }
}
