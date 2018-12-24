<?php

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
 *
 * Get shot value string for AUM field
 *
 * @param number $value
 * @return string $result
 */
function getAUMNum($value)
{
    $result = '';

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