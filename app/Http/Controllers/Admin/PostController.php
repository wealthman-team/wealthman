<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sources\Page;

class PostController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Post success added',
        'successUpdate' => 'Post success updated',
        'errorUpdate' => 'Error post save',
        'successDelete' => 'Post success delete',
        'errorDelete' => 'Delete error post',
    );

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        Page::setTitle('Posts | Wealthman', $request->input('page'));
        Page::setDescription('Posts list', $request->input('page'));

        dd('index');
    }

    /**
     *
     */
    public function create()
    {
        dd('create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        dd('store');
    }

    /**
     * @param Post $post
     */
    public function show(Post $post)
    {
        dd('show');
    }

    /**
     * @param Post $post
     */
    public function edit(Post $post)
    {
        dd('edit');
    }

    /**
     * @param Request $request
     * @param Post $post
     */
    public function update(Request $request, Post $post)
    {
        dd('update');
    }

    /**
     * @param Post $post
     */
    public function destroy(Post $post)
    {
        dd('destroy');
    }
}
