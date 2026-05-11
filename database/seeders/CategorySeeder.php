<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electrónicos', 'description' => 'Dispositivos electrónicos y accesorios'],
            ['name' => 'Ropa y Moda', 'description' => 'Prendas de vestir y accesorios de moda'],
            ['name' => 'Hogar', 'description' => 'Artículos para el hogar y decoración'],
            ['name' => 'Deportes', 'description' => 'Equipamiento e indumentaria deportiva'],
            ['name' => 'Libros', 'description' => 'Libros, revistas y material educativo'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
