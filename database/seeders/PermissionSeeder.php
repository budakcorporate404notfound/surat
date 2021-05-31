<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.list']);

        Permission::create(['name' => 'inventory.add']);
        Permission::create(['name' => 'inventory.list']);

        Permission::create(['name' => 'report.user']);
        Permission::create(['name' => 'report.inventory']);


        //Role for Admin
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('inventory.add');
        $role1->givePermissionTo('inventory.list');
        $role1->givePermissionTo('user.list');
        $role1->givePermissionTo('user.create');
        $role1->givePermissionTo('report.user');
        $role1->givePermissionTo('report.inventory');


        //Role for Supervisor
        $role2 = Role::create(['name' => 'supervisor']);
        $role2->givePermissionTo('inventory.add');
        $role2->givePermissionTo('inventory.list');
        $role2->givePermissionTo('user.list');
        $role1->givePermissionTo('user.create');

        //Role for Staff
        $role3 = Role::create(['name' => 'staff']);
        $role3->givePermissionTo('inventory.add');
        $role3->givePermissionTo('inventory.list');



        //Asign User to Role

        //Admin
        $user1 = User::find(1);
        $user1->assignRole($role1);

        //Supervisor
        $user2 = User::find(2);
        $user2->assignRole($role2);

        $user3 = User::find(3);
        $user3->assignRole($role3);
    }
}
