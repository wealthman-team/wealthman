<?php

namespace App\Http\Controllers;

use App\RoboAdvisor;
use App\AccountType;
use App\Services\DiffRoboAdvisor;
use App\Services\Filters\RoboAdvisorsFilter;
use App\Services\Filters\RoboAdvisorsFilterOption;
use App\Services\Filters\RoboAdvisorsSorting;
use App\Sources\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

class RoboAdvisorsController extends Controller
{
    /**
     * Robo Advisors list page
     *
     * @param  \Illuminate\Http\Request $request
     * @param RoboAdvisorsFilter $filter
     * @param RoboAdvisorsSorting $sorting
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, RoboAdvisorsFilter $filter, RoboAdvisorsSorting $sorting)
    {
        Page::setTitle('Robo-Advisor Screener | Wealthman', $request->input('page'));
        Page::setDescription('Find independent information about robo-advisors in the US', $request->input('page'));

        $roboAdvisorsFilterOption = (new RoboAdvisorsFilterOption($request))->get();

        $roboAdvisors = RoboAdvisor::where('is_active', 0)
            ->with('ratings', 'account_types')
            ->leftjoin('ratings', 'ratings.robo_advisor_id', '=', 'robo_advisors.id')
            ->filter($filter)
            ->sorting($sorting->setDefault('ratings.total'))
            ->paginate(10);

        return view('roboAdvisors/index', [
            'roboAdvisors' => $roboAdvisors->appends(Input::except('page')),
            'filtersOption' => $roboAdvisorsFilterOption,
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
        // популярные Robo Advisors
        $popularRoboAdvisors = RoboAdvisor::popular(3)->exclude($roboAdvisor->id)->get();


        return view('roboAdvisors/show', [
            'roboAdvisor' => $roboAdvisor,
            'popularRoboAdvisors' => $popularRoboAdvisors,
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
        Page::setTitle('Comparison of Robo-Advisors | Wealthman');
        Page::setDescription('Convenient comparison of robo-advisors. Just add robo-advisors from the list.');

        $compareList = Cookie::get('compare_list');
        $compareList = $compareList ? json_decode($compareList) : [];

        $accountTypes = AccountType::all();
        $roboAdvisors = RoboAdvisor::whereIn('id', $compareList)->with('ratings', 'account_types')->get();

        $diffRoboAdvisors = (new DiffRoboAdvisor($roboAdvisors, $accountTypes))->get();

        foreach ($roboAdvisors as $roboAdvisor) {
            $roboAdvisor->account_types_ids = $roboAdvisor->account_types->pluck('id')->toArray();
        }

        return view('roboAdvisors/compare', [
            'roboAdvisors' => $roboAdvisors,
            'accountTypes' => $accountTypes,
            'compareList' => $compareList,
            'diffRoboAdvisors' => $diffRoboAdvisors
        ]);
    }

    /**
     * Add/remove Robo Advisors compare to list
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function toggleCompare(Request $request)
    {
        $minutes = time() + 60 * 60 * 24 * 90;
        $compareList = Cookie::get('compare_list');
        $compareList = $compareList ? json_decode($compareList) : [];
        $id = $request->input('id');

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

    /**
     * Add/remove Robo Advisors compare to list
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCompare()
    {
        $minutes = time() + 60 * 60 * 24 * 90;
        Cookie::queue('compare_list', json_encode([]), $minutes);

        return response()->json([
            'success' => 'true',
        ]);
    }
}
