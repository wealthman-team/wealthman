<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UsageType
 *
 * @property int $id
 * @property string $name
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RoboAdvisor[] $roboAdvisors
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UsageType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UsageType extends Model
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
        return $this->belongsToMany(RoboAdvisor::class, 'usage_type_robo_advisor');
    }
}
