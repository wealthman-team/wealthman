<?php
namespace App;

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
        'comment',
        'rating'
    ];

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

    // Scopes
    // ....
}
