<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        //comento los anteriores para que no se vuelvan a ejecutar
        // $this->call(DocumentoSeeder::class);
        // $this->call(ComprobanteSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
