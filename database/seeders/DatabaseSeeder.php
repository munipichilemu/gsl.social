<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['nombre' => 'Cirugía', 'descripcion' => 'Aporte de pago total o parcial al pago de una cirugía.'],
            ['nombre' => 'Ópticos', 'descripcion' => 'Aporte de pago total o parcial a la compra de lentes ópticos.'],
            ['nombre' => 'Combustible', 'descripcion' => 'Aporte de pago total o parcial a la compra de combustible para movilización.'],
            ['nombre' => 'Balón de gas', 'descripcion' => 'Entrega de vale para canje de balón de gas.'],
        ]);
    }
}
