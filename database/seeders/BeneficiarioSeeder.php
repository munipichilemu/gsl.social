<?php

namespace Database\Seeders;

use App\Models\Beneficiario;
use Illuminate\Database\Seeder;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beneficiario::factory()
            ->count(1500)
            ->create();
    }
}
