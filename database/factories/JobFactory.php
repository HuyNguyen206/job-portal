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
            'title' => $title = $this->faker->words(6, true),
            'slug' => Str::slug($title),
            'position' => $this->faker->jobTitle,
            'address' => $this->faker->address,
            'category_id' => Category::all()->random(),
            'type' => $this->faker->randomElement(['fulltime', 'parttime']),
            'roles' => $this->faker->text(10),
            'status' => rand(0, 1),
            'description' => $this->faker->paragraph(3),
            'last_date' => $this->faker->dateTimeBetween('-2 years', '2 years'),
            'number_of_vacancy' => rand(1, 5),
            'year_of_experience' => rand(1, 10),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'salary' => $this->faker->randomElement([
                'negotiable', '2000-5000', '50000-10000',
                '10000-20000', '30000-50000'
            ])
        ];
    }
}
