<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random(),
            'address' => $this->faker->address,
            'gender' => Arr::random(['male', 'female']),
            'dob' => $this->faker->date,
            'experience' => $this->faker->paragraph(4),
            'bio' => $this->faker->paragraph(4),
            'cover_letter' => $this->faker->word(3),
            'resume' => $this->faker->word(3),
            'avatar' => $this->faker->image
        ];
    }
}
