<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
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
 * @property-read \App\Models\User $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post published()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post latest()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post exclude($exclude = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post popular($limit = 3)
 * @property string|null $redirect_url
 * @property-read \App\Models\RoboAdvisor $roboAdvisor
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post latestPosts()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereRedirectUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post withCategory(\App\Models\Category $category)
 */
class Post extends Model implements HasMedia
{
    use HasMediaTrait;
    use Sluggable;

    protected $table = 'blog_posts';
    protected $fillable = [
        'title',
        'content',
        'content_html',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'redirect_url'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Manipulations::FIT_CROP, 150, 150);

        $this->addMediaConversion('big')
            ->fit(Manipulations::FIT_CROP, 934, 594);

        $this->addMediaConversion('medium')
            ->fit(Manipulations::FIT_CROP, 605, 385);

        $this->addMediaConversion('small')
            ->fit(Manipulations::FIT_CROP, 384, 244);
    }

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
            'content' => 'required|string',
            'content_html' => 'required|string',
            'redirect_url' => 'nullable|string|max:255',
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
            'title' => 'Title',
            'content' => 'Short Content',
            'content_html' => 'Content',
            'redirect_url' => 'Redirect Url',
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
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_posts_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_posts_tags');
    }

    public function roboAdvisor()
    {
        return $this->hasOne(RoboAdvisor::class);
    }

    //
    // Scopes
    //
    public function scopePublished(Builder $query)
    {
        return $query
            ->whereNotNull('blog_posts.published')
            ->where('blog_posts.published', true)
            ->whereNotNull('blog_posts.published_at')
            ->where('blog_posts.published_at', '<', Carbon::now())
            ;
    }

    public function scopeLatestPosts(Builder $query)
    {
        return $query->orderBy('blog_posts.published_at', 'desc')->orderBy('blog_posts.id', 'desc');
    }

    /**
     * @param Builder $query
     * @param int $limit
     * @return mixed
     */
    public function scopePopular(Builder $query, int $limit = 3)
    {
        return $query->orderBy('blog_posts.published_at', 'desc')->limit($limit);
    }

    /**
     * @param Builder $query
     * @param null $exclude
     * @return mixed
     */
    public function scopeExclude(Builder $query, $exclude = null)
    {
        if ($exclude !== null) {
            $exclude = is_array($exclude) ? $exclude : [(int) $exclude];
        }

        return $exclude ? $query->whereNotIn('blog_posts.id', $exclude) : $query;
    }

    /**
     * @param Builder $query
     * @param Category $category
     * @return Builder
     */
    public function scopeWithCategory(Builder $query, Category $category)
    {
        return $query->whereHas('categories', function ($q) use($category) {
            return $q->where('blog_categories.id', $category->id);
        });
    }
}