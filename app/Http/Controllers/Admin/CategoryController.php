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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        Page::setTitle('Categories | Wealthman', $request->input('page'));
        Page::setDescription('Categories list', $request->input('page'));

        $categories = Category::paginate(10);

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        Page::setTitle('Add new Category | Wealthman');
        Page::setDescription('Add new Category | Wealthman');

        return view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(Category::rules(), Category::messages(), Category::attributes());

        Category::create($request->only(['name','description','seo_title','seo_description','seo_keywords']));

        return redirect()
            ->route('admin.categories.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Category $category)
    {
        Page::setTitle('Show Category | Wealthman');
        Page::setDescription('Show Category | Wealthman');

        return view('admin.categories.show', [
            'category' => $category
        ]);
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        Page::setTitle('Edit Category | Wealthman');
        Page::setDescription('Edit Category | Wealthman');

        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(Category::rules(), Category::messages(), Category::attributes());

        $category->slug = null;
        $category->fill($request->only(['name','description','seo_title','seo_description','seo_keywords']));

        if ($category->save()) {
            return redirect()
                ->route('admin.categories.index')
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
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()
                ->route('admin.categories.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.categories.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['errorDelete']);
        }
    }
}
