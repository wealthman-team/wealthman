<?php

use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    const ACCOUNT_TYPES = [
        'TAXABLE' => ['id' => '1','name' => 'Taxable','is_active' => '1',],
        'TRADITIONAL_IRA' => ['id' => '2','name' => 'Traditional IRA','is_active' => '1',],
        'SEP_IRA' => ['id' => '3','name' => 'SEP IRA','is_active' => '1',],
        'SOLO_401(K)' => ['id' => '4','name' => 'Solo 401(k)','is_active' => '1'],
        'PARTNERSHIPS' => ['id' => '5','name' => 'Partnerships','is_active' => '1'],
        'COVERDELL' => ['id' => '6','name' => 'Coverdell','is_active' => '1'],
        'SAVINGS' => ['id' => '7','name' => 'Savings','is_active' => '1'],
        'JOINT' => ['id' => '8','name' => 'Joint','is_active' => '1'],
        'ROLLOVER_IRA' => ['id' => '9','name' => 'Rollover IRA','is_active' => '1'],
        'SIMPLE_IRA' => ['id' => '10','name' => 'SIMPLE IRA','is_active' => '1'],
        'TRUSTS' => ['id' => '11','name' => 'Trusts','is_active' => '1'],
        'NON_PROFIT' => ['id' => '12','name' => 'Non-Profit','is_active' => '1'],
        'ANNUITIES' => ['id' => '13','name' => 'Annuities','is_active' => '1'],
        'MONEY_MARKET' => ['id' => '14','name' => 'Money Market','is_active' => '1'],
        'ROTH_IRA' => ['id' => '15','name' => 'Roth IRA','is_active' => '1'],
        'CUSTODIAL' => ['id' => '16','name' => 'Custodial','is_active' => '1'],
        '401(K)' => ['id' => '17','name' => '401(k)','is_active' => '1'],
        'LIMITED_PARTERNSHIPS' => ['id' => '18','name' => 'Limited Parternships','is_active' => '1'],
        '529' => ['id' => '19','name' => '529','is_active' => '1'],
        'CHECKING' => ['id' => '20','name' => 'Checking','is_active' => '1'],
        'CDS' => ['id' => '21','name' => 'CDs','is_active' => '1'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear tables
        DB::table('account_types')->truncate();

        foreach (self::ACCOUNT_TYPES as $account_type) {
            DB::table('account_types')->insert([
                'id' => $account_type['id'],
                'name' => $account_type['name'],
                'is_active' => $account_type['is_active'],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
