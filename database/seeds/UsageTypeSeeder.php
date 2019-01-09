<?php

use Illuminate\Database\Seeder;

class UsageTypeSeeder extends Seeder
{
    const USAGE_TYPES = [
        'BEGINNING_INVESTORS' => ['id' => '1','name' => 'Beginning investors','is_active' => '1',],
        'INTERMEDIATE_INVESTORS' => ['id' => '2','name' => 'Intermediate investors','is_active' => '1',],
        'YOUNG_INVESTORS' => ['id' => '3','name' => 'Young investors','is_active' => '1',],
        'SMARTPHONE_USERS' => ['id' => '4','name' => 'Smartphone users','is_active' => '1'],
        'IRA_INVESTORS' => ['id' => '5','name' => 'IRA investors','is_active' => '1'],
        'GOAL_ORIENTED_INVESTORS' => ['id' => '6','name' => 'Goal-oriented investors','is_active' => '1']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear tables
        DB::table('usage_types')->truncate();

        foreach (self::USAGE_TYPES as $usage_type) {
            DB::table('usage_types')->insert([
                'id' => $usage_type['id'],
                'name' => $usage_type['name'],
                'is_active' => $usage_type['is_active'],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
