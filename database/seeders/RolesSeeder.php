<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'roles'=>'Administrador'
        ]);
        DB::table('roles')->insert([
            'roles'=>'Docente'
        ]);
        DB::table('roles')->insert([
            'roles'=>'Estudiante'
        ]);
        DB::table('roles')->insert([
            'roles'=>'Jefe Posgrado'
        ]);
        DB::table('roles')->insert([
            'roles'=>'Coordinador'
        ]);
        DB::table('roles')->insert([
            'roles'=>'Asistente Coordinador'
        ]);
        DB::table('roles')->insert([
            'roles'=>'Secretaria'
        ]);
    }
}
