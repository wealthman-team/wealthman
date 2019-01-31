<?php

namespace App\Http\Controllers;

use App\RoboAdvisor;
use App\Services\Filters\RoboAdvisorsSorting;
use App\Sources\Page;
use Auth;
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
     * @param  \Illuminate\Http\Request $request
     * @param RoboAdvisorsSorting $sorting
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RoboAdvisorsSorting $sorting)
    {
        Page::setTitle('Robo-Advisor\'s Aggregator | WealthMan');
        Page::setDescription('Use our sophisticated Advisor screener to select robo-advisor independently or consult our free competent support.');

        // популярные Robo Advisors
        $popularRoboAdvisors = RoboAdvisor::popular(5)->get()->pluck('id')->toArray();
        $roboAdvisors = RoboAdvisor::where('is_active', 0)
            ->whereIn('robo_advisors.id', $popularRoboAdvisors)
            ->with('ratings', 'account_types')
            ->leftjoin('ratings', 'ratings.robo_advisor_id', '=', 'robo_advisors.id')
            ->sorting($sorting->setDefault('ratings.total'))
            ->get();
//        $R = 5;
//        $U = 3;
//        $N = 1;
//
//        $S = $R*1 + $U*0.5 + $N*1;

//        dd($N / $S * 100);

        return view('index', [
            'roboAdvisors' => $roboAdvisors
        ]);
    }
}
