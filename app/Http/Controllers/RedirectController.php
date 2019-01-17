<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;


class RedirectController extends Controller
{
    const QUERY_PARAM = 'src';

    /**
     * Redirect page
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $src = $request->input(self::QUERY_PARAM);
        if (!empty($src)) {

            return Redirect::away($src, 301);
        }

        return back();
    }
}
