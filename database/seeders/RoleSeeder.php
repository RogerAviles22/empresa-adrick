<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name" => "Admin"]);
        $role2 = Role::create(["name" => "Empleado"]);

        Permission::create(["name" => "dashboard"])->syncRoles([$role1, $role2]);

        Permission::create(["name" => "tabla"])->syncRoles([$role1]);
        Permission::create(["name" => "tablaP"])->syncRoles([$role1]);
        Permission::create(["name" => "tablaC"])->syncRoles([$role1]);
        Permission::create(["name" => "tablaV"])->syncRoles([$role1, $role2]);
        Permission::create(["name" => "tablaU"])->syncRoles([$role1]);

        Permission::create(["name" => "category.add"])->syncRoles([$role1]); 
        Permission::create(["name" => "product.add"])->syncRoles([$role1]);
        Permission::create(["name" => "client.add"])->syncRoles([$role1]);
        Permission::create(["name" => "sale.add"])->syncRoles([$role1, $role2]);
        Permission::create(["name" => "user.add"])->syncRoles([$role1]);

        Permission::create(["name" => "category.create"])->syncRoles([$role1]);
        Permission::create(["name" => "product.create"])->syncRoles([$role1]);
        Permission::create(["name" => "client.create"])->syncRoles([$role1]);
        Permission::create(["name" => "sale.create"])->syncRoles([$role1, $role2]);
        Permission::create(["name" => "register"])->syncRoles([$role1]);

        Permission::create(["name" => "category.edit"])->syncRoles([$role1]);
        Permission::create(["name" => "product.edit"])->syncRoles([$role1]);
        Permission::create(["name" => "client.edit"])->syncRoles([$role1]);
        Permission::create(["name" => "sale.edit"])->syncRoles([$role1, $role2]);
        Permission::create(["name" => "user.edit"])->syncRoles([$role1]);

        Permission::create(["name" => "category.update"])->syncRoles([$role1]);
        Permission::create(["name" => "product.update"])->syncRoles([$role1]);
        Permission::create(["name" => "client.update"])->syncRoles([$role1]);
        Permission::create(["name" => "sale.update"])->syncRoles([$role1, $role2]);
        Permission::create(["name" => "user.update"])->syncRoles([$role1]);

        Permission::create(["name" => "category.destroy"])->syncRoles([$role1]);
        Permission::create(["name" => "product.destroy"])->syncRoles([$role1]);
        Permission::create(["name" => "client.destroy"])->syncRoles([$role1]);
        Permission::create(["name" => "sale.destroy"])->syncRoles([$role1, $role2]);
        Permission::create(["name" => "user.destroy"])->syncRoles([$role1]);
    }
}
