<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Review
 *
 * @property int $id
 * @property string|null $comment
 * @property int $is_active
 * @property int $review_type_id
 * @property int $robo_advisor_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReviewLike[] $likes
 * @property-read \App\Models\ReviewType $reviewType
 * @property-read \App\Models\RoboAdvisor $roboAdvisor
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereReviewTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereRoboAdvisorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereUserId($value)
 * @mixin \Eloquent
 */
class Review extends Model
{
    protected $hidden = [
        'review_type_id',
        'robo_advisor_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment'
    ];

    public static function rules()
    {
        return [
            'comment' => 'required|string|min:10',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public static function messages()
    {
        return [
            'required' => 'Field :attribute is required',
            'string' => 'Field :attribute must to be string',
            'max' => 'Max length field :attribute must to be low 255 symbols',
            'min' => 'Min length field :attribute must be at least 10 symbols',
        ];
    }

    public static function attributes()
    {
        return [
            'comment' => 'comment',
            'review_type' => 'Review type',
            'robo_advisor' => 'Robo advisor',
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roboAdvisor()
    {
        return $this->belongsTo(RoboAdvisor::class);
    }

    public function reviewType()
    {
        return $this->belongsTo(ReviewType::class);
    }

    public function likes()
    {
        return $this->hasMany(ReviewLike::class);
    }

    // Scopes
    // ....
}
