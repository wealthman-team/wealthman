<?php
namespace App\Services;

use App\RoboAdvisor;
use Spatie\Sitemap\Sitemap as SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class Sitemap
{
    public static function generate()
    {
        $sitemap = SitemapGenerator::create()
            ->add(Url::create(route('home', [], false))->setPriority(1.0))
            ->add(Url::create(route('roboAdvisors', [], false))->setPriority(0.9))
            ->add(Url::create(route('roboAdvisorsCompare', [], false))->setPriority(0.9));

        RoboAdvisor::all()->each(function (RoboAdvisor $roboAdvisor) use ($sitemap) {
            $sitemap->add(Url::create(route('roboAdvisorsShow', $roboAdvisor->slug, false))->setPriority(0.8));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return static::class;
    }
}