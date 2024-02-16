<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devops = User::create([
            'name' => 'DevOps Informática',
            'email' => 'devops.informatica@pichilemu.cl',
            'email_verified_at' => now(),
            'password' => '$2y$12$3fD/VL65SmkjBCtG5afetu/YzdWSVrMcdjVqN4cKv.qQ85Cnj.eGK',
        ]);

        $devops->assignRole('super_admin');

        $ofinf = User::create([
            'name' => 'Oficina Informática',
            'email' => 'oficina.informatica@pichilemu.cl',
            'email_verified_at' => now(),
            'password' => '$2y$12$rPaIFXGFI9efRLKO3lb5e.WX2LKLJdUV9DAgILtDguKMzZSMyOrb.',
        ]);

        $ofinf->assignRole('super_admin');
    }
}
