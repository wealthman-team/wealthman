<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewLike;
use App\Models\ReviewType;
use App\Models\RoboAdvisor;
use App\Models\User;
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

        $validation = Validator::make(['comment' => $request->comment], ['comment' => 'required|string|min:10'], Review::messages(), Review::attributes());
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

            //checked review
            $todayReview = Review::where('robo_advisor_id', $roboAdvisor->id)
                ->where('user_id', $user->id)->get();

            if (count($todayReview) > 0) {
                return response()->json(['error' => 'Unfortunately, you can\'t have more than one review. Thank you for leaving a review.'], 200);
            }

            $review->save();

            return response()->json(['success' => 'Thank you your review was successfully added and is awaiting moderation.'], 200);
        }

        return response()->json(['error' => $error], 200);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function like(Request $request)
    {
        if (!Auth::user()) {
            return response()->json(['error' => 'User not authorized.'], 200);
        }
        $request_like = (bool)$request->like;
        $request_review = (int)$request->review;
        if ($request_review > 0) {
            $like = ReviewLike::where(['review_id' => $request_review, 'user_id' => Auth::user()->id ]);
            if ($like->get()->count() === 0) {
                $like = new ReviewLike;
                $like->review_id = $request_review;
                $like->user_id = Auth::user()->id;
                $like->like = $request_like;
                $like->save();
            } elseif((bool) $like->get()->first()->like === $request_like) {
                $like->delete();
            } else {
                $like->update(['like' => $request_like]);
            }

            $like_count = 0;
            $dislike_count = 0;
            $likes = ReviewLike::where(['review_id' => $request_review])->get();
            foreach ($likes as $item) {
                if ($item->like){
                    $like_count++;
                } else {
                    $dislike_count++;
                }
            }

            return response()->json(['success' => ['like'=> $like_count, 'dislike' => $dislike_count]], 200);
        }

        return response()->json(['error' => 'The data provided is corrupted'], 200);
    }
}
