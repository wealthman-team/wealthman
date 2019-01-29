<?php

namespace App\Http\Controllers\Admin;

use App\Sources\Page;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a home admin page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Page::setTitle('Главная | Wealthman');
        Page::setDescription('Главная страница кабинета администратора');

        return view('admin.index');
    }

}
