<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReviewType
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Review[] $reviews
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ReviewType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReviewType extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
