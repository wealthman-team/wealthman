<?php

namespace App\Sources;

use Illuminate\Support\Facades\View;

class Page
{
    /**
     * Set page breadcrumbs
     *
     * @param array $breadcrumbs
     */
    public static function setBreadcrumbs($breadcrumbs = [])
    {
        View::share('breadcrumbs', $breadcrumbs);
    }

    /**
     * Set page title
     *
     * @param string $title
     * @param int $page
     */
    public static function setTitle($title = '', $page = 1)
    {
        View::share('pageTitle', self::addPageNumber($title, $page));
    }

    /**
     * Set page description
     *
     * @param string $description
     * @param int $page
     */
    public static function setDescription($description = '', $page = 1)
    {
        View::share('pageDescription', self::addPageNumber($description, $page));
    }

    /**
     * Add page number to string
     *
     * @param string $string
     * @param int $page
     * @return string
     */
    public static function addPageNumber($string = '', $page = 1)
    {
        if ($page > 1) {
            $string .= '. Страница ' . $page;
        }

        return $string;
    }
}