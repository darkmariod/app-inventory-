<?php

namespace Database\Seeders;

use App\Models\Identity;
use Illuminate\Database\Seeder;

class IdentitySeeder extends Seeder
{
    public function run(): void
    {
        $identities = [
            ['name' => 'DNI'],
            ['name' => 'CUIT/CUIL'],
            ['name' => 'Pasaporte'],
            ['name' => 'Cédula'],
        ];

        foreach ($identities as $identity) {
            Identity::create($identity);
        }
    }
}
