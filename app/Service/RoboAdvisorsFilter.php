<?php
namespace App\Service;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RoboAdvisorsFilter
{
    /**
     * @var Builder|Model
     */
    protected $builder;
    /**
     * @var Request
     */
    private $request;

    /**
     * RoboAdvisorsFilter constructor.
     * @param Builder|Model $builder
     * @param Request $request
     */
    public function __construct($builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    /**
     * @return Builder|Model
     */
    public function apply()
    {
        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }

    ////////////

    public function rating_from($value)
    {

    }

    public function rating_to($value)
    {

    }

    public function minimum_account_from($value)
    {
        if ($value && (int) $value > 0) {
            $this->builder->where('minimum_account', '>=', $value);
        }
    }

    public function minimum_account_to($value)
    {
        if ($value && (int) $value > 0) {
            $this->builder->where('minimum_account', '<=', $value);
        }
    }

    public function fees_from($value)
    {

    }

    public function fees_to($value)
    {

    }

    public function aum_from($value)
    {

    }

    public function number_users_from($value)
    {

    }

    public function number_users_to($value)
    {

    }

    public function account_size_from($value)
    {

    }

    public function account_size_to($value)
    {

    }

    public function year_founded_from($value)
    {

    }

    public function year_founded_to($value)
    {

    }
}