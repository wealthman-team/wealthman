<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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

        return view('admin.posts.create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(Post::rules(), Post::messages(), Post::attributes());

        $post = Post::create($request->all());

        $post->categories()->sync(isset($request->categories) ? $request->categories : []);
        $post->tags()->sync(isset($request->tags) ? $request->tags : []);

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
            'post' => $post,
            'categoriesID' => $post->categories->pluck('id')->toArray(),
            'tagsID' => $post->tags->pluck('id')->toArray(),
            'categories' => Category::all(),
            'tags' => Tag::all(),
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

        $post->save();

        $post->categories()->sync(isset($request->categories) ? $request->categories : []);
        $post->tags()->sync(isset($request->tags) ? $request->tags : []);

        return redirect()
            ->route('admin.posts.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successUpdate']);
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
