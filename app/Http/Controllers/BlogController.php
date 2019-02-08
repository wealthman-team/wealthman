<?php
namespace App\Http\Controllers;


use App\Models\Post;
use App\Models\RoboAdvisor;
use App\Sources\Page;
use Illuminate\Http\Request;

class BlogController
{
    public function index(Request $request)
    {
        Page::setTitle('Blog | Wealthman', $request->input('page'));
        Page::setDescription('Blog list', $request->input('page'));

        $posts = Post::published()->latest()->paginate(7);
        return view('blog.index', [
            'posts' => $posts
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
        $popularPosts = Post::popular(3)->exclude($post->id)->get();

        return view('blog.show', [
            'post' => $post,
            'popularRoboAdvisors' => $popularRoboAdvisors,
            'popularPosts' => $popularPosts,
        ]);
    }
}