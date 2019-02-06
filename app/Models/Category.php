<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use Sluggable;

    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    /**
     * @return array
     */
    public static function attributes()
    {
        return [
            'name' => 'Name',
        ];
    }

    /**
     * @return array
     */
    public static function messages()
    {
        return [
            'required' => 'Field :attribute is required',
            'string' => 'Field :attribute must to be string',
            'max' => 'Max length field :attribute must to be low 255 symbols',
        ];
    }

    // Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
