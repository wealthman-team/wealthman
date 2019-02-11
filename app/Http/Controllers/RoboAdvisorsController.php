<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\ReviewType;
use App\Models\RoboAdvisor;
use App\Models\AccountType;
use App\Services\DiffRoboAdvisor;
use App\Services\Filters\RoboAdvisorsFilter;
use App\Services\Filters\RoboAdvisorsFilterOption;
use App\Services\Filters\RoboAdvisorsSorting;
use App\Sources\Page;
use Auth;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;

use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        Page::setTitle('Robo-Advisor Screener | Wealthman');
        Page::setDescription('Find independent information about robo-advisors in the US');

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
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        /** @var RoboAdvisor $roboAdvisor */
        $roboAdvisor = RoboAdvisor::whereSlug($slug)->firstOrFail();
        Page::setTitle($roboAdvisor->name . ' | Wealthman');
        Page::setDescription($roboAdvisor->name . '. ' . $roboAdvisor->short_description);

        $accountTypes = AccountType::all();
        $reviewTypes = ReviewType::all();
        $reviews = Review::where('robo_advisor_id', $roboAdvisor->id)
            ->where('is_active', true)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $roboAdvisor->account_types_ids = $roboAdvisor->account_types->pluck('id')->toArray();
        // популярные Robo Advisors
        $popularRoboAdvisors = RoboAdvisor::popular(3)->exclude($roboAdvisor->id)->get();

        $is_user_create_review = false;
        if (Auth::user()) {
            $reviewByUserCount = Review::where('robo_advisor_id', $roboAdvisor->id)
                ->where('user_id', Auth::user()->id)->get()->count();
            if ($reviewByUserCount > 0) {
                $is_user_create_review = true;
            }
        }

        return view('roboAdvisors/show', [
            'roboAdvisor' => $roboAdvisor,
            'popularRoboAdvisors' => $popularRoboAdvisors,
            'accountTypes' => $accountTypes,
            'reviewTypes' => $reviewTypes,
            'reviews' => $reviews,
            'is_user_create_review' => $is_user_create_review,
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
