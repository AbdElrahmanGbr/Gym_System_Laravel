<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StaffSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(GymManagerSeeder::class);
        // $this->call(CitySeeder::class);
        // $this->call(GymCoachSeeder::class);
        // $this->call(CoachSessionSeeder::class);
        // $this->call(GymSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
