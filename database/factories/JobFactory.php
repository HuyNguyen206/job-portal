<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => $user = User::where('user_type', 'employer')->get()->random(),
            'company_id' => $user->company->id,
            'title' => $title = $this->faker->text(10),
            'slug' => Str::slug($title),
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'category_id' => Category::all()->random(),
            'type' => 'fulltime',
            'roles' => $this->faker->text(10),
            'status' => rand(0, 1),
            'description' => $this->faker->paragraph(3),
            'last_date' => $this->faker->dateTime
        ];
    }
}
