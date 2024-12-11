<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // $user = User::create([
    //     'name' => 'Pepe Tester',
    //     'email' => 'admin@gmail.com',
    //     'password' => bcrypt('12345678'),
    // ]);
    $user = User::find(6); // no uso el create porque ya tengo un usuario administrador con esas caracteristicas. TODOS MIS USUARIOS tienen la misma contraseña

    //usuario admin
    $rol = Role::find(1); //que busque el rol con el id 1 que es el admin
    // $rol = Role::create(['name' => 'administrador']);
    $permisos = Permission::pluck('id', 'id')->all();
    $rol->syncPermissions($permisos);
    // $user = User::find(1);
    $user->assignRole('administrador');
    $user->givePermissionTo($permisos); //esto es agregado despues del problema
  }
}

//aprendizaje importante. Olvidé la contraseña de mi user admin y modifiqué desdde la base de datos NUNCA modificar directamente de la db. borre de la db mi user admin y volvi a ejecutar el seeder. ERROR, porque creo un usuario admin pero sin ningun permiso, porque en realidad mi rol admin estaba ligado al id 1 (que antes era mi admin, pero el nuevo tenia id 6). así que tuve que encontrar el id 6 que era mi nuevo usuario y asignarle los érmisos de administrador, y darle, con el givePermissionTo todos los permisos de ese rol