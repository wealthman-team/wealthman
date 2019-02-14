<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rating
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
 * @property-read \App\Models\RoboAdvisor $roboAdvisor
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereAssetAllocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereComfortable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereCommissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereInvestmentOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereRoboAdvisorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereTools($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Rating whereUpdatedAt($value)
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
        return $this->belongsTo(RoboAdvisor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
