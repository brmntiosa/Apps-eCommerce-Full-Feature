<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder UsersTableSeeder
        $this->call(UsersTableSeeders::class);

        // Uncomment code below if you want to use Model Factories
        // \App\Models\User::factory(10)->create();

        // Uncomment code below if you want to create a specific user
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
