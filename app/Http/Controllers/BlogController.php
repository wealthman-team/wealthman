<?php
namespace App\Http\Controllers;


use App\Models\Post;
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
}