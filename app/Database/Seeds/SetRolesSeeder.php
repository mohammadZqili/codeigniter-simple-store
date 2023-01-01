<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\Group;
use Myth\Auth\Models\GroupModel;

class SetRolesSeeder extends Seeder
{
    public function run()
    {
        
        $groupModel = new GroupModel;
        $groupModel->insert([
            'name'=>'super-admin',
            'description'=>'super admin group',
        ]);

        $groupModel->insert([
            'name'=>'admin',
            'description'=>'admin group',
        ]);

        $groupModel->insert([
            'name'=>'customer',
            'description'=>'customer group',
        ]);








    }
}
