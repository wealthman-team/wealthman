<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * App\Models\MediaLibrary
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MediaLibrary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MediaLibrary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MediaLibrary query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MediaLibrary whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MediaLibrary whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\MediaLibrary whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MediaLibrary extends Model implements HasMedia
{
    use HasMediaTrait;

    /**
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(350)
              ->height(250);
    }
}
