<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecture;

class LectureSeeder extends Seeder
{
    public function run(): void
    {
        Lecture::factory()->count(30)->create();
    }
}