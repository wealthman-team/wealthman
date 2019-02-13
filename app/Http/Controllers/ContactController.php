<?php

namespace App\Http\Controllers;

use App\Sources\Page;
use Illuminate\Http\Request;

class ContactController
{
    public function index(Request $request)
    {
        Page::setTitle('Contacts | Wealthman');
        Page::setDescription('Contacts');

        return view('contacts.index');
    }
}