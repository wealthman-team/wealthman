<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\MediaLibrary;
use App\Sources\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MediaLibraryController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Media file success added',
        'successDelete' => 'Media file success delete'
    );

    /**
     * Return the media library.
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        Page::setTitle('Media Library | Wealthman');
        Page::setDescription('Media Library list');

        $media = MediaLibrary::first()->media()->paginate(10);

        return view('admin.media.index', [
            'media' => $media
        ]);
    }

    /**
     * Display the specified resource.
     * @param Media $medium
     * @return Media
     */
    public function show(Media $medium): Media
    {
        return $medium;
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return View
     */
    public function create(Request $request): View
    {
        Page::setTitle('Media Library Create | Wealthman');
        Page::setDescription('Media Library Create');

        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $image = $request->file('image');
        $name = $image->getClientOriginalName();

        if ($request->filled('name')) {
            $name = $request->input('name');
        }

        MediaLibrary::first()
            ->addMedia($image)
            ->usingName($name)
            ->toMediaCollection();

        return redirect()->route('admin.media.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Media $medium
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Media $medium): RedirectResponse
    {
        $medium->delete();

        return redirect()->route('admin.media.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successDelete']);
    }
}
