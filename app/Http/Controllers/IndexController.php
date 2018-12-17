<?php

namespace App\Http\Controllers;

use App\Sources\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Home page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Page::setTitle('Home | Wealthman');
        Page::setDescription('Main page');

        return view('index');
    }
}
