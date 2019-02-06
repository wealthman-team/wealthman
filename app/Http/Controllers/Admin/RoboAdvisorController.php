<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoboAdvisor;
use App\Models\Rating;
use App\Models\AccountType;
use App\Sources\Page;
use App\Models\UsageType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoboAdvisorController extends Controller
{

    protected $messages = array(
        'successAdd' => 'Robo advisor success added',
        'successUpdate' => 'Robo advisor success updated',
        'successDelete' => 'Robo advisor success delete',
        'errorDelete' => 'Robo advisor error delete',
    );

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Page::setTitle('Robo Advisors | Wealthman', $request->input('page'));
        Page::setDescription('Robo Advisors list', $request->input('page'));

        $roboAdvisors = RoboAdvisor::paginate(10);

        return view('admin.roboAdvisors.index', [
            'roboAdvisors' => $roboAdvisors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Page::setTitle('Add new Robo Advisor | Wealthman');
        Page::setDescription('Add new Robo Advisor | Wealthman');

        return view('admin.roboAdvisors.create', [
            'accountTypes' => AccountType::all(),
            'usageTypes' => UsageType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(RoboAdvisor::rules(), RoboAdvisor::messages(), RoboAdvisor::attributes());

        $roboAdvisor = new RoboAdvisor;
        $roboAdvisor->name = $request->name;
        $roboAdvisor->title = $request->title;
        $roboAdvisor->short_description = $request->short_description;
        $roboAdvisor->description = $request->description;
        $roboAdvisor->about_company = $request->about_company;
        $roboAdvisor->pros = $request->pros;
        $roboAdvisor->cons = $request->cons;
        $roboAdvisor->how_it_works = $request->how_it_works;
        $roboAdvisor->portfolio = $request->portfolio;
        $roboAdvisor->conclusion = $request->conclusion;
        $roboAdvisor->referral_link = $request->referral_link;
        $roboAdvisor->video_link = $request->video_link;
        $roboAdvisor->video_information = $request->video_information;
        $roboAdvisor->minimum_account = $request->minimum_account;
        $roboAdvisor->management_fee = $request->management_fee;
        $roboAdvisor->fee_details = $request->fee_details;
        $roboAdvisor->aum = $request->aum;
        $roboAdvisor->promotions = $request->promotions;
        $roboAdvisor->human_advisors = $request->has('human_advisors');
        $roboAdvisor->human_advisors_details = $request->human_advisors_details;
        $roboAdvisor->assistance_401k = $request->has('assistance_401k');
        $roboAdvisor->tax_loss = $request->has('tax_loss');
        $roboAdvisor->tax_loss_details = $request->tax_loss_details;
        $roboAdvisor->portfolio_rebalancing = $request->has('portfolio_rebalancing');
        $roboAdvisor->retirement_planning = $request->has('retirement_planning');
        $roboAdvisor->automatic_deposits = $request->has('automatic_deposits');
        $roboAdvisor->clearing_agency = $request->clearing_agency;
        $roboAdvisor->self_clearing = $request->has('self_clearing');
        $roboAdvisor->smart_beta = $request->has('smart_beta');
        $roboAdvisor->responsible_investing = $request->has('responsible_investing');
        $roboAdvisor->invests_commodities = $request->has('invests_commodities');
        $roboAdvisor->real_estate = $request->has('real_estate');
        $roboAdvisor->fractional_shares = $request->has('fractional_shares');
        $roboAdvisor->access_platforms = $request->access_platforms;
        $roboAdvisor->two_factor_auth = $request->has('two_factor_auth');
        $roboAdvisor->customer_service = $request->customer_service;
        $roboAdvisor->number_accounts = $request->number_accounts;
        $roboAdvisor->average_account_size = $request->average_account_size;
        $roboAdvisor->additional_information = $request->additional_information;
        $roboAdvisor->summary = $request->summary;
        $roboAdvisor->is_verify = $request->has('is_verify');
        $roboAdvisor->service_region = $request->service_region;
        $roboAdvisor->headquarters = $request->headquarters;
        $roboAdvisor->founded = $request->founded;
        $roboAdvisor->site_url = $request->site_url;
        $roboAdvisor->phone = $request->phone;
        $roboAdvisor->ceo = $request->ceo;
        $roboAdvisor->contact_details = $request->contact_details;
        $roboAdvisor->finra_crd = $request->finra_crd;
        $roboAdvisor->sec_id = $request->sec_id;
        $roboAdvisor->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '-' . $logo->getClientOriginalName();

            Storage::disk('public')->put($filename,  File::get($logo));

            $roboAdvisor->logo = $filename;
        }

        $roboAdvisor->save();

        $roboAdvisor->account_types()->sync(isset($request->account_types) ? $request->account_types : []);
        $roboAdvisor->usage_types()->sync(isset($request->usage_types) ? $request->usage_types : []);
        $roboAdvisor->ratings()->save(new Rating($this->getRaiting($request)));

        return redirect()
            ->route('admin.roboAdvisors.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successAdd']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoboAdvisor  $roboAdvisor
     * @return \Illuminate\Http\Response
     */
    public function show(RoboAdvisor $roboAdvisor)
    {
        return view('admin.roboAdvisors.show', [
            'roboAdvisor' => $roboAdvisor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoboAdvisor  $roboAdvisor
     * @return \Illuminate\Http\Response
     */
    public function edit(RoboAdvisor $roboAdvisor)
    {
        Page::setTitle('Edit Robo Advisor | Wealthman');
        Page::setDescription('Edit Robo Advisor | Wealthman');

        return view('admin.roboAdvisors.edit', [
            'roboAdvisor' => $roboAdvisor,
            'usageTypesID' => $roboAdvisor->usage_types->pluck('id')->toArray(),
            'accountTypesID' => $roboAdvisor->account_types->pluck('id')->toArray(),
            'accountTypes' => AccountType::all(),
            'usageTypes' => UsageType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoboAdvisor  $roboAdvisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoboAdvisor $roboAdvisor)
    {
        $request->validate(RoboAdvisor::rules(), RoboAdvisor::messages(), RoboAdvisor::attributes());

        $roboAdvisor->name = $request->name;
        $roboAdvisor->title = $request->title;
        $roboAdvisor->short_description = $request->short_description;
        $roboAdvisor->description = $request->description;
        $roboAdvisor->about_company = $request->about_company;
        $roboAdvisor->pros = $request->pros;
        $roboAdvisor->cons = $request->cons;
        $roboAdvisor->how_it_works = $request->how_it_works;
        $roboAdvisor->portfolio = $request->portfolio;
        $roboAdvisor->conclusion = $request->conclusion;
        $roboAdvisor->referral_link = $request->referral_link;
        $roboAdvisor->video_link = $request->video_link;
        $roboAdvisor->video_information = $request->video_information;
        $roboAdvisor->minimum_account = $request->minimum_account;
        $roboAdvisor->management_fee = $request->management_fee;
        $roboAdvisor->fee_details = $request->fee_details;
        $roboAdvisor->aum = $request->aum;
        $roboAdvisor->promotions = $request->promotions;
        $roboAdvisor->human_advisors = $request->has('human_advisors');
        $roboAdvisor->human_advisors_details = $request->human_advisors_details;
        $roboAdvisor->assistance_401k = $request->has('assistance_401k');
        $roboAdvisor->tax_loss = $request->has('tax_loss');
        $roboAdvisor->tax_loss_details = $request->tax_loss_details;
        $roboAdvisor->portfolio_rebalancing = $request->has('portfolio_rebalancing');
        $roboAdvisor->retirement_planning = $request->has('retirement_planning');
        $roboAdvisor->automatic_deposits = $request->has('automatic_deposits');
        $roboAdvisor->clearing_agency = $request->clearing_agency;
        $roboAdvisor->self_clearing = $request->has('self_clearing');
        $roboAdvisor->smart_beta = $request->has('smart_beta');
        $roboAdvisor->responsible_investing = $request->has('responsible_investing');
        $roboAdvisor->invests_commodities = $request->has('invests_commodities');
        $roboAdvisor->real_estate = $request->has('real_estate');
        $roboAdvisor->fractional_shares = $request->has('fractional_shares');
        $roboAdvisor->access_platforms = $request->access_platforms;
        $roboAdvisor->two_factor_auth = $request->has('two_factor_auth');
        $roboAdvisor->customer_service = $request->customer_service;
        $roboAdvisor->number_accounts = $request->number_accounts;
        $roboAdvisor->average_account_size = $request->average_account_size;
        $roboAdvisor->additional_information = $request->additional_information;
        $roboAdvisor->summary = $request->summary;
        $roboAdvisor->is_verify = $request->has('is_verify');
        $roboAdvisor->service_region = $request->service_region;
        $roboAdvisor->headquarters = $request->headquarters;
        $roboAdvisor->founded = $request->founded;
        $roboAdvisor->site_url = $request->site_url;
        $roboAdvisor->phone = $request->phone;
        $roboAdvisor->ceo = $request->ceo;
        $roboAdvisor->contact_details = $request->contact_details;
        $roboAdvisor->finra_crd = $request->finra_crd;
        $roboAdvisor->sec_id = $request->sec_id;
        $roboAdvisor->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '-' . $logo->getClientOriginalName();

            Storage::disk('public')->put($filename,  File::get($logo));

            $roboAdvisor->logo = $filename;
        }

        $roboAdvisor->save();

        $roboAdvisor->account_types()->sync(isset($request->account_types) ? $request->account_types : []);
        $roboAdvisor->usage_types()->sync(isset($request->usage_types) ? $request->usage_types : []);
        $roboAdvisor->ratings->fill($this->getRaiting($request))->save();

        return redirect()
            ->route('admin.roboAdvisors.index')
            ->with('statusType', 'success')
            ->with('status', $this->messages['successUpdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoboAdvisor $roboAdvisor
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(RoboAdvisor $roboAdvisor)
    {
        if ($roboAdvisor->delete()) {
            return redirect()
                ->route('admin.roboAdvisors.index')
                ->with('status', $this->messages['successDelete']);
        } else {
            return redirect()
                ->route('admin.roboAdvisors.index')
                ->with('status', $this->messages['errorDelete']);
        }
    }

    /**
     * Calculate company rating.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    private function getRaiting(Request $request)
    {
        $total = ($request->commissions + $request->service + $request->comfortable
                 + $request->tools + $request->investment_options + $request->asset_allocation)/6;

        return [
            'commissions' => $request->commissions,
            'service' => $request->service,
            'comfortable' => $request->comfortable,
            'tools' => $request->tools,
            'investment_options' => $request->investment_options,
            'asset_allocation' => $request->asset_allocation,
            'total' => $total,
        ];
    }
}
