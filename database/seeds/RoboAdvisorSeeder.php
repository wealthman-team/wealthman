<?php

use App\RoboAdvisor;
use Illuminate\Database\Seeder;

class RoboAdvisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create 20 RoboAdvisor
        factory(RoboAdvisor::class, 20)->create()->each(function ($roboAdvisor) {
            //create 5 posts for each user
//            factory(Post::class, 5)->create(['user_id'=>$user->id]);
        });
    }
}
