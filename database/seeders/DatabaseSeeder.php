<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusSeeder::class);
        $this->call(UserSeeder::class);
        
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Usuario']);
        Permission::create(['name' => 'editar tarefas']);
        
        // Atribuindo permissão à role "Administrador"
        $role = Role::findByName('Administrador');
        $role->givePermissionTo('editar tarefas');

        // Atribuir Role ao usuário admin
        $userAdmin = User::find(1); 
        $roleAdministrador = Role::findByName('Administrador');
        $userAdmin->assignRole($roleAdministrador);
    }
}
