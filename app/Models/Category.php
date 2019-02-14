<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 * @property string|null $description
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category withPublishedPosts()
 */
class Category extends Model
{
    use Sluggable;

    protected $table = 'blog_categories';
    protected $fillable = [
        'name',
        'description',
        'seo_title',
        'seo_description',
        'seo_keywords',
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
            'description' => 'nullable|string',
            //seo
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:200',
            'seo_keywords' => 'nullable|string|max:250',
        ];
    }

    /**
     * @return array
     */
    public static function attributes()
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
            'seo_title' => 'SEO Title',
            'seo_description' => 'SEO Description',
            'seo_keywords' => 'SEO Keywords',
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
            'max' => 'Max length field :attribute must to be low :max symbols',
        ];
    }

    // Relationships
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'blog_posts_categories');
    }

    //
    // Scopes
    //
    public function scopeWithPublishedPosts(Builder $query)
    {
        return $query->whereHas('posts', function ($q) {
            return $q->published();
        })->with(['posts' => function ($q) {
            return $q->published();
        }]);
    }
}
