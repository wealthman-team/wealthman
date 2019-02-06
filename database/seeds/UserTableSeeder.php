<?php

use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'admin panel']);

        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'edit robo advisors']);
        Permission::create(['name' => 'delete robo advisors']);

        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);


        // create roles and assign created permissions

        // this can be done as separate statements
        Role::create(['name' => 'guest']);
        Role::create(['name' => 'editor'])
            ->givePermissionTo(['admin panel','edit robo advisors', 'delete robo advisors', 'edit articles', 'delete articles']);
        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

        $user = User::firstOrCreate(
            ['email' => 'greenpanther@bk.ru'],
            [
                'name' => 'GreenPanther',
                'password' => Hash::make('secret'),
                'email_verified_at' => now()
            ]
        );

        $user->assignRole('admin');

        // API tokens
        $users = User::where('api_token', null)->get();
        /** @var User $user */
        foreach ($users as $user) {
            $user->api_token = Token::generate();
            $user->save();
        }
    }
}
