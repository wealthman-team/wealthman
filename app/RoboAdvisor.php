<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
            'headquarters'   => 'nullable|string|max:255',
            'founded'   => 'nullable|string|max:255',
            'site_url'   => 'nullable|string|max:255',
            'phone'   => 'nullable|string|max:255',
            'ceo'   => 'nullable|string|max:255',
            'contact_details'   => 'nullable|string|max:255',
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
            'headquarters'   => 'Headquarters',
            'founded'   => 'Year Founded',
            'site_url'   => 'Site url',
            'phone'   => 'Phone',
            'ceo'   => 'CEO',
            'contact_details'   => 'More data',
        ];
    }
}
