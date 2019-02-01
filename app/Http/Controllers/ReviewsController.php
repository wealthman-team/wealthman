<?php

namespace App\Http\Controllers;

use App\Review;
use App\ReviewType;
use App\RoboAdvisor;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    protected $messages = array(
        'successAdd' => 'Reviews success added',
        'successUpdate' => 'Reviews success updated',
        'errorUpdate' => 'Save error reviews',
        'successDelete' => 'Reviews success delete',
        'errorDelete' => 'Delete error reviews',
    );

    public function __construct()
    {
        $this->middleware('guest:web')->except('store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Review::rules(), Review::messages(), Review::attributes());


        $review = new Review;
        $review->comment = $request->comment;

        $roboAdvisor = RoboAdvisor::whereId($request->robo_advisor)->firstOrFail();
        $review->roboAdvisor()->associate($roboAdvisor);

        $user = User::whereId(Auth::user()->id)->firstOrFail();
        $review->user()->associate($user);

        $reviewType = ReviewType::whereId($request->review_type)->firstOrFail();
        $review->reviewType()->associate($reviewType);

        //checked review
        $todayReview = Review::whereDate('created_at', '>', Carbon::now()->subDays(1))
            ->where('robo_advisor_id', $roboAdvisor->id)
            ->where('user_id', $user->id)->get();

        if (count($todayReview) > 0) {
            return redirect()
                ->route('roboAdvisorsShow', $roboAdvisor->slug)
                ->with('reviews_status', 'Today you have already left a review');
        }

        $review->save();

        return redirect()
            ->route('roboAdvisorsShow', $roboAdvisor->slug)
            ->with('reviews_status', $this->messages['successAdd']);
    }
}
