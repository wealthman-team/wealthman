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
     */
    public function index(Request $request)
    {
        Page::setTitle('Tags | Wealthman', $request->input('page'));
        Page::setDescription('Tags list', $request->input('page'));

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
     * @param Tag $tag
     */
    public function show(Tag $tag)
    {
        dd('show');
    }

    /**
     * @param Tag $tag
     */
    public function edit(Tag $tag)
    {
        dd('edit');
    }

    /**
     * @param Request $request
     * @param Tag $tag
     */
    public function update(Request $request, Tag $tag)
    {
        dd('update');
    }

    /**
     * @param Tag $tag
     */
    public function destroy(Tag $tag)
    {
        dd('destroy');
    }
}
