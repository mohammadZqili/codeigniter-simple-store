<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;

class SuperAdminSeed extends Seeder
{
    public function run()
    {
        $user = (new UserModel)->where('email', 'superadmin@admin.com')->first();
        $userID = $user ? $user->id : null;
        if($userID == null){
            $userID = (new UserModel)->insert(new User([
                'name' => 'super-admin',
                'email' => 'superadmin@admin.com',
                'username' => 'superadmin',
                'password' => 'sup55er-admin@123',
                'pass_confirm' => 'sup55er-admin@123',
                'active'=>1
            ]), true);

        }



        $group = (new GroupModel)->where('name','super-admin')->first();
        (new GroupModel)->addUserToGroup($userID , $group->id);

    }
}
