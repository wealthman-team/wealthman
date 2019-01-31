<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Rating
 *
 * @property int $id
 * @property float $commissions
 * @property float $service
 * @property float $comfortable
 * @property float $tools
 * @property float $investment_options
 * @property float $asset_allocation
 * @property float $total
 * @property int $robo_advisor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\RoboAdvisor $roboAdvisor
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereAssetAllocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereComfortable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereCommissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereInvestmentOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereRoboAdvisorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereTools($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rating whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        return $this->belongsTo('App\RoboAdvisor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
