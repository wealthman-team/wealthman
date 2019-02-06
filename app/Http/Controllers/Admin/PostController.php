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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        Page::setTitle('Posts | Wealthman', $request->input('page'));
        Page::setDescription('Posts list', $request->input('page'));

        $posts = Post::paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Page::setTitle('Add New Post | Wealthman');
        Page::setDescription('Add New Post | Wealthman');

        return view('admin.posts.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(Post::rules(), Post::messages(), Post::attributes());

        Post::create($request->all());

        return redirect()
            ->route('admin.posts.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        Page::setTitle('Show Post | Wealthman');
        Page::setDescription('Show Post | Wealthman');

        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        Page::setTitle('Edit Post | Wealthman');
        Page::setDescription('Edit Post | Wealthman');

        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(Post::rules(), Post::messages(), Post::attributes());

        $post->slug = null;
        $post->fill($request->all());

        if ($post->save()) {
            return redirect()
                ->route('admin.posts.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successUpdate']);
        } else {
            return back()
                ->withInput()
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorUpdate']);
        }
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return redirect()
                ->route('admin.posts.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.posts.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorDelete']);
        }
    }
}
