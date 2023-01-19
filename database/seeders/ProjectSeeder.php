<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project;
            $project->title = $faker->sentence(3);
            $project->slug = Str::slug($project->title, '-');
            $project->cover_image = 'storage/app/public/placeholders/placeholder.jpg';
            $project->description = $faker->paragraph();
            $project->vote = $faker->randomElement(['1', '2', '3', '4', '5']);
            $project->link = $faker->randomElement(['https://lorem1', 'https://lorem2', 'https://lorem3', 'https://lorem4', 'https://lorem5']);
            $project->save();
        }
    }
}
