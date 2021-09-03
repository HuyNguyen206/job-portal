<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRole = Role::query()->create([
            'name' => 'admin'
        ]);
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' =>  'admin@gmail.com'
        ]);

        $admin->roles()->attach($adminRole);
    }
}
