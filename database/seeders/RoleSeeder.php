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
        {
            $role1= Role::create(['name'=>'Administrador']);
            $role2= Role::create(['name'=>'Jefe de Distribución']);
            $role3= Role::create(['name'=>'Accionista']);
            $role4= Role::create(['name'=>'Empaquetador']);
    
            Permission::create(['name' => 'dashboard'])->syncRoles($role1,$role2,$role3,$role4);
            
            Permission::create(['name' => 'users-read'])->assignRole($role1);
            Permission::create(['name' => 'users-create'])->assignRole($role1);
            Permission::create(['name' => 'users-update'])->assignRole($role1);
            Permission::create(['name' => 'users-destroy'])->assignRole($role1);
        }
    }
}
