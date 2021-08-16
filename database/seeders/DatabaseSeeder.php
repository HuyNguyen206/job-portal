<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'nguyenlehuyuit@gmail.com',
            'name' => 'huy'
        ]);
        \App\Models\User::factory(10)->create();
//            Category::factory(25)->create();

        DB::table('categories')->insert([
            [
                'name' => 'Technology',
            ],
            [
                'name' => 'Engineering',
            ],
            [
                'name' => 'Government',
            ],
            [
                'name' => 'Medical',
            ],
            [
                'name' => 'Software'
            ],

        ]);
        Company::factory(20)->create();
        Job::factory(50)->create();
    }
}
