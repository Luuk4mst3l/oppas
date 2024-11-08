<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Listing::factory(10)->create();

        // Listing::create([
        //     'title' => 'listing 1',
        //     'tags' => 'request',
        //     'description' => 'Lorem ipsum dolor sit amet hahaha hah hdf ahsdfhasdf hasdfh ashdfhasdf hasdhf ashdf ahsdf hasdfh a'
        // ]);

        // Listing::create([
        //     'title' => 'listing 2',
        //     'tags' => 'request, ',
        //     'description' => 'Lorem ipsum dolor sit amet hahaha hah hdf ahsdfhasdf hasdfh ashdfhasdf hasdhf ashdf ahsdf hasdfh a'
        // ]);
    }
}
