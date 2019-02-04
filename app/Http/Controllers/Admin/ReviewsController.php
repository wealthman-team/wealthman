<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use App\ReviewType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sources\Page;
use Validator;

class ReviewsController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Reviews success added',
        'successUpdate' => 'Reviews success updated',
        'errorUpdate' => 'Save error reviews',
        'successDelete' => 'Reviews success delete',
        'errorDelete' => 'Delete error reviews',
    );

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Page::setTitle('Reviews | Wealthman', $request->input('page'));
        Page::setDescription('Reviews list', $request->input('page'));

        $reviews = Review::orderBy('created_at', 'DESC')->paginate(10);

        return view('admin.reviews.index', [
            'reviews' => $reviews,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('admin.reviews.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        Page::setTitle('Show Review | Wealthman');
        Page::setDescription('Show Review | Wealthman');

        $reviewTypes = ReviewType::all();

        return view('admin.reviews.show', [
            'review' => $review,
            'reviewTypes' => $reviewTypes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        Page::setTitle('Edit Review | Wealthman');
        Page::setDescription('Edit Review | Wealthman');

        $reviewTypes = ReviewType::all();

        return view('admin.reviews.edit', [
            'review' => $review,
            'reviewTypes' => $reviewTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $validation = Validator::make(['comment' => $request->comment], ['comment' => 'required|string'], Review::messages(), Review::attributes());
        $errors = $validation->messages();
        if ($validation->passes()) {
            $reviewType = ReviewType::whereId($request->review_type)->firstOrFail();

            $review->reviewType()->associate($reviewType);
            $review->is_active = $request->has('is_active');
            $review->comment = $request->comment;

            if ($review->save()) {
                return redirect()
                    ->route('admin.reviews.index')
                    ->with('statusType', 'success')
                    ->with('status', $this->messages['successUpdate']);
            } else {
                return back()
                    ->withInput()
                    ->with('statusType', 'error')
                    ->with('status', $this->messages['errorUpdate']);
            }
        }
        return back()
            ->withInput()
            ->with('errors', $errors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        if ($review->delete()) {
            return redirect()
                ->route('admin.reviews.index')
                ->with('statusType', 'success')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.reviews.index')
                ->with('statusType', 'error')
                ->with('status', $this->messages['errorDelete']);
        }
    }
}
