<?php
namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\RoboAdvisor;
use App\Services\Filters\BlogCategoriesFilterOption;
use App\Sources\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BlogController
{
    public function index(Request $request)
    {
        Page::setTitle('Blog | Wealthman');
        Page::setDescription('Blog list');

        $posts = Post::published()->latestPosts()->paginate(6);
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

        $posts = Post::published()->withCategory($category)->latestPosts()->paginate(6);
        $blogCategoriesFilterOption = (new BlogCategoriesFilterOption($category))->get();

        return view('blog.category', [
            'category' => $category,
            'posts' => $posts,
            'filtersOption' => $blogCategoriesFilterOption,
        ]);
    }

    public function search(Request $request)
    {
        Page::setTitle('Search | Wealthman');
        Page::setDescription('Search result page | Wealthman');


        $search = null;
        $posts = [];
        $blogCategoriesFilterOption = [];
        if ($request->has('q')) {
            $search = $request->input('q');
            $posts = Post::published()->latestPosts()->whereRaw('(
                title LIKE "%'.$request->input('q').'%" OR
                content LIKE "%'.$search.'%" OR
                content_html LIKE "%'.$search.'%"
            )');
            $posts = $posts->paginate(6)->appends(Input::except('page'));
            $blogCategoriesFilterOption = (new BlogCategoriesFilterOption())->get();
        }


        return view('blog.search', [
            'posts' => $posts,
            'filtersOption' => $blogCategoriesFilterOption,
            'search' => $search,
        ]);
    }

    public function show(Request $request, $slug)
    {
        /** @var Post $roboAdvisor */
        $post = Post::whereSlug($slug)->firstOrFail();
        if (!empty($post->redirect_url)) {

            return redirect($post->redirect_url);
        }
        Page::setTitle(!empty($post->seo_title) ? $post->seo_title : $post->title.' | Wealthman');
        Page::setDescription(!empty($post->seo_description) ? $post->seo_description : $post->content);
        Page::setKeywords(!empty($post->seo_keywords) ? $post->seo_keywords : '');

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