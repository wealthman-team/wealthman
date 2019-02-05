<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
