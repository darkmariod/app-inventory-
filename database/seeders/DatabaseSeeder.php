<?php

namespace Database\Seeders;

use App\Models\Product;
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
        // User::factory(10)->create();

        User::firstOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Admin',
            'password' => 'password',
        ]);

        $this->call([
            CategorySeeder::class,
            IdentitySeeder::class,
        ]);

        Product::factory(100)->create();
    }
}
