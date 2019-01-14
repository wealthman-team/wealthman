<?php
namespace App\Services;

/**
 * Class DiffRoboAdvisor
 * @package App\Services
 */
class DiffRoboAdvisor
{
    private $identical_properties = [
        'general' => [
            'ratings' => [
                'total' => false,
                'commissions' => false,
                'service' => false,
                'comfortable' => false,
                'tools' => false,
                'investment_options' => false,
                'asset_allocation' => false,
            ],
            'minimum_account' => false,
            'management_fee' => false,
            'fee_details' => false,
            'aum' => false,
            'number_accounts' => false,
            'average_account_size' => false,
            'founded' => false,
            'promotions' => false,
        ],
        'services' => [
            'human_advisors' => false,
            'human_advisors_details' => false,
            'portfolio_rebalancing' => false,
            'automatic_deposits' => false,
            'access_platforms' => false,
            'two_factor_auth' => false,
            'customer_service' => false,
            'clearing_agency' => false,
        ],
        'account_available' => [
            'account_types' => false,
        ],
        'features' => [
            'fractional_shares' => false,
            'assistance_401k' => false,
            'tax_loss' => false,
            'tax_loss_details' => false,
            'retirement_planning' => false,
            'self_clearing' => false,
            'smart_beta' => false,
            'responsible_investing' => false,
            'invests_commodities' => false,
            'real_estate' => false,
        ],
        'additional_information' => [
            'additional_information' => false,
        ],
        'summary' => [
            'summary' => false,
        ]
    ];

    private $roboAdvisors;
    private $accountTypes;

    public function __construct($roboAdvisors, $accountTypes)
    {
        $this->roboAdvisors = $roboAdvisors->toArray();
        $this->accountTypes = $accountTypes->toArray();
        $this->setAllAccounts();
    }

    public function get()
    {
        $this->diff($this->roboAdvisors);

        return $this->identical_properties;
    }

    private function setAllAccounts()
    {
        $result = [];
        foreach ($this->accountTypes as $account_type) {
            $result[$account_type['id']] = false;
        }

        $this->identical_properties['account_available']['account_types'] = $result;
    }

    private function diff(array $roboAdvisors)
    {
        $unique_prop = [];
        foreach ($roboAdvisors as $roboAdvisor) {
            $unique_prop = $this->getGroupDiff('general', $roboAdvisor, $unique_prop);
            $unique_prop = $this->getGroupDiff('services', $roboAdvisor, $unique_prop);
            $unique_prop = $this->getGroupDiff('account_available', $roboAdvisor, $unique_prop);
            $unique_prop = $this->getGroupDiff('features', $roboAdvisor, $unique_prop);
            $unique_prop = $this->getGroupDiff('additional_information', $roboAdvisor, $unique_prop);
            $unique_prop = $this->getGroupDiff('summary', $roboAdvisor, $unique_prop);
        }

        return $this->buildResult($unique_prop);
    }

    private function buildResult($unique_prop)
    {
        foreach ($unique_prop as $group_key => $group_value) {
            if(array_key_exists($group_key, $this->identical_properties)) {
                $identical = true;
                foreach ($group_value as $prop_key => $prop) {
                    if ($prop_key === 'ratings' || $prop_key === 'account_types') {
                        if (array_key_exists($prop_key, $this->identical_properties[$group_key])) {
                            foreach ($prop as $sub_prop_key => $sub_prop) {
                                if (array_key_exists($sub_prop_key, $this->identical_properties[$group_key][$prop_key])) {
                                    $group_identical = count($sub_prop) === 1;
                                    if ($identical && !$group_identical) {
                                        $identical = false;
                                    }
                                    $this->identical_properties[$group_key][$prop_key][$sub_prop_key] = $group_identical;
                                }
                            }
                        }
                    }else{
                        if(array_key_exists($prop_key, $this->identical_properties[$group_key])) {
                            $group_identical = count($prop) === 1;
                            if($identical && !$group_identical) {
                                $identical = false;
                            }
                            $this->identical_properties[$group_key][$prop_key] = $group_identical;
                        }
                    }
                }
                $this->identical_properties[$group_key]['group_identical'] = $identical;
            }

        }

        return $this->identical_properties;
    }

    private function getGroupDiff($group_name, array $roboAdvisor, array $diff_properties)
    {
        foreach ($this->identical_properties[$group_name] as $key => $item) {
            if ($key === 'ratings') {
                foreach ($item as $sub_key => $sub_item) {
                    if (array_key_exists($key, $roboAdvisor)
                        && array_key_exists($sub_key, $roboAdvisor[$key])) {
                        $diff_properties[$group_name][$key][$sub_key][] = trim(
                            $roboAdvisor[$key][$sub_key]
                        );
                        $diff_properties[$group_name][$key][$sub_key] = array_unique(
                            $diff_properties[$group_name][$key][$sub_key]
                        );
                    }
                }
            }elseif($key === 'account_types'){
                if (array_key_exists($key, $roboAdvisor)) {
                    $accounts = [];
                    foreach ($roboAdvisor[$key] as $account_type) {
                        $accounts[$account_type['id']] = $account_type['name'];
                    }

                    foreach ($item as $sub_key => $sub_item) {
                        if (array_key_exists($sub_key, $accounts)){
                            $diff_properties[$group_name][$key][$sub_key][] = trim(
                                $accounts[$sub_key]
                            );
                        } else {
                            $diff_properties[$group_name][$key][$sub_key][] = null;
                        }
                        $diff_properties[$group_name][$key][$sub_key] = array_unique(
                            $diff_properties[$group_name][$key][$sub_key]
                        );
                    }
                }
            }else{
                if (array_key_exists($key, $roboAdvisor)) {
                    $diff_properties[$group_name][$key][] = trim(
                        $roboAdvisor[$key]
                    );
                    $diff_properties[$group_name][$key] = array_unique(
                        $diff_properties[$group_name][$key]
                    );
                }
            }
        }

        return $diff_properties;
    }
}