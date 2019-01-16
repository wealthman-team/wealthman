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
}