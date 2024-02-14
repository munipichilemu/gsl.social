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
        /* Crear tipos de ayudas */
        Tipo::insert([
            ['id' => 1, 'name' => 'Educación Superior', 'description' => 'Aporte para mensualidad o arancel de institución de Educación Superior.', 'created_at' => '2024-02-12 18:29:46', 'updated_at' => '2024-02-12 18:37:08', 'deleted_at' => null],
            ['id' => 2, 'name' => 'Defunción', 'description' => 'Aporte para pago de Servicio Funerario o Derecho de Sepultación.', 'created_at' => '2024-02-12 18:30:55', 'updated_at' => '2024-02-12 18:37:14', 'deleted_at' => null],
            ['id' => 3, 'name' => 'Arriendo en la comuna', 'description' => 'Aporte para pago de arriendo habitacional en la comuna.', 'created_at' => '2024-02-12 18:33:08', 'updated_at' => '2024-02-12 18:33:08', 'deleted_at' => null],
            ['id' => 4, 'name' => 'Arriendo estudiantil', 'description' => 'Aporte para pago de arriendo estudiantil fuera de la comuna.', 'created_at' => '2024-02-12 18:33:34', 'updated_at' => '2024-02-12 18:33:34', 'deleted_at' => null],
            ['id' => 5, 'name' => 'Servicios Básicos', 'description' => 'Aporte para pago de servicios básicos (agua, electricidad).', 'created_at' => '2024-02-12 18:34:21', 'updated_at' => '2024-02-12 18:34:21', 'deleted_at' => null],
            ['id' => 6, 'name' => 'Materiales de construcción', 'description' => 'Aporte para compra de materiales de construcción.', 'created_at' => '2024-02-12 18:34:42', 'updated_at' => '2024-02-12 18:34:42', 'deleted_at' => null],
            ['id' => 7, 'name' => 'Instalación de suministros básicos', 'description' => 'Aporte para pago de instalación de suministros básicos (empalme eléctrico, arranque de agua, conexión a alcantarillado).', 'created_at' => '2024-02-12 18:35:47', 'updated_at' => '2024-02-12 18:35:47', 'deleted_at' => null],
            ['id' => 8, 'name' => 'Pañales', 'description' => 'Aporte para compra de pañales para niños o adultos con alguna enfermedad invalidante.', 'created_at' => '2024-02-12 18:37:02', 'updated_at' => '2024-02-12 18:37:02', 'deleted_at' => null],
            ['id' => 9, 'name' => 'Suplemento alimenticio', 'description' => 'Aporte para compra de alimentación especial o suplemento alimenticio.', 'created_at' => '2024-02-12 18:37:51', 'updated_at' => '2024-02-12 18:37:51', 'deleted_at' => null],
            ['id' => 10, 'name' => 'Exámenes', 'description' => 'Aporte para pago de exámenes o procedimientos médicos.', 'created_at' => '2024-02-12 18:38:30', 'updated_at' => '2024-02-12 18:38:30', 'deleted_at' => null],
            ['id' => 11, 'name' => 'Dental', 'description' => 'Aporte para tratamiento dental.', 'created_at' => '2024-02-12 18:38:46', 'updated_at' => '2024-02-12 18:38:46', 'deleted_at' => null],
            ['id' => 12, 'name' => 'Médico especialista', 'description' => 'Aporte para pago de consultas médicas o tratamiento con especialistas.', 'created_at' => '2024-02-12 18:41:35', 'updated_at' => '2024-02-12 18:41:35', 'deleted_at' => null],
            ['id' => 13, 'name' => 'Medicamentos', 'description' => 'Aporte para compra de medicamentos.', 'created_at' => '2024-02-12 18:43:05', 'updated_at' => '2024-02-12 18:43:05', 'deleted_at' => null],
            ['id' => 14, 'name' => 'Lentes ópticos', 'description' => 'Aporte para compra de lentes ópticos o de contacto óptico.', 'created_at' => '2024-02-12 18:44:09', 'updated_at' => '2024-02-12 18:44:09', 'deleted_at' => null],
            ['id' => 15, 'name' => 'Audífonos', 'description' => 'Aporte para compra de audífonos.', 'created_at' => '2024-02-12 18:44:23', 'updated_at' => '2024-02-12 18:44:23', 'deleted_at' => null],
            ['id' => 16, 'name' => 'Pasajes/Combustible', 'description' => 'Aporte para pasajes de locomoción colectiva o carga de combustible para asistir a controles médicos.', 'created_at' => '2024-02-12 18:46:14', 'updated_at' => '2024-02-12 18:46:14', 'deleted_at' => null],
            ['id' => 17, 'name' => 'Kinesiólogo', 'description' => 'Aporte para pago de tratamiento o rehabilitación kinésica.', 'created_at' => '2024-02-12 18:46:39', 'updated_at' => '2024-02-12 18:46:39', 'deleted_at' => null],
            ['id' => 18, 'name' => 'Cirugía y hospitalización', 'description' => 'Aporte para pago de cirugías o deudas por hospitalización.', 'created_at' => '2024-02-12 18:47:40', 'updated_at' => '2024-02-12 18:47:40', 'deleted_at' => null],
            ['id' => 19, 'name' => 'Caja de alimentos', 'description' => 'Entrega de caja de mercadería.', 'created_at' => '2024-02-12 18:48:07', 'updated_at' => '2024-02-12 18:48:07', 'deleted_at' => null],
            ['id' => 20, 'name' => 'Vales de gas', 'description' => 'Aporte para compra de balón de gas mediante canje de vale.', 'created_at' => '2024-02-12 18:50:56', 'updated_at' => '2024-02-12 18:50:56', 'deleted_at' => null],
        ]);
    }
}
