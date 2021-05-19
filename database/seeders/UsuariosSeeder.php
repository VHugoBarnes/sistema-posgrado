<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /////////////////////////////////////////////////////////////// ADMINISTRADOR

        DB::table('usuarios')->insert([
            'id' => 1,
            'nombre' => 'Víctor Hugo',
            'apellidos' => 'Vázquez Gómez',
            'email' => 'hugovg799@gmail.com',
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 1,
            'role_id' => 1,
            'usuario_id' => 1
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 1
        
        DB::table('usuarios')->insert([
            'id' => 2, // Cambiar
            'nombre' => 'Paola', // Cambiar
            'apellidos' => 'Almanza Villarreal', // Cambiar
            'email' => 'estudiante1@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 2, // Cambiar
            'role_id' => 3,
            'usuario_id' => 2 // Cambiar
        ]);
        DB::table('estudiantes')->insert([
            'id' => 1, // Cambiar
            'usuario_id' => 2, // Cambiar
            'numero_control' => '17260628', // Cambiar
            'generacion' => '2019-2021' // Cambiar
        ]);
        DB::table('tesis')->insert([
            'id' => 1, // Cambiar
            'estudiante_id' => 1, // Cambiar
            'titulo' => 'Implementación del Sistema Karakuri en una empresa de giro automotriz.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 2
        
        DB::table('usuarios')->insert([
            'id' => 3, // Cambiar
            'nombre' => 'Hugo Badhir', // Cambiar
            'apellidos' => 'Izaguirre Armendáriz', // Cambiar
            'email' => 'estudiante2@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 3, // Cambiar
            'role_id' => 3,
            'usuario_id' => 3 // Cambiar
        ]);
        DB::table('estudiantes')->insert([
            'id' => 2, // Cambiar
            'usuario_id' => 3, // Cambiar
            'numero_control' => '17260620', // Cambiar
            'generacion' => '2020-2022' // Cambiar
        ]);
        DB::table('tesis')->insert([
            'id' => 2, // Cambiar
            'estudiante_id' => 2, // Cambiar
            'titulo' => 'Mejoramiento del Proceso para el cierre de programas automotrices en SPO.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 3
        
        DB::table('usuarios')->insert([
            'id' => 4, // Cambiar
            'nombre' => 'Karyme Vianey', // Cambiar
            'apellidos' => 'Olivarez', // Cambiar
            'email' => 'estudiante3@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 4, // Cambiar
            'role_id' => 3,
            'usuario_id' => 4 // Cambiar
        ]);
        DB::table('estudiantes')->insert([
            'id' => 3, // Cambiar
            'usuario_id' => 4, // Cambiar
            'numero_control' => '17260621', // Cambiar
            'generacion' => '2019-2021' // Cambiar
        ]);
        DB::table('tesis')->insert([
            'id' => 3, // Cambiar
            'estudiante_id' => 3, // Cambiar
            'titulo' => 'El emprendimiento como estrategia de desarrollo en México.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 4
        
        DB::table('usuarios')->insert([
            'id' => 5, // Cambiar
            'nombre' => 'Alan', // Cambiar
            'apellidos' => 'Amezcua Mejía', // Cambiar
            'email' => 'estudiante4@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 5, // Cambiar
            'role_id' => 3,
            'usuario_id' => 5 // Cambiar
        ]);
        DB::table('estudiantes')->insert([
            'id' => 4, // Cambiar
            'usuario_id' => 5, // Cambiar
            'numero_control' => '17260622', // Cambiar
            'generacion' => '2020-2022' // Cambiar
        ]);
        DB::table('tesis')->insert([
            'id' => 4, // Cambiar
            'estudiante_id' => 4, // Cambiar
            'titulo' => 'Buenas prácticas para un ambiente sano y seguro.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 5
        
        DB::table('usuarios')->insert([
            'id' => 6, // Cambiar
            'nombre' => 'Jacinto Oscar', // Cambiar
            'apellidos' => 'Jaramillo', // Cambiar
            'email' => 'estudiante5@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 6, // Cambiar
            'role_id' => 3,
            'usuario_id' => 6 // Cambiar
        ]);
        DB::table('estudiantes')->insert([
            'id' => 5, // Cambiar
            'usuario_id' => 6, // Cambiar
            'numero_control' => '17260625', // Cambiar
            'generacion' => '2019-2021' // Cambiar
        ]);
        DB::table('tesis')->insert([
            'id' => 5, // Cambiar
            'estudiante_id' => 5, // Cambiar
            'titulo' => 'Elaboración de gel desinfectante a base de dióxido de cloro de bajo costo.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 1
        
        DB::table('usuarios')->insert([
            'id' => 7, // Cambiar
            'nombre' => 'Claudio Alejandro', // Cambiar
            'apellidos' => 'Alcalá Salinas', // Cambiar
            'email' => 'docente1@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 7, // Cambiar
            'role_id' => 5,
            'usuario_id' => 7 // Cambiar
        ]);
        DB::table('docentes')->insert([
            'id' => 1, // Cambiar
            'usuario_id' => 7 // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 2
        DB::table('usuarios')->insert([
            'id' => 8, // Cambiar
            'nombre' => 'Wendy Aracely', // Cambiar
            'apellidos' => 'Sánchez Gómez', // Cambiar
            'email' => 'docente2@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 8, // Cambiar
            'role_id' => 5,
            'usuario_id' => 8 // Cambiar
        ]);
        DB::table('docentes')->insert([
            'id' => 2, // Cambiar
            'usuario_id' => 8 // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 3
        DB::table('usuarios')->insert([
            'id' => 9, // Cambiar
            'nombre' => 'José Javier ', // Cambiar
            'apellidos' => 'Treviño Uribe', // Cambiar
            'email' => 'docente3@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 9, // Cambiar
            'role_id' => 2,
            'usuario_id' => 9 // Cambiar
        ]);
        DB::table('docentes')->insert([
            'id' => 3, // Cambiar
            'usuario_id' => 9 // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 4
        DB::table('usuarios')->insert([
            'id' => 10, // Cambiar
            'nombre' => 'Anabel', // Cambiar
            'apellidos' => 'Pineda Briseño', // Cambiar
            'email' => 'docente4@mail.com', // Cambiar
            'password' => Hash::make('pass1234')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 10, // Cambiar
            'role_id' => 5,
            'usuario_id' => 10 // Cambiar
        ]);
        DB::table('docentes')->insert([
            'id' => 4, // Cambiar
            'usuario_id' => 10 // Cambiar
        ]);

    }
}
