<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ReviewLike
 *
 * @property int $id
 * @property int|null $like
 * @property int $review_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Review $review
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike whereLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewLike whereUserId($value)
 * @mixin \Eloquent
 */
class ReviewLike extends Model
{
    protected $hidden = [
        'review_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['like'];

    public function review()
    {
        return $this->belongsTo('App\Review');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
