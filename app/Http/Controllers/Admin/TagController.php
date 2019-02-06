<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sources\Page;

class TagController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Tag success added',
        'successUpdate' => 'Tag success updated',
        'errorUpdate' => 'Error tag save',
        'successDelete' => 'Tag success delete',
        'errorDelete' => 'Delete error tag',
    );

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        Page::setTitle('Tags | Wealthman', $request->input('page'));
        Page::setDescription('Tags list', $request->input('page'));

        $tags = Tag::paginate(10);

        return view('admin.tags.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Page::setTitle('Add new Tag | Wealthman');
        Page::setDescription('Add new Tag | Wealthman');

        return view('admin.tags.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(Tag::rules(), Tag::messages(), Tag::attributes());

        Tag::create($request->all());

        return redirect()
            ->route('admin.tags.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Tag $tag)
    {
        Page::setTitle('Show Tag | Wealthman');
        Page::setDescription('Show Tag | Wealthman');

        return view('admin.tags.show', [
            'tag' => $tag
        ]);
    }

    /**
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Tag $tag)
    {
        Page::setTitle('Edit Tag | Wealthman');
        Page::setDescription('Edit Tag | Wealthman');

        return view('admin.tags.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * @param Request $request
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(Tag::rules(), Tag::messages(), Tag::attributes());

        $tag->slug = null;
        $tag->fill($request->all());

        if ($tag->save()) {
            return redirect()
                ->route('admin.tags.index')
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
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            return redirect()
                ->route('admin.tags.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.tags.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorDelete']);
        }
    }
}
