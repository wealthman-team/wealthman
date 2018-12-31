<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // clear tables
        DB::table('admins')->truncate();

        $user = new Admin;
        $user->name = 'GreenPanther';
        $user->email = 'greenpanther@bk.ru';
        $user->password = bcrypt('secret');
        $user->save();
    }
}
