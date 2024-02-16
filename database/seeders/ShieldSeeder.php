<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_ayuda","view_any_ayuda","create_ayuda","update_ayuda","restore_ayuda","restore_any_ayuda","replicate_ayuda","reorder_ayuda","delete_ayuda","delete_any_ayuda","force_delete_ayuda","force_delete_any_ayuda","view_beneficiario","view_any_beneficiario","create_beneficiario","update_beneficiario","restore_beneficiario","restore_any_beneficiario","replicate_beneficiario","reorder_beneficiario","delete_beneficiario","delete_any_beneficiario","force_delete_beneficiario","force_delete_any_beneficiario","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_tipo","view_any_tipo","create_tipo","update_tipo","restore_tipo","restore_any_tipo","replicate_tipo","reorder_tipo","delete_tipo","delete_any_tipo","force_delete_tipo","force_delete_any_tipo","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"admin","guard_name":"web","permissions":["view_ayuda","view_any_ayuda","create_ayuda","update_ayuda","restore_ayuda","restore_any_ayuda","replicate_ayuda","reorder_ayuda","delete_ayuda","delete_any_ayuda","force_delete_ayuda","force_delete_any_ayuda","view_beneficiario","view_any_beneficiario","create_beneficiario","update_beneficiario","restore_beneficiario","restore_any_beneficiario","replicate_beneficiario","reorder_beneficiario","delete_beneficiario","delete_any_beneficiario","force_delete_beneficiario","force_delete_any_beneficiario","view_tipo","view_any_tipo","create_tipo","update_tipo","restore_tipo","restore_any_tipo","replicate_tipo","reorder_tipo","delete_tipo","delete_any_tipo","force_delete_tipo","force_delete_any_tipo","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"user","guard_name":"web","permissions":["view_ayuda","view_any_ayuda","create_ayuda","update_ayuda","replicate_ayuda","reorder_ayuda","view_beneficiario","view_any_beneficiario","create_beneficiario","update_beneficiario","replicate_beneficiario","reorder_beneficiario"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
