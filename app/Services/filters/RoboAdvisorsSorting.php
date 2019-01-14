<?php
namespace App\Services\Filters;

/**
 * Class RoboAdvisorsSorting
 * @package App\Services\Filters
 */
class RoboAdvisorsSorting extends AbstractModelSorting
{
    /**
     * @param $type
     */
    public function company($type)
    {
        $this->setOrder('name', $type);
    }

    /**
     * @param $type
     */
    public function rating($type)
    {
        $this->setOrder('ratings.total', $type);
    }

    /**
     * @param $type
     */
    public function account($type)
    {
        $this->setOrder('minimum_account', $type);
    }

    /**
     * @param $type
     */
    public function fee($type)
    {
        $this->setOrder('management_fee', $type);
    }

    /**
     * @param $type
     */
    public function aum($type)
    {
        $this->setOrder('aum', $type);
    }

    /**
     * @param string $field_name
     * @param string $type
     */
    private function setOrder(string $field_name, string $type)
    {
        if ($type && $field_name) {
            $this->builder->orderBy($field_name, $type);
        }
    }
}