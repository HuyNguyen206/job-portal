<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => User::all()->random(),
            'name' =>  $name = $this->faker->company,
            'slug' => Str::slug($name),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'website' => $this->faker->domainName,
            'logo' => $this->faker->image,
            'cover_photo' => $this->faker->image,
            'slogan' => 'learn earn grow',
            'description' => $this->faker->paragraph(3)
        ];
    }
}
