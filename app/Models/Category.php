<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'blog_categories';

    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
