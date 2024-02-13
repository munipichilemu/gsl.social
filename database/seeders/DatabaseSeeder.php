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

        /* Crear beneficiarios de prueba */
        Beneficiario::insert([
            ['id' => 1, 'rut_num' => 12345678, 'rut_vd' => '5', 'names' => 'Juan Carlos', 'lastname_1' => 'Pérez', 'lastname_2' => 'Muñoz', 'address' => 'Calle Falsa 123', 'phone' => 912345678, 'nationality' => 'CL', 'annotations' => 'Beneficiario de prueba. **No contactar.**'],
            ['id' => 2, 'rut_num' => 23456789, 'rut_vd' => '6', 'names' => 'María José', 'lastname_1' => 'Soto', 'lastname_2' => 'Gómez', 'address' => 'Avenida Siempreviva 456', 'phone' => 923456789, 'nationality' => 'CL', 'annotations' => 'Beneficiaria de prueba. **Manejar con cuidado.**'],
            ['id' => 3, 'rut_num' => 34567890, 'rut_vd' => '7', 'names' => 'Roberto Andrés', 'lastname_1' => 'López', 'lastname_2' => 'Martínez', 'address' => 'Pasaje Inventado 789', 'phone' => 934567890, 'nationality' => 'CL', 'annotations' => 'Beneficiario de prueba. **No llamar.**'],
            ['id' => 4, 'rut_num' => 45678901, 'rut_vd' => '1', 'names' => 'Ana María', 'lastname_1' => 'González', 'lastname_2' => 'Fernández', 'address' => 'Callejón de los Milagros 101', 'phone' => 945678901, 'nationality' => 'CL', 'annotations' => 'Beneficiaria de prueba. **Contacto restringido.**'],
            ['id' => 5, 'rut_num' => 23918487, 'rut_vd' => '1', 'names' => 'José Francisca', 'lastname_1' => 'Martínez', 'lastname_2' => 'Díaz', 'address' => 'Pasaje Secreto 789', 'phone' => 912202534, 'nationality' => 'CL', 'annotations' => '**Enviar documentación por correo.**'],
            ['id' => 6, 'rut_num' => 21994053, 'rut_vd' => 'K', 'names' => 'Sofía Carolina', 'lastname_1' => 'Sánchez', 'lastname_2' => 'Ruiz', 'address' => 'Pasaje Secreto 789', 'phone' => 912848618, 'nationality' => 'CL', 'annotations' => '**Chequear historial de pagos.**'],
            ['id' => 7, 'rut_num' => 21349535, 'rut_vd' => '6', 'names' => 'José Alejandro', 'lastname_1' => 'Sánchez', 'lastname_2' => 'Sánchez', 'address' => 'Avenida del Mar 505', 'phone' => 902657056, 'nationality' => 'CL', 'annotations' => '**Revisar datos de contacto.**'],
            ['id' => 8, 'rut_num' => 23498597, 'rut_vd' => '3', 'names' => 'Carolina Roberto', 'lastname_1' => 'López', 'lastname_2' => 'Díaz', 'address' => 'Callejón Oscuro 606', 'phone' => 953426532, 'nationality' => 'CL', 'annotations' => '**Solicitar confirmación de cita.**'],
            ['id' => 9, 'rut_num' => 17568636, 'rut_vd' => '3', 'names' => 'Daniela Sofía', 'lastname_1' => 'Díaz', 'lastname_2' => 'Fernández', 'address' => 'Sendero de Luna 303', 'phone' => 958541909, 'nationality' => 'CL', 'annotations' => '**Solicitar confirmación de cita.**'],
            ['id' => 10, 'rut_num' => 16909448, 'rut_vd' => '9', 'names' => 'Andrea Francisca', 'lastname_1' => 'Gómez', 'lastname_2' => 'López', 'address' => 'Sendero de Luna 303', 'phone' => 950840576, 'nationality' => 'CL', 'annotations' => '**Actualizar dirección.**'],
            ['id' => 11, 'rut_num' => 11642555, 'rut_vd' => '6', 'names' => 'Carolina Daniela', 'lastname_1' => 'Pérez', 'lastname_2' => 'García', 'address' => 'Paseo de los Olivos 404', 'phone' => 984830931, 'nationality' => 'CL', 'annotations' => '**Priorizar en listado de espera.**'],
            ['id' => 12, 'rut_num' => 16020737, 'rut_vd' => 'K', 'names' => 'José Andrea', 'lastname_1' => 'Sánchez', 'lastname_2' => 'Rodríguez', 'address' => 'Avenida del Mar 505', 'phone' => 946653402, 'nationality' => 'CL', 'annotations' => '**Solicitar confirmación de cita.**'],
            ['id' => 13, 'rut_num' => 9733067, 'rut_vd' => '0', 'names' => 'Andrea Alejandro', 'lastname_1' => 'Fernández', 'lastname_2' => 'Díaz', 'address' => 'Ruta del Sol 202', 'phone' => 968917046, 'nationality' => 'CL', 'annotations' => '**Chequear historial de pagos.**'],
            ['id' => 14, 'rut_num' => 23052895, 'rut_vd' => '0', 'names' => 'Francisca Andrea', 'lastname_1' => 'Gómez', 'lastname_2' => 'Gómez', 'address' => 'Pasaje Secreto 789', 'phone' => 958674699, 'nationality' => 'CL', 'annotations' => '**Revisar datos de contacto.**'],
            ['id' => 15, 'rut_num' => 24344726, 'rut_vd' => '7', 'names' => 'José Francisca', 'lastname_1' => 'Martínez', 'lastname_2' => 'Gómez', 'address' => 'Callejón Oscuro 606', 'phone' => 901632655, 'nationality' => 'CL', 'annotations' => '**Solicitar confirmación de cita.**'],
            ['id' => 16, 'rut_num' => 12755372, 'rut_vd' => '6', 'names' => 'Andrea Alejandro', 'lastname_1' => 'Pérez', 'lastname_2' => 'Martínez', 'address' => 'Camino Largo 101', 'phone' => 977498981, 'nationality' => 'CL', 'annotations' => '**Chequear historial de pagos.**'],
            ['id' => 17, 'rut_num' => 23247401, 'rut_vd' => '7', 'names' => 'Sofía Daniela', 'lastname_1' => 'García', 'lastname_2' => 'López', 'address' => 'Avenida del Mar 505', 'phone' => 905966442, 'nationality' => 'CL', 'annotations' => '**Contacto preferente por email.**'],
            ['id' => 18, 'rut_num' => 16785520, 'rut_vd' => '2', 'names' => 'Antonio Antonio', 'lastname_1' => 'Rodríguez', 'lastname_2' => 'Martínez', 'address' => 'Plaza Central 707', 'phone' => 929962310, 'nationality' => 'CL', 'annotations' => '**Contacto preferente por email.**'],
            ['id' => 19, 'rut_num' => 11805884, 'rut_vd' => '4', 'names' => 'Mauricio José', 'lastname_1' => 'Gómez', 'lastname_2' => 'Fernández', 'address' => 'Calle Uno 123', 'phone' => 986923912, 'nationality' => 'CL', 'annotations' => '**Priorizar en listado de espera.**'],
            ['id' => 20, 'rut_num' => 5150093, 'rut_vd' => '8', 'names' => 'Alejandro José', 'lastname_1' => 'Pérez', 'lastname_2' => 'Sánchez', 'address' => 'Avenida Principal 456', 'phone' => 943018994, 'nationality' => 'CL', 'annotations' => '**Chequear historial de pagos.**'],
            ['id' => 21, 'rut_num' => 21152096, 'rut_vd' => '5', 'names' => 'José Carolina', 'lastname_1' => 'Díaz', 'lastname_2' => 'Fernández', 'address' => 'Camino Largo 101', 'phone' => 980687413, 'nationality' => 'CL', 'annotations' => '**Contacto preferente por email.**'],
            ['id' => 22, 'rut_num' => 14510070, 'rut_vd' => '4', 'names' => 'Daniela José', 'lastname_1' => 'Rodríguez', 'lastname_2' => 'López', 'address' => 'Camino Largo 101', 'phone' => 961740073, 'nationality' => 'CL', 'annotations' => '**Enviar documentación por correo.**'],
            ['id' => 23, 'rut_num' => 14747899, 'rut_vd' => '2', 'names' => 'Antonio José', 'lastname_1' => 'García', 'lastname_2' => 'Rodríguez', 'address' => 'Ruta del Sol 202', 'phone' => 962756781, 'nationality' => 'CL', 'annotations' => '**Priorizar en listado de espera.**'],
            ['id' => 24, 'rut_num' => 3347585, 'rut_vd' => '3', 'names' => 'Francisca Antonio', 'lastname_1' => 'Díaz', 'lastname_2' => 'García', 'address' => 'Avenida Principal 456', 'phone' => 914690067, 'nationality' => 'CL', 'annotations' => '**No llamar antes de las 10:00.**'],
            ['id' => 25, 'rut_num' => 16323905, 'rut_vd' => '1', 'names' => 'José Andrea', 'lastname_1' => 'García', 'lastname_2' => 'López', 'address' => 'Camino Largo 101', 'phone' => 951712439, 'nationality' => 'CL', 'annotations' => '**Chequear historial de pagos.**'],
            ['id' => 26, 'rut_num' => 15321571, 'rut_vd' => '5', 'names' => 'Daniela Carolina', 'lastname_1' => 'Pérez', 'lastname_2' => 'Díaz', 'address' => 'Avenida Principal 456', 'phone' => 965773091, 'nationality' => 'CL', 'annotations' => '**Verificar datos bancarios.**'],
            ['id' => 27, 'rut_num' => 9295348, 'rut_vd' => '3', 'names' => 'Carolina Francisca', 'lastname_1' => 'López', 'lastname_2' => 'Rodríguez', 'address' => 'Paseo de los Olivos 404', 'phone' => 934603786, 'nationality' => 'CL', 'annotations' => '**Contacto preferente por email.**'],
            ['id' => 28, 'rut_num' => 7903269, 'rut_vd' => '7', 'names' => 'Sofía Mauricio', 'lastname_1' => 'López', 'lastname_2' => 'García', 'address' => 'Sendero de Luna 303', 'phone' => 950238184, 'nationality' => 'CL', 'annotations' => '**Preferencia de contacto: WhatsApp.**'],
        ]);
    }
}
