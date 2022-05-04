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
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(StaffSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(GymSeeder::class);
        $this->call(GymManagerSeeder::class);
        $this->call(SessionSeeder::class);
        $this->call(SessionUserSeeder::class);
        $this->call(SessionStaffSeeder::class);
        $this->call(GymCoachSeeder::class);
        $this->call(TrainingPackageSeeder::class);
        $this->call(UserTrainingPackageSeeder::class);

        // \App\Models\User::factory(10)->create();
    }
}
