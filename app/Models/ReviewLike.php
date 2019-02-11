<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReviewLike
 *
 * @property int $id
 * @property int|null $like
 * @property int $review_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Review $review
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike whereLike($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewLike whereUserId($value)
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
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
