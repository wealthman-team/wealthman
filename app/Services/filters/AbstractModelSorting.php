<?php
namespace App\Services\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AbstractModelSorting
{
    /**
     * @var Builder|Model
     */
    protected $builder;
    /**
     * @var Request
     */
    protected $request;

    /**
     * RoboAdvisorsFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder|Model $builder
     * @return Builder|Model
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        $sort = $this->request->input('sort');
        $type = $this->request->input('type');
        if ($sort && $type && method_exists($this, $sort)) {
            $this->$sort($type);
        }

        return $this->builder;
    }
}