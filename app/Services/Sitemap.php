<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\RoboAdvisor;
use Spatie\Sitemap\Sitemap as SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class Sitemap
{
    public static function generate()
    {
        $sitemap = SitemapGenerator::create()
            ->add(Url::create(route('home', [], false))->setPriority(1.0))
            ->add(Url::create(route('roboAdvisors', [], false))->setPriority(0.9))
            ->add(Url::create(route('roboAdvisorsCompare', [], false))->setPriority(0.9))
            ->add(Url::create(route('blog.index', [], false))->setPriority(0.9))
        ;
        Category::all()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create(route('blog.category', $category->slug, false))->setPriority(0.9));
        });

        // priority 0.8
        Post::published()->each(function (Post $post) use ($sitemap) {
            $sitemap->add(Url::create(route('blog.show', $post->slug, false))->setPriority(0.8));
        });
        RoboAdvisor::all()->each(function (RoboAdvisor $roboAdvisor) use ($sitemap) {
            $sitemap->add(Url::create(route('roboAdvisorsShow', $roboAdvisor->slug, false))->setPriority(0.8));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return static::class;
    }
}