<?php

namespace App\Http\Controllers;

use App\RoboAdvisor;
use App\AccountType;
use App\Service\RoboAdvisorsFilter;
use App\Sources\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

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

        $roboAdvisors = RoboAdvisor::where('is_active', 0)->with('rating', 'account_types');

        $roboAdvisors = (new RoboAdvisorsFilter($roboAdvisors, $request))->apply();
        $roboAdvisors = $roboAdvisors->paginate(10);

        return view('roboAdvisors/index', [
            'roboAdvisors' => $roboAdvisors->appends(Input::except('page')),
        ]);
    }

    /**
     * Show robo advisor page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoboAdvisor  $roboAdvisor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RoboAdvisor $roboAdvisor)
    {
        Page::setTitle($roboAdvisor->name . ' | Wealthman');
        Page::setDescription($roboAdvisor->name . '. ' . $roboAdvisor->short_description);

        $accountTypes = AccountType::all();

        $roboAdvisor->account_types_ids = $roboAdvisor->account_types->pluck('id')->toArray();

        return view('roboAdvisors/show', [
            'roboAdvisor' => $roboAdvisor,
            'accountTypes' => $accountTypes,
        ]);
    }

    /**
     * Compare robo advisors page.
     *
     * @return \Illuminate\Http\Response
     */
    public function compare()
    {
        Page::setTitle('Robo Advisors Compare | Wealthman');
        Page::setDescription('Robo Advisors compare');

        $compareList = Cookie::get('compare_list');

        if (!isset($compareList)) {
            $compareList = array();
        } else {
            $compareList = json_decode($compareList);
        }

        $accountTypes = AccountType::all();
        $roboAdvisors = RoboAdvisor::whereIn('id', $compareList)->with('rating', 'account_types')->get();

        foreach ($roboAdvisors as $roboAdvisor) {
            $roboAdvisor->account_types_ids = $roboAdvisor->account_types->pluck('id')->toArray();
        }

        return view('roboAdvisors/compare', [
            'roboAdvisors' => $roboAdvisors,
            'accountTypes' => $accountTypes,
        ]);
    }

    /**
     * Add/remove Robo Advisors compare to list
     *
     * @return \Illuminate\Http\Response
     */
    public function toggleCompare(Request $request)
    {
        $minutes = time() + 60 * 60 * 24 * 90;
        $compareList = Cookie::get('compare_list');
        $id = $request->input('id');

        if (!isset($compareList)) {
            $compareList = array();
        } else {
            $compareList = json_decode($compareList);
        }

        if (in_array($id, $compareList)) {
            $filteredCompareList = array();

            foreach ($compareList as $item) {
                if ($item != $id) {
                    $filteredCompareList[] = $item;
                }
            }

            $compareList = $filteredCompareList;
        } else {
            $compareList[] = $id;
        }

        Cookie::queue('compare_list', json_encode($compareList), $minutes);

        return response()->json([
            'success' => 'true',
            'data' => [
                'compareList' => $compareList,
            ]
        ]);
    }
}
