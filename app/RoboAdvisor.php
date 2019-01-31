<?php

namespace App;

use App\Services\Filters\AbstractModelFilter;
use App\Services\Filters\AbstractModelSorting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;

class RoboAdvisor extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

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
            'name' => 'required|string|max:255',
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
            'video_information'   => 'nullable|string',
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
            'video_information'   => 'Video information',
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

    public function reviews()
    {
        return $this->hasMany('App\Review');
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

    /**
     * @param Builder|Model $builder
     * @param int $limit
     * @return mixed
     */
    public function scopePopular($builder, int $limit = 3)
    {
        return $builder
            ->with('ratings')
            ->leftjoin('ratings', 'ratings.robo_advisor_id', '=', 'robo_advisors.id')
            ->orderBy('ratings.total', 'desc')
            ->orderBy('aum', 'desc')
            ->limit($limit);
    }

    /**
     * @param Builder|Model $builder
     * @param null $exclude
     * @return mixed
     */
    public function scopeExclude($builder, $exclude = null)
    {
        if ($exclude !== null) {
            $exclude = is_array($exclude) ? $exclude : [(int) $exclude];
        }

        return $exclude ? $builder->whereNotIn('robo_advisors.id', $exclude) : $builder;
    }
}
