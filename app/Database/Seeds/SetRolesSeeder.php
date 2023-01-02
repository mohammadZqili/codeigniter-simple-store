<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\Group;
use Myth\Auth\Entities\Permission;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class SetRolesSeeder extends Seeder
{
    public function run()
    {

        $groupModel = new GroupModel;
        $superAdminGroupId = $groupModel->insert([
            'name' => 'super-admin',
            'description' => 'super admin group',
        ], true);

        $adminGroupId = $groupModel->insert([
            'name' => 'admin',
            'description' => 'admin group',
        ], true);

        $customerGroupId = $groupModel->insert([
            'name' => 'customer',
            'description' => 'customer group',
        ], true);


        $permissions = [
            'super-admin-permissions' => ['index', 'create', 'edit', 'delete', 'show'],
            'customer-permissions' => ['index', 'create', 'edit', 'delete', 'show']
        ];


        $data = [
            'roles' => [
                'super-admin' => [
                    'id' => $superAdminGroupId,
                    'permissions' => [
                        'users' => $permissions['super-admin-permissions'],
                        'categories' => $permissions['super-admin-permissions'],
                        'brands' => $permissions['super-admin-permissions'],
                        'products' => $permissions['super-admin-permissions']
                    ],
                ],
                'admin' => [
                    'id'=>$adminGroupId,
                    'permissions' => [
                        'users' => ['index', 'create', 'edit', 'show'],
                        'categories' => $permissions['super-admin-permissions'],
                        'brands' => $permissions['super-admin-permissions'],
                        'products' => $permissions['super-admin-permissions']
                    ]
                ],
                'customer' => [
                    'id'=>$customerGroupId,
                    'permissions' => [
                        'categories' => $permissions['customer-permissions'],
                        'brands' => $permissions['customer-permissions'],
                        'products' => $permissions['customer-permissions'],
                        'wish_lists' => ['index', 'create', 'delete'],
                    ]
                ]

            ],


        ];


        foreach ($data['roles'] as $role => $array) {
            foreach ($array['permissions'] as $permissionName => $permissionActions) {
                foreach ($permissionActions as $permission) {
                    $permissionId = (new PermissionModel())->insert(['name' => "$permissionName.$permission"], true);
                    (new GroupModel)->addPermissionToGroup($permissionId, (int)$array['id']);
                }
            }
        }
    }
}
