<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(200)->create();

        // \App\Models\User::factory()->create([
        //     'first_name' => 'Lily',
        //     'last_name' => 'Yirgu',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(JobSeeder::class);
    }
}
