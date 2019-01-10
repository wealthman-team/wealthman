<?php
namespace App\Service\Filters;

class RoboAdvisorsFilter extends AbstractModelFilter
{
    public function rating_from($value)
    {
        if ($value && (int) $value > 0) {
            $this->builder->where('ratings.total', '>=', $value);
        }
    }

    public function rating_to($value)
    {
        if ($value && (int) $value > 0) {
            $this->builder->where('ratings.total', '<=', $value);
        }
    }

    public function minimum_account_from($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(minimum_account >= "'.$value.'" OR minimum_account = "" OR minimum_account is null)');
        }
    }

    public function minimum_account_to($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(minimum_account <= "'.$value.'" OR minimum_account = "" OR minimum_account is null)');
        }
    }

    public function management_fee_from($value)
    {
        $value = (float) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(management_fee >= "'.$value.'" OR management_fee = "" OR management_fee is null)');
        }
    }

    public function management_fee_to($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(management_fee <= "'.$value.'" OR management_fee = "" OR management_fee is null)');
        }
    }

    public function aum_from($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(aum >= "'.$value.'" OR aum = "" OR aum is null)');
        }
    }

    public function aum_to($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(aum <= "'.$value.'" OR aum = "" OR aum is null)');
        }
    }

    public function number_users_from($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(number_accounts >= "'.$value.'" OR number_accounts = "" OR number_accounts is null)');
        }
    }

    public function number_users_to($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(number_accounts <= "'.$value.'" OR number_accounts = "" OR number_accounts is null)');
        }
    }

    public function average_account_size_from($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(average_account_size >= "'.$value.'" OR average_account_size = "" OR average_account_size is null)');
        }
    }

    public function average_account_size_to($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(average_account_size <= "'.$value.'" OR average_account_size = "" OR average_account_size is null)');
        }
    }

    public function founded_from($value)
    {
        $value = (int) $value;
        if ($value > 0) {
            $this->builder->whereRaw('(founded >="'.$value.'" OR founded = "" OR founded is null)');
        }
    }

    public function founded_to($value)
    {
        $value = (int) $value;
        if ($value && (int) $value > 0) {
            $this->builder->whereRaw('(founded <="'.$value.'" OR founded = "" OR founded is null)');
        }
    }

    public function promotions($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('(promotions is not null OR promotions <> "")');
        }
    }

    public function human_advisors($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('human_advisors = true');
        }
    }

    public function portfolio_rebalancing($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('portfolio_rebalancing = true');
        }
    }

    public function automatic_deposits($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('automatic_deposits = true');
        }
    }

    public function two_factor_auth($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('two_factor_auth = true');
        }
    }

    public function fractional_shares($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('fractional_shares = true');
        }
    }

    public function tax_loss($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('tax_loss = true');
        }
    }

    public function assistance_401k($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('assistance_401k = true');
        }
    }

//    public function ira($value)
//    {
//        if ($value && $value == 'on') {
//            $this->builder->whereRaw('ira = true');
//        }
//    }

    public function planning_tools($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('retirement_planning = true');
        }
    }

    public function self_clearing($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('self_clearing = true');
        }
    }

    public function smart_beta($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('smart_beta = true');
        }
    }

    public function responsible_investing($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('responsible_investing = true');
        }
    }

    public function real_estate($value)
    {
        if ($value && $value == 'on') {
            $this->builder->whereRaw('real_estate = true');
        }
    }
}