<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'empleado_access',
            ],
            [
                'id'    => 18,
                'title' => 'agregar_empleado_create',
            ],
            [
                'id'    => 19,
                'title' => 'agregar_empleado_edit',
            ],
            [
                'id'    => 20,
                'title' => 'agregar_empleado_show',
            ],
            [
                'id'    => 21,
                'title' => 'agregar_empleado_delete',
            ],
            [
                'id'    => 22,
                'title' => 'agregar_empleado_access',
            ],
            [
                'id'    => 23,
                'title' => 'caso_access',
            ],
            [
                'id'    => 24,
                'title' => 'flujo_create',
            ],
            [
                'id'    => 25,
                'title' => 'flujo_edit',
            ],
            [
                'id'    => 26,
                'title' => 'flujo_show',
            ],
            [
                'id'    => 27,
                'title' => 'flujo_delete',
            ],
            [
                'id'    => 28,
                'title' => 'flujo_access',
            ],
            [
                'id'    => 29,
                'title' => 'paso_create',
            ],
            [
                'id'    => 30,
                'title' => 'paso_edit',
            ],
            [
                'id'    => 31,
                'title' => 'paso_show',
            ],
            [
                'id'    => 32,
                'title' => 'paso_delete',
            ],
            [
                'id'    => 33,
                'title' => 'paso_access',
            ],
            [
                'id'    => 34,
                'title' => 'agregar_caso_create',
            ],
            [
                'id'    => 35,
                'title' => 'agregar_caso_edit',
            ],
            [
                'id'    => 36,
                'title' => 'agregar_caso_show',
            ],
            [
                'id'    => 37,
                'title' => 'agregar_caso_delete',
            ],
            [
                'id'    => 38,
                'title' => 'agregar_caso_access',
            ],
            [
                'id'    => 39,
                'title' => 'caso_paso_create',
            ],
            [
                'id'    => 40,
                'title' => 'caso_paso_edit',
            ],
            [
                'id'    => 41,
                'title' => 'caso_paso_show',
            ],
            [
                'id'    => 42,
                'title' => 'caso_paso_delete',
            ],
            [
                'id'    => 43,
                'title' => 'caso_paso_access',
            ],
            [
                'id'    => 44,
                'title' => 'documento_access',
            ],
            [
                'id'    => 45,
                'title' => 'agregar_documento_create',
            ],
            [
                'id'    => 46,
                'title' => 'agregar_documento_edit',
            ],
            [
                'id'    => 47,
                'title' => 'agregar_documento_show',
            ],
            [
                'id'    => 48,
                'title' => 'agregar_documento_delete',
            ],
            [
                'id'    => 49,
                'title' => 'agregar_documento_access',
            ],
            [
                'id'    => 50,
                'title' => 'adjunto_create',
            ],
            [
                'id'    => 51,
                'title' => 'adjunto_edit',
            ],
            [
                'id'    => 52,
                'title' => 'adjunto_show',
            ],
            [
                'id'    => 53,
                'title' => 'adjunto_delete',
            ],
            [
                'id'    => 54,
                'title' => 'adjunto_access',
            ],
            [
                'id'    => 55,
                'title' => 'comentario_create',
            ],
            [
                'id'    => 56,
                'title' => 'comentario_edit',
            ],
            [
                'id'    => 57,
                'title' => 'comentario_show',
            ],
            [
                'id'    => 58,
                'title' => 'comentario_delete',
            ],
            [
                'id'    => 59,
                'title' => 'comentario_access',
            ],
            [
                'id'    => 60,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
