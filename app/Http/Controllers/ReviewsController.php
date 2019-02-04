<?php

namespace App\Http\Controllers;

use App\Review;
use App\ReviewType;
use App\RoboAdvisor;
use App\User;
use Auth;
use Illuminate\Http\Request;
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(['error' => 'User not authorized.'], 200);
        }

        $validation = Validator::make(['comment' => $request->comment], ['comment' => 'required|string'], Review::messages(), Review::attributes());
        $error = $validation->messages()->first();
        if ($validation->passes()) {

            $user = User::whereId(Auth::user()->id)->firstOrFail();

            $review = new Review;
            $review->comment = $request->comment;

            $roboAdvisor = RoboAdvisor::whereId($request->robo_advisor)->firstOrFail();
            $reviewType = ReviewType::whereId($request->review_type)->firstOrFail();

            $review->roboAdvisor()->associate($roboAdvisor);
            $review->reviewType()->associate($reviewType);
            $review->user()->associate($user);

//            //checked review
//            $todayReview = Review::where('robo_advisor_id', $roboAdvisor->id)
//                ->where('user_id', $user->id)->get();
//
//            if (count($todayReview) > 0) {
//                return response()->json(['error' => 'Unfortunately, you can\'t have more than one review. Thank you for leaving a review.'], 200);
//            }

            $review->save();

            return response()->json(['success' => 'Thank you your review was successfully added and is awaiting moderation.'], 200);
        }

        return response()->json(['error' => $error], 200);
    }
}
