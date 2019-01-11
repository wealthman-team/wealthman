<?php
namespace App\Service\Filters;

use DB;
use Illuminate\Http\Request;

class RoboAdvisorsFilterOption
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var array
     */
    private $filter_option = [];
    /**
     * @var array
     */
    private $filter_queries = ['page'];

    /**
     * RoboAdvisorsFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->filter_option = $this->setFilterOption();
    }

    public function get()
    {
        return $this->filter_option;
    }

    /**
     * @param $table_name
     * @return \Illuminate\Database\Query\Builder
     */
    public function setTable($table_name)
    {
        return DB::table($table_name);
    }

    public function setFilterOption()
    {
        $filters = [
            'general' => [
                $this->getRangeFilter('ratings', [
                    'field' => 'total',
                    'name' => 'rating',
                    'label' => 'Rating',
                    'float' => true,
                    'min' => 0,
                    'max' => 10,
                    'step_rules' => [
                        '0' => '0.5'
                    ],
                ]),
                $this->getRangeFilter('robo_advisors', [
                    'field' => 'minimum_account',
                    'name' => 'minimum_account',
                    'label' => 'Minimum account',
                    'pre_prefix' => '$',
                    'min' => 0,
                    'step_rules' => [
                        '0' => '500'
                    ],
                ]),
                $this->getRangeFilter('robo_advisors', [
                    'field' => 'management_fee',
                    'name' => 'management_fee',
                    'label' => 'Management fee',
                    'float' => true,
                    'post_prefix' => '%',
                    'min' => 0,
                    'step_rules' => [
                        '0' => '0.1'
                    ],
                ]),
                $this->getRangeFilter('robo_advisors', [
                    'field' => 'aum',
                    'name' => 'aum',
                    'label' => 'AUM',
                    'reduce' => true,
                    'pre_prefix' => '$',
                    'min' => 0,
                    'step_rules' => [
                        '1000000' => '50000', //шаг 50 тыс.
                        '10000000' => '500000', //шаг 500 тыс.
                        '100000000' => '5000000', //шаг 5 миллионов.
                        '1000000000' => '50000000', //шаг 50 миллионов.
                    ],
                ]),
                $this->getRangeFilter('robo_advisors', [
                    'field' => 'number_accounts',
                    'name' => 'number_users',
                    'label' => 'Number of Users',
                    'min' => 0,
                    'step_rules' => [
                        '0' => '1000'
                    ],
                ]),
                $this->getRangeFilter('robo_advisors', [
                    'field' => 'average_account_size',
                    'name' => 'average_account_size',
                    'label' => 'Average Account Size',
                    'min' => 0,
                    'pre_prefix' => '$',
                    'step_rules' => [
                        '0' => '1000',
                        '100000' => '5000',
                        '500000' => '25000'
                    ],
                ]),
                $this->getRangeFilter('robo_advisors', [
                    'field' => 'founded',
                    'name' => 'founded',
                    'label' => 'Year Founded',
                    'range_factor' => '90',
                    'max' => 2018,
                    'step_rules' => [
                        '0' => '1'
                    ],
                ]),
                $this->getCheckboxFilter([
                    'name' => 'promotions',
                    'label' => 'Promotions',
                ]),
            ],
            'general_is_active' => false,
            'services' => [
                $this->getCheckboxFilter([
                    'name' => 'human_advisors',
                    'label' => 'Human Advisors',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'portfolio_rebalancing',
                    'label' => 'Portfolio Rebalancing',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'automatic_deposits',
                    'label' => 'Automatic Deposits',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'two_factor_auth',
                    'label' => 'Two-Factor Authentication',
                ])
            ],
            'services_is_active' => false,
            'features' => [
                $this->getCheckboxFilter([
                    'name' => 'fractional_shares',
                    'label' => 'Fractional Shares',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'tax_loss',
                    'label' => 'Tax Loss Harvesting',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'assistance_401k',
                    'label' => '401k Assistance',
                ]),
//                $this->getCheckboxFilter([
//                    'name' => 'ira',
//                    'label' => 'IRA',
//                ]),
                $this->getCheckboxFilter([
                    'name' => 'planning_tools',
                    'label' => 'Retirement Planning Tools',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'self_clearing',
                    'label' => 'Self Clearing',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'smart_beta',
                    'label' => 'Smart Beta',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'responsible_investing',
                    'label' => 'Socially Responsible Investing',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'invests_commodities',
                    'label' => 'Invests in Commodities',
                ]),
                $this->getCheckboxFilter([
                    'name' => 'real_estate',
                    'label' => 'Invests in Real Estate',
                ]),
            ],
            'features_is_active' => false,
            'filter_queries' => $this->filter_queries,
        ];

        $filters = $this->checkActiveFilters($filters, 'general');
        $filters = $this->checkActiveFilters($filters, 'services');
        $filters = $this->checkActiveFilters($filters, 'features');

        return $filters;
    }

    /**
     * @param $filters
     * @param $filter_name
     * @return mixed
     */
    public function checkActiveFilters($filters, $filter_name) {
        foreach ( $filters[$filter_name] as $filter) {
            if ($filter['isActive'] === true) {
                $filters[$filter_name.'_is_active'] = true;
                break;
            }
        }

        return $filters;
    }

    /**
     * @param $table_name
     * @param $param
     * @param bool $isRange
     * @return array
     */
    public function getRangeFilter($table_name, $param, $isRange = true)
    {
        $this->filter_queries[] = $param['name'].'_from';
        $this->filter_queries[] = $param['name'].'_to';

        $table = $this->setTable($table_name);
        $min = $param['min'] ?? $table->select($param['field'])->min($param['field']);
        $max = $param['max'] ?? $table->select($param['field'])->max($param['field']);
        $step = 1;
        foreach ($param['step_rules'] as $rule => $value) {
            if ($max >= $rule){
                $step = $value;
            }
        }
        $current_min = '';
        $current_max = '';
        if ($this->request->has($param['name'].'_from')) {
            $current_min = $this->request->get($param['name'].'_from');
        }
        if ($this->request->has($param['name'].'_to')) {
            $current_max = $this->request->get($param['name'].'_to');
        }

        if (isset($param['range_factor'])) {
            $range_factor = $param['range_factor'];
        } elseif(($max - $min) >= 1000000000) {
            $range_factor = '2';
        } else {
            $range_factor = '50';
        }

        return [
            'type' => 'range',
            'current_min' => $current_min,
            'current_max' => $current_max,
            'min' => $min,
            'max' => $max,
            'step' => $step,
            'pre_prefix' => $param['pre_prefix'] ?? '',
            'post_prefix' => $param['post_prefix'] ?? '',
            'reduce' => $param['reduce'] ?? false,
            'label' => $param['label'],
            'name' => $param['name'],
            'id' => $param['name'],
            'isRange' => $isRange,
            'float' => $param['float'] ?? false,
            'range_factor' => $range_factor,
            'isActive' => !empty($current_min) || !empty($current_max),
        ];
    }

    /**
     * @param $param
     * @return array
     */
    public function getCheckboxFilter($param)
    {
        $this->filter_queries[] = $param['name'];

        return [
            'type' => 'checkbox',
            'name' => $param['name'],
            'id' => $param['name'],
            'label' => $param['label'],
            'isActive' => $this->request->has($param['name']),
        ];
    }
}
