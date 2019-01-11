<?php
namespace App\Service\Filters;

class RoboAdvisorsSorting extends AbstractModelSorting
{
    public function company($type)
    {
        if ($type) {
            $this->builder->orderBy('name', $type);
        }
    }
}