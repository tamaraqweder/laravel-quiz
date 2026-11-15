<?php

namespace Database\Factories;

use App\Models\Lecture;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class LectureFactory extends Factory
{
    protected $model = Lecture::class;

    public function definition(): array
    {
        return [
            'course_id' => Course::inRandomOrder()->firstOrFail()->id,
            'title' => fake()->sentence(3),
            'topic_summary' => fake()->paragraph(),
            'hall_name' => fake()->bothify('Hall-##'),
            'scheduled_at' => fake()->dateTimeBetween('now', '+3 months'),
        ];
    }
}