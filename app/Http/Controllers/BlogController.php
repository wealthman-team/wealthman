<?php
namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\RoboAdvisor;
use App\Services\Filters\BlogCategoriesFilterOption;
use App\Sources\Page;
use Illuminate\Http\Request;

class BlogController
{
    public function index(Request $request)
    {
        Page::setTitle('Blog | Wealthman');
        Page::setDescription('Blog list');

        $posts = Post::published()->latest()->paginate(6);
        $blogCategoriesFilterOption = (new BlogCategoriesFilterOption())->get();

        return view('blog.index', [
            'posts' => $posts,
            'filtersOption' => $blogCategoriesFilterOption,
        ]);
    }

    public function category(Request $request, $slug)
    {
        /** @var Category $category */
        $category = Category::whereSlug($slug)->firstOrFail();
        Page::setTitle(!empty($category->seo_title) ? $category->seo_title : $category->name.' | Wealthman');
        Page::setDescription(!empty($category->seo_description) ? $category->seo_description : $category->name);
        Page::setKeywords(!empty($category->seo_keywords) ? $category->seo_keywords : '');

        $posts = Post::published()->withCategory($category)->latest()->paginate(6);
        $blogCategoriesFilterOption = (new BlogCategoriesFilterOption($category))->get();

        return view('blog.category', [
            'category' => $category,
            'posts' => $posts,
            'filtersOption' => $blogCategoriesFilterOption,
        ]);
    }

    public function show(Request $request, $slug)
    {
        /** @var Post $roboAdvisor */
        $post = Post::whereSlug($slug)->firstOrFail();
        Page::setTitle($post->title . ' | Wealthman');
        Page::setDescription($post->content);

        // популярные Robo Advisors
        $popularRoboAdvisors = RoboAdvisor::popular(3)->get();
        // популярные Posts
        $popularPosts = Post::published()->popular(3)->exclude($post->id)->get();

        return view('blog.show', [
            'post' => $post,
            'popularRoboAdvisors' => $popularRoboAdvisors,
            'popularPosts' => $popularPosts,
        ]);
    }
}