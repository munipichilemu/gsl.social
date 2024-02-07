<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Beneficiario;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Crear un usuario */
        User::create([
            'id' => 1,
            'name' => 'Marco González Luengo',
            'email' => 'dev@nqu.me',
            'password' => '$2y$12$uQe.2KpdchyI.cQR6FKVveJaao/TTEGQdJhYFf.vfaBOEXBmJTJEa',
            'remember_token' => 'Hql8wCaPM91f1cOAvZ8nCIqzMP5uJnx29auXgxjTGYebVD3vqTKyoxUuKnvV',
        ]);

        /* Crear tipos de prueba */
        Tipo::insert([
            ['name' => 'Cirugía', 'description' => 'Aporte de pago total o parcial al pago de una cirugía.'],
            ['name' => 'Ópticos', 'description' => 'Aporte de pago total o parcial a la compra de lentes ópticos.'],
            ['name' => 'Combustible', 'description' => 'Aporte de pago total o parcial a la compra de combustible para movilización.'],
            ['name' => 'Balón de gas', 'description' => 'Entrega de vale para canje de balón de gas.'],
        ]);

        /* Crear beneficiarios de prueba */
        Beneficiario::insert([
            ['id' => 1, 'rut_num' => 16678978, 'rut_vd' => '8', 'names' => 'Marco Ariel', 'lastname_1' => 'González', 'lastname_2' => 'Luengo', 'address' => 'Ángel Gaete 365', 'phone' => 998827027, 'nationality' => 'CL', 'annotations' => 'Beneficiario de prueba. **No molestar.**'],
            ['id' => 2, 'rut_num' => 10878290, 'rut_vd' => '0', 'names' => 'Marta Noemí', 'lastname_1' => 'Luengo', 'lastname_2' => 'Zambrano', 'address' => 'Manuel Thompson 40', 'phone' => 976409171, 'nationality' => 'CL', 'annotations' => 'Beneficiaria de prueba. **Dejar tranquila.**'],
        ]);
    }
}
