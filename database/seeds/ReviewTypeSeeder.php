<?php

use Illuminate\Database\Seeder;

class ReviewTypeSeeder extends Seeder
{
    const REVIEW_TYPES = [
        'BEGINNING_INVESTORS' => ['id' => '1','name' => 'Yes, I recommend', 'code'=> 'positive'],
        'INTERMEDIATE_INVESTORS' => ['id' => '2','name' => 'Maybe', 'code'=> 'unsure'],
        'YOUNG_INVESTORS' => ['id' => '3','name' => 'No, I don\'t recommend', 'code'=> 'negative'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear tables
        DB::table('review_types')->truncate();

        foreach (self::REVIEW_TYPES as $review_type) {
            DB::table('review_types')->insert([
                'id' => $review_type['id'],
                'name' => $review_type['name'],
                'code' => $review_type['code'],
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
