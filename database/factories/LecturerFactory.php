<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    protected $model = Lecturer::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'employee_number' => fake()->unique()->numberBetween(10000, 99999),
            'department' => fake()->randomElement([
                'Computer Science',
                'Engineering',
                'Mathematics',
                'Business'
            ]),
            'office_room' => fake()->bothify('B-###'),
            'photo' => null,
            'status' => 'is_active',
        ];
    }
}