<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);

        if (app()->environment('local')) {
            $this->call(DevSeeder::class);
        }

        if (app()->environment('testing')) {
            $this->call(TestSeeder::class);
        }
    }
}
