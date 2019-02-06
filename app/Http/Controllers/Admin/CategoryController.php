<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sources\Page;

class CategoryController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Category success added',
        'successUpdate' => 'Category success updated',
        'errorUpdate' => 'Error category save',
        'successDelete' => 'Category success delete',
        'errorDelete' => 'Delete error category',
    );

    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        Page::setTitle('Categories | Wealthman', $request->input('page'));
        Page::setDescription('Categories list', $request->input('page'));

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
     * @param Category $category
     */
    public function show(Category $category)
    {
        dd('show');
    }

    /**
     * @param Category $category
     */
    public function edit(Category $category)
    {
        dd('edit');
    }

    /**
     * @param Request $request
     * @param Category $category
     */
    public function update(Request $request, Category $category)
    {
        dd('update');
    }

    /**
     * @param Category $category
     */
    public function destroy(Category $category)
    {
        dd('destroy');
    }
}
