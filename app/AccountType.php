<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $visible = [
        'id',
        'name',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
            'max' => 'Max length field :attribute must to be low 255 symbols',
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
            'name' => 'Name',
        ];
    }

    public function roboAdvisors()
    {
        return $this->belongsToMany('App\RoboAdvisor');
    }
}
