<?php

namespace App\Http\Controllers;

use App\RoboAdvisor;
use App\Sources\Page;
use Illuminate\Http\Request;

class RoboAdvisorsController extends Controller
{
    /**
     * Robo Advisors list page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Page::setTitle('Robo Advisors | Wealthman', $request->input('page'));
        Page::setDescription('Robo Advisors list', $request->input('page'));

        $roboAdvisors = RoboAdvisor::where('is_active', 0)->with('rating', 'account_types')->paginate(1);

        return view('roboAdvisors/index', [
            'roboAdvisors' => $roboAdvisors,
        ]);
    }
}
