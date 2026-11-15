<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'lecturer_id' => Lecturer::inRandomOrder()->firstOrFail()->id,
            'course_code' => fake()->unique()->numberBetween(1000, 9999),
            'title' => fake()->randomElement([
                'Web Development',
                'Database Systems',
                'Software Engineering',
                'Data Structures',
                'Computer Networks',
                'Artificial Intelligence',
            ]),
            'credit_hours' => fake()->numberBetween(1, 4),
            'semester' => fake()->randomElement([
                'First',
                'Second',
                'Summer',
            ]),
        ];
    }
}