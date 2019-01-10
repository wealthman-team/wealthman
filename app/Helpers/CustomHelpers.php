<?php

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