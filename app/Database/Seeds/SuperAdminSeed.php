<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\UserModel;

class SuperAdminSeed extends Seeder
{
    public function run()
    {
        $user = new User([
            'name' => 'super-admin',
            'email' => 'superadmin@admin.com',
            'username' => 'superadmin',
            'password' => 'super-admin@123',
            'pass_confirm' => 'super-admin@123',
            'active' => 1
        ]);
        (new UserModel)->withGroup("super-admin")->insert($user);
    }
}
