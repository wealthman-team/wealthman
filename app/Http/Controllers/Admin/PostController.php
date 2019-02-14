<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use App\Models\Tag;
use Auth;
use Carbon\Carbon;
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
        'successImageDelete' => 'Image success delete',
        'successImageSelected' => 'Image success selected',
        'errorDelete' => 'Delete error post',
    );

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        Page::setTitle('Posts | Wealthman');
        Page::setDescription('Posts list');

        $posts = Post::latestPosts()->paginate(10);

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

        $post = new Post;
        $post->title = $request->{'title'};
        $post->content = $request->{'content'};
        $post->content_html = $request->{'content_html'};
        $post->published = $request->has('published');
        $post->published_at = Carbon::now();
        $post->redirect_url = $request->{'redirect_url'};
        $post->user_id = Auth::user()->id;
        //SEO
        $post->seo_title = $request->{'seo_title'};
        $post->seo_description = $request->{'seo_description'};
        $post->seo_keywords = $request->{'seo_keywords'};

        $post->save();

        $post->categories()->sync(isset($request->categories) ? $request->categories : []);
        $post->tags()->sync(isset($request->tags) ? $request->tags : []);

        $this->addImageToCollection($request, $post);

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
            'is_robo_advisor' => (bool) $post->roboAdvisor,
            'postImages' => $post->getMedia('images'),
            'postGallery' => $post->getMedia('gallery'),
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

        if ($request->has('slug') && !empty($request->slug)) {
            $post->slug = $request->slug;
        }
        $post->title = $request->{'title'};
        $post->content = $request->{'content'};
        $post->content_html = $request->{'content_html'};
        $post->published = $request->has('published');
        $post->redirect_url = $request->{'redirect_url'};
        //SEO
        $post->seo_title = $request->{'seo_title'};
        $post->seo_description = $request->{'seo_description'};
        $post->seo_keywords = $request->{'seo_keywords'};

        $post->save();
        if(!$request->has('disabled_categories')) {
            $post->categories()->sync(isset($request->categories) ? $request->categories : []);
        }
        $post->tags()->sync(isset($request->tags) ? $request->tags : []);

        $this->addImageToCollection($request, $post);

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
        $roboAdvisor = $post->roboAdvisor;
        if ($roboAdvisor) {
            $roboAdvisor->post_id = null;
            $roboAdvisor->save();
        }
        // remove media
        $post->clearMediaCollection();
        // remove entity
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

    public function imageDownload(Request $request)
    {
        $mediaItem = Media::whereId((int) $request->download_image)->firstOrFail();

        return $mediaItem;
    }

    public function imageRemove(Request $request)
    {
        $mediaItem = Media::whereId((int) $request->removed_image)->firstOrFail();

        $mediaItem->delete();

        return redirect()->back()
            ->with('statusType', 'success')
            ->with('status', $this->messages['successImageDelete']);
    }

    public function imageSelect(Request $request)
    {
        $mediaItem = Media::whereId((int) $request->selected_image)->firstOrFail();
        $post = Post::whereId((int) $mediaItem->model_id)->firstOrFail();
        $images = $post->getMedia('images');
        foreach ($images as $old_image) {
            $old_image->collection_name = 'gallery';
            $old_image->save();
        }

        $mediaItem->collection_name = 'images';
        $mediaItem->save();

        return redirect()->back()
            ->with('statusType', 'success')
            ->with('status', $this->messages['successImageSelected']);
    }

    private function addImageToCollection(Request $request, Post $post)
    {
        $image = $request->file('image');
        if ($image) {
            $images = $post->getMedia('images');
            /** @var Media $image */
            foreach ($images as $old_image) {
                $old_image->collection_name = 'gallery';
                $old_image->save();
            }
            $name = $image->getClientOriginalName();
            $post->addMedia($image)
                ->usingName($name)
                ->toMediaCollection('images');
        }
    }
}
