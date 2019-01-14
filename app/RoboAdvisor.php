<?php

namespace App;

use App\Services\Filters\AbstractModelFilter;
use App\Services\Filters\AbstractModelSorting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


/**
 * App\RoboAdvisor
 *
 * @property int $id
 * @property string $name
 * @property string|null $logo
 * @property string|null $title
 * @property string|null $short_description
 * @property string|null $description
 * @property string|null $about_company
 * @property string|null $pros
 * @property string|null $cons
 * @property string|null $how_it_works
 * @property string|null $portfolio
 * @property string|null $conclusion
 * @property string|null $referral_link
 * @property string|null $video_link
 * @property int|null $minimum_account
 * @property float|null $management_fee
 * @property string|null $fee_details
 * @property int|null $aum
 * @property string|null $promotions
 * @property int $human_advisors
 * @property string|null $human_advisors_details
 * @property int $assistance_401k
 * @property int $tax_loss
 * @property string|null $tax_loss_details
 * @property int $portfolio_rebalancing
 * @property int $retirement_planning
 * @property int $automatic_deposits
 * @property string|null $clearing_agency
 * @property int $self_clearing
 * @property int $smart_beta
 * @property int $responsible_investing
 * @property int $invests_commodities
 * @property int $real_estate
 * @property int $fractional_shares
 * @property string|null $access_platforms
 * @property int $two_factor_auth
 * @property string|null $customer_service
 * @property int|null $number_accounts
 * @property int|null $average_account_size
 * @property string|null $additional_information
 * @property string|null $summary
 * @property int $is_verify
 * @property string|null $service_region
 * @property string|null $headquarters
 * @property string|null $founded
 * @property string|null $site_url
 * @property string|null $phone
 * @property string|null $ceo
 * @property string|null $contact_details
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\AccountType[] $account_types
 * @property-read \App\Rating $ratings
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\UsageType[] $usage_types
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor filter($filters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAboutCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAccessPlatforms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAdditionalInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAssistance401k($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAutomaticDeposits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereAverageAccountSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereCeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereClearingAgency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereConclusion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereCons($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereContactDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereCustomerService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereFeeDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereFounded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereFractionalShares($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereHeadquarters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereHowItWorks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereHumanAdvisors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereHumanAdvisorsDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereInvestsCommodities($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereIsVerify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereManagementFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereMinimumAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereNumberAccounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor wherePortfolio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor wherePortfolioRebalancing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor wherePromotions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor wherePros($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereRealEstate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereReferralLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereResponsibleInvesting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereRetirementPlanning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereSelfClearing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereServiceRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereSiteUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereSmartBeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereTaxLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereTaxLossDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereTwoFactorAuth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereVideoLink($value)
 * @mixin \Eloquent
 * @property string|null $finra_crd
 * @property string|null $sec_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereFinraCrd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoboAdvisor whereSecId($value)
 */
class RoboAdvisor extends Model
{
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'name'   => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'   => 'nullable|string|max:255',
            'short_description'   => 'nullable|string',
            'description'   => 'nullable|string',
            'about_company'   => 'nullable|string',
            'pros'   => 'nullable|string',
            'cons'   => 'nullable|string',
            'how_it_works'   => 'nullable|string',
            'portfolio'   => 'nullable|string',
            'conclusion'   => 'nullable|string',
            'referral_link'   => 'nullable|string|max:255',
            'video_link'   => 'nullable|string|max:255',
            'minimum_account'   => 'nullable|integer',
            'management_fee'   => 'nullable|numeric',
            'fee_details'   => 'nullable|string|max:255',
            'aum'   => 'nullable|integer',
            'promotions'   => 'nullable|string|max:255',
            'human_advisors_details'   => 'nullable|string|max:255',
            'tax_loss_details'   => 'nullable|string|max:255',
            'clearing_agency'   => 'nullable|string|max:255',
            'access_platforms'   => 'nullable|string|max:255',
            'customer_service'   => 'nullable|string|max:255',
            'number_accounts'   => 'nullable|integer',
            'average_account_size'   => 'nullable|integer',
            'additional_information'   => 'nullable|string',
            'summary'   => 'nullable|string',
            'service_region'   => 'nullable|string|max:255',
            'headquarters'   => 'nullable|string|max:255',
            'founded'   => 'nullable|string|max:255',
            'site_url'   => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:255',
            'ceo'   => 'nullable|string|max:255',
            'contact_details'   => 'nullable|string|max:255',
            'finra_crd' => 'nullable|string|max:255',
            'sec_id' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public static function messages()
    {
        return [
            'required' => 'Field :attribute is required',
            'string' => 'Field :attribute must to be string',
            'integer'  => 'Field :attribute must to be number',
            'numeric'  => 'Field :attribute must to be number',
            'image'  => 'File :attribute must to be image',
            'mimes'  => 'Wrong file format. Format should to be jpeg,png,jpg,gif,svg',
            'max' => 'Max length field :attribute must to be low 255 symbols',
            'logo.max'  => 'Max file size :attribute must not to be over 2048 Kb',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public static function attributes()
    {
        return [
            'name'   => 'Name',
            'logo' => 'Robo Advisor logo',
            'title'   => 'Title',
            'short_description'   => 'Short description',
            'description'   => 'Description',
            'about_company'   => 'About company',
            'pros'   => 'Pros',
            'cons'   => 'Cons',
            'how_it_works'   => 'How_it_works',
            'portfolio'   => 'Portfolio',
            'conclusion'   => 'Conclusion',
            'referral_link'   => 'Referral link',
            'video_link'   => 'Video link',
            'minimum_account'   => 'Minimum account',
            'management_fee'   => 'Management fee',
            'fee_details'   => 'Fee details',
            'aum'   => 'Assets Under Management',
            'promotions'   => 'Promotions',
            'human_advisors_details'   => 'about human advisors',
            'tax_loss_details'   => 'tax Loss Harvesting',
            'clearing_agency'   => 'Clearing Agency',
            'access_platforms'   => 'Access platforms',
            'customer_service'   => 'Customer Service',
            'number_accounts'   => 'Number of Accounts',
            'average_account_size'   => 'Average Account Size',
            'additional_information'   => 'Additional information',
            'summary'   => 'Summary',
            'service_region'   => 'Service region',
            'headquarters'   => 'Headquarters',
            'founded'   => 'Year Founded',
            'site_url'   => 'Site url',
            'phone'   => 'Phone',
            'ceo'   => 'CEO',
            'contact_details'   => 'More data',
            'finra_crd' => 'FINRA CRD',
            'sec_id' => 'SEC ID',
        ];
    }

    public function ratings()
    {
        return $this->hasOne('App\Rating');
    }

    public function account_types()
    {
        return $this->belongsToMany('App\AccountType', 'account_type_robo_advisor');
    }

    public function usage_types()
    {
        return $this->belongsToMany('App\UsageType', 'usage_type_robo_advisor');
    }

    /**
     * @param Builder|Model $builder
     * @param AbstractModelFilter $filters
     * @return mixed
     */
    public function scopeFilter($builder, $filters)
    {
        return $filters->apply($builder);
    }

    /**
     * @param Builder|Model $builder
     * @param AbstractModelSorting $sorting
     * @return mixed
     */
    public function scopeSorting($builder, $sorting)
    {
        return $sorting->apply($builder);
    }
}
