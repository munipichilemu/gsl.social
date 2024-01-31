<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Marco González Luengo',
            'email' => 'dev@nqu.me',
            'password' => "$2y$12$uQe.2KpdchyI.cQR6FKVveJaao/TTEGQdJhYFf.vfaBOEXBmJTJEa",
            'remember_token' => 'Hql8wCaPM91f1cOAvZ8nCIqzMP5uJnx29auXgxjTGYebVD3vqTKyoxUuKnvV',
        ]);
    }
}
