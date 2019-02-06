<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string $slug
 * @property string|null $content
 * @property string|null $content_html
 * @property string|null $published_at
 * @property int $published
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContentHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    use Sluggable;

    protected $table = 'blog_posts';
    protected $fillable = [
        'title',
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
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return array
     */
    public static function rules()
    {
        return [
            'title' => 'required|string|max:255',
        ];
    }

    /**
     * @return array
     */
    public static function attributes()
    {
        return [
            'title' => 'Title',
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}