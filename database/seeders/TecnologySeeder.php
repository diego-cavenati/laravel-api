<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = ['html', 'css', 'laravel', 'php', 'vue.js', 'Js', 'MySql'];

        foreach ($tecnologies as $tecnology) {
            $newTecnology = new Tecnology();
            $newTecnology->name = $tecnology;
            $newTecnology->slug = Str::slug($tecnology);
            $newTecnology->save();
        }
    }
}
