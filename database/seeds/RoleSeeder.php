<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;
use Ulid\Ulid;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startTime = microtime(true);

        Role::query()->truncate();
        User::query()->truncate();

        $roleId = (string) Ulid::generate();
        Role::insert([
            [
                'id' => $roleId,
                'role_name' => 'Administrator',
                'role_permission' => json_encode([
                    'departments' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 1,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                    'users' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 1,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                    'employees' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 1,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                ]),
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ], [
                'id' => (string) Ulid::generate(),
                'role_name' => 'Admin',
                'role_permission' => json_encode([
                    'departments' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 0,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                    'users' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 0,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                    'employees' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 0,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                ]),
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ], [
                'id' => (string) Ulid::generate(),
                'role_name' => 'Manage',
                'role_permission' => json_encode([
                    'departments' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 0,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                    'users' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 0,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                    'employees' => [
                        'list' => 1,
                        'edit' => 1,
                        'create' => 1,
                        'delete' => 0,
                        'detail' => 1,
                        'confirm' => 1,
                        'complete' => 1,
                        'admin' => 1,
                    ],
                ]),
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ], [
                'id' => (string) Ulid::generate(),
                'role_name' => 'Guest',
                'role_permission' => json_encode([
                    'departments' => [
                        'list' => 1,
                        'edit' => 0,
                        'create' => 0,
                        'delete' => 0,
                        'detail' => 0,
                        'confirm' => 0,
                        'complete' => 0,
                        'admin' => 1,
                    ],
                    'users' => [
                        'list' => 1,
                        'edit' => 0,
                        'create' => 0,
                        'delete' => 0,
                        'detail' => 0,
                        'confirm' => 0,
                        'complete' => 0,
                        'admin' => 1,
                    ],
                    'employees' => [
                        'list' => 1,
                        'edit' => 0,
                        'create' => 0,
                        'delete' => 0,
                        'detail' => 0,
                        'confirm' => 0,
                        'complete' => 0,
                        'admin' => 1,
                    ],
                ]),
                'created_by' => 'SYSTEM',
                'updated_by' => 'SYSTEM',
            ]
        ]);

        User::create([
            'id' => (string) Ulid::generate(),
            'name' => 'ThanhDc2',
            'email' => 'thanhdc2@rikkeisoft.com',
            'password' => bcrypt('thanh123'),
            'role_id' => $roleId,
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
        ]);

        echo (microtime(true) - $startTime) . " sec.\n";
    }
}
