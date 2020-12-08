<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use App\Models\Priority;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => User::first()->id,
            'title' => $this->faker->text(50),
            'description' => $this->faker->paragraph,
            'priority_id' => Priority::all()->random()->id,
            'deadline' => $this->faker->dateTimeBetween('+1 day', '+1 year', null),
            'executed' =>  $this->faker->boolean,
        ];
    }
}
