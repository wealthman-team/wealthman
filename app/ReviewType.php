<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ReviewType
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ReviewType whereUpdatedAt($value)
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
        return $this->hasMany('App\Review');
    }
}
