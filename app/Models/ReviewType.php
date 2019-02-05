<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
