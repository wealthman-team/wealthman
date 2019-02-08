<?php

use App\Http\Controllers\RedirectController;
use App\Models\RoboAdvisor;
use Illuminate\Support\Arr;

/**
 *
 * Set active css class if the specific URI is current URI
 *
 * @param string $path       A specific URI
 * @param string $class_name Css class name, optional
 * @return string            Css class name if it's current URI,
 *                           otherwise - empty string
 */
function setActive(string $path, string $class_name = "active")
{
    return Request::fullUrl() === $path ? $class_name : "";
}

/**
 * @param string $path
 * @param null $exclude
 * @return string
 */
function qs_url(string $path, $exclude = null)
{
    $query = Request::all();
    if ($exclude !== null) {
        $exclude = is_array($exclude) ? $exclude : [$exclude];
        array_forget($query, $exclude);
    }

    return $path.(Arr::query($query) ? '?'.Arr::query($query) : '');
}

/**
 * @param string $name
 * @return string
 */
function sort_url(string $name)
{
    $query = Request::all();
    $type = array_key_exists('type', $query) && $query['type'] === 'asc' ? 'desc' : 'asc';
    $parameters = ['sort' => $name, 'type' => $type];

    if (count($query) > 0) {
        $parameters = array_merge($query, $parameters);
    }

    return (Arr::query($parameters) ? '?'.Arr::query($parameters) : '');
}

/**
 * @param string $name
 * @return string
 */
function sort_type(string $name)
{
    $query = Request::all();
    $type = '';
    if (array_key_exists('sort', $query) && $query['sort'] === $name) {
        $type = array_key_exists('type', $query) ? $query['type'] : '';
    }

    return $type;
}

/**
 *
 * Set category active css class if the specific URI is current URI
 *
 * @param string $path       A specific URI
 * @param string $class_name Css class name, optional
 * @return string            Css class name if it's current URI,
 *                           otherwise - empty string
 */
function setCatActive(string $path, string $class_name = "active")
{
    return Request::is($path) ? $class_name : "";
}

/**
 * @param $path
 * @return bool
 */
function checkCatActive($path)
{
    $active = false;
    if(\is_string($path)) {
        $active = Request::is($path);
    }
    if(\is_array($path)) {

        foreach ($path as $item) {
            $active = Request::is($item);
            if ($active) {
                break;
            }
        }
    }
    return $active;
}

/**
 *
 * Get shot value string for AUM field
 *
 * @param number $value
 * @return string $result
 */
function getAUMNum($value)
{
    if ($value >= 1000000000) {
        $result = floor($value/1000000000) . ' Bln';
    } elseif ($value >= 1000000) {
        $result = floor($value/1000000) . ' Mln';
    } elseif ($value >= 1000) {
        $result = floor($value/1000) . ' K';
    } else {
        $result = $value;
    }
    return $result;
}

/**
 *
 * Get compare list length
 * @return int
 */
function getCompareList($name)
{
    $compare_list = json_decode(Cookie::get($name));

    if (!isset($compare_list)) {
        $compare_list = array();
    }

    return $compare_list;
}

/**
 *
 * Get compare list length
 * @return int
 */
function getCompareListLength($name)
{
    $compare_list = json_decode(Cookie::get($name));

    if (!isset($compare_list)) {
        $compare_list = array();
    }

    return count($compare_list);
}

/**
 * @param int $limit
 * @return RoboAdvisor[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
 */
function popularRoboAdvisors($limit = 3)
{
    return RoboAdvisor::popular($limit)->exclude()->get();
}

function redirectLink($link)
{
    if (is_string($link) && !empty($link)) {
        return route('redirect', [RedirectController::QUERY_PARAM=>$link]);
    }

    return '#';
}

function user_logged_in()
{
    return (bool) Auth::user();
}

function user_name()
{
    return Auth::user() ? Auth::user()->name : '';
}

function user_short_name($user_name = '')
{
    $short_name = 'ab';
    if (empty($user_name)) {
        $user_name = Auth::user() ? Auth::user()->name : null;
    }
    if ($user_name) {
        $short_name = strlen($user_name) <= 2 ? $user_name : substr($user_name, 0, 2);
    }
    return $short_name;
}

function review_btn_classes($review_type_id)
{
    $classes = 'js-modal-open';
    if (Auth::user()) {
        $classes = old('review_type') && old('review_type') === $review_type_id ? 'js-review-btn-type active' : 'js-review-btn-type';
    }
    return $classes;
}

function review_attr_data($review_type_id)
{
    $attr_data = 'data-modal=modal-auth';
    if (Auth::user()) {
        $attr_data = 'data-review-type='.$review_type_id;
    }
    return $attr_data;
}

function recommended_text($yes,$maybe, $no)
{
    $S = $yes*1 + $maybe*0.5 + $no*1;
    $negative_percent = $no / $S * 100;

    if ($negative_percent < 50) {
        return 'Mostly recommended';
    } elseif ($negative_percent < 20) {
        return 'Strongly recommended';
    } elseif ($negative_percent === 50) {
        return 'Unsure';
    } elseif ($negative_percent > 50) {
        return 'Mostly not recommended';
    } elseif ($negative_percent > 80) {
        return 'Strongly not recommended';
    }

    return '';
}

function post_class($index, $max = 6)
{
    if (($index % $max) === 0) {
        return 'post__large';
    } elseif (($index % $max) < 4) {
        return 'post__small';
    } else {
        return 'post__medium';
    }
}