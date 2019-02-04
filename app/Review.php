<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Review
 *
 * @property int $id
 * @property string|null $comment
 * @property int $is_active
 * @property int $review_type_id
 * @property int $robo_advisor_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\ReviewType $reviewType
 * @property-read \App\RoboAdvisor $roboAdvisor
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereReviewTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereRoboAdvisorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Review whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ReviewLike[] $likes
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
        return $this->belongsTo('App\User');
    }

    public function roboAdvisor()
    {
        return $this->belongsTo('App\RoboAdvisor');
    }

    public function reviewType()
    {
        return $this->belongsTo('App\ReviewType');
    }

    public function likes()
    {
        return $this->hasMany('App\ReviewLike');
    }

    // Scopes
    // ....
}
