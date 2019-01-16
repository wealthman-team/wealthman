<?php
namespace App\Services\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AbstractModelSorting
{
    private $sort;
    private $type;

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
        $this->setDefault();
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
        }else{
            $this->defaultSort();
        }

        return $this->builder;
    }

    /**
     * @param string $sort
     * @param string $type
     * @return $this
     */
    public function setDefault($sort = 'id', $type = 'DESC')
    {
        if (is_string($sort) && !empty($sort)) {
            $this->sort = $sort;
        }
        if (is_string($type) && !empty($type)) {
            $this->type = $type;
        }

        return $this;
    }

    public function defaultSort()
    {
        $sort = $this->sort;
        $type = $this->type;
        if (strtolower($sort) === 'id') {
            $sort = $this->builder->getModel()->getTable().'.'.$sort;
        }

        $this->setOrder($sort, $type);
    }

    /**
     * @param string $field_name
     * @param string $type
     */
    public function setOrder(string $field_name, string $type)
    {
        if ($type && $field_name) {
            $this->builder->orderBy($field_name, $type);
        }
    }
}