<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $hidden = [
        'robo_advisor_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'commissions',
        'service',
        'comfortable',
        'tools',
        'investment_options',
        'asset_allocation',
        'total',
    ];

    public function roboAdvisor()
    {
        return $this->belongsTo(RoboAdvisor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
