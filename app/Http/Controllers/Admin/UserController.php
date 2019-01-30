<?php

namespace App\Http\Controllers\Admin;

use App\Sources\Page;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a home admin page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Page::setTitle('Users | Wealthman');
        Page::setDescription('Users list');

        $users = User::paginate(10);

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

}
