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

        /////////////////////////////////////////////////////////////// PROGRAMAS
        DB::table('programas')->insert([
            'id' => 1,
            'nombre' => 'Maestría en Administración Industrial',
            'orientacion' => 'N'
        ]);

        /////////////////////////////////////////////////////////////// LINEAS
        DB::table('lineas_investigacion')->insert([
            'id' => 1,
            'nombre' => 'Gestión y Desarrollo Empresarial'
        ]);
        DB::table('lineas_investigacion')->insert([
            'id' => 2,
            'nombre' => 'Gestión del Talento Humano y Comportamiento Organizacional'
        ]);
        DB::table('lineas_investigacion')->insert([
            'id' => 3,
            'nombre' => 'Innovación, Calidad y Productividad'
        ]);

        /////////////////////////////////////////////////////////////// ADMINISTRADOR

        DB::table('usuarios')->insert([
            'id' => 1,
            'nombre' => 'Víctor Hugo',
            'apellidos' => 'Vázquez Gómez',
            'email' => 'hugovg799@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        DB::table('role_usuario')->insert([
            'id' => 1,
            'role_id' => 1,
            'usuario_id' => 1
        ]);

        // DB::table('usuarios')->insert([
        //     'id' => 2,
        //     'nombre' => '',
        //     'apellidos' => '',
        //     'email' => '@gmail.com',
        //     'password' => Hash::make('12345678')
        // ]);
        // DB::table('role_usuario')->insert([
        //     'id' => 2,
        //     'role_id' => 1,
        //     'usuario_id' => 2
        // ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 1
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 2, // Cambiar
            'nombre' => 'Paola', // Cambiar
            'apellidos' => 'Almanza Villarreal', // Cambiar
            'email' => 'estudiante1@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 2, // Cambiar
            'role_id' => 3,
            'usuario_id' => 2 // Cambiar
        ]);
        // Crear estudiante
        DB::table('estudiantes')->insert([
            'id' => 1, // Cambiar
            'usuario_id' => 2, // Cambiar
            'numero_control' => '17260620', // Cambiar
            'generacion' => '2020-2022' // Cambiar
        ]);
        // Asignar programa
        DB::table('estudiante_programa')->insert([
            'id'=> 1, // Cambiar
            'estudiante_id' => 1, // Cambiar
            'programa_id' => 1,
        ]);
        // Asignar una línea
        DB::table('estudiante_linea')->insert([
            'id' => 1, // Cambiar
            'estudiante_id' => 1, // Cambiar
            'linea_investigacion_id' => 1
        ]);
        // Crear tesis
        DB::table('tesis')->insert([
            'id' => 1, // Cambiar
            'estudiante_id' => 1, // Cambiar
            'titulo' => 'Implementación del Sistema Karakuri en una empresa de giro automotriz.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 2
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 3, // Cambiar
            'nombre' => 'Hugo Badhir', // Cambiar
            'apellidos' => 'Izaguirre Armendáriz', // Cambiar
            'email' => 'estudiante2@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 3, // Cambiar
            'role_id' => 3,
            'usuario_id' => 3 // Cambiar
        ]);
        // Crear estudiante
        DB::table('estudiantes')->insert([
            'id' => 2, // Cambiar
            'usuario_id' => 3, // Cambiar
            'numero_control' => '17260621', // Cambiar
            'generacion' => '2020-2022' // Cambiar
        ]);
        // Asignar programa
        DB::table('estudiante_programa')->insert([
            'id'=> 2, // Cambiar
            'estudiante_id' => 2, // Cambiar
            'programa_id' => 1,
        ]);
        // Asignar una línea
        DB::table('estudiante_linea')->insert([
            'id' => 2, // Cambiar
            'estudiante_id' => 2, // Cambiar
            'linea_investigacion_id' => 1
        ]);
        // Crear tesis
        DB::table('tesis')->insert([
            'id' => 2, // Cambiar
            'estudiante_id' => 2, // Cambiar
            'titulo' => 'Mejoramiento del Proceso para el cierre de programas automotrices en SPO.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 3
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 4, // Cambiar
            'nombre' => 'Karyme Vianey', // Cambiar
            'apellidos' => 'Olivarez', // Cambiar
            'email' => 'estudiante3@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 4, // Cambiar
            'role_id' => 3,
            'usuario_id' => 4 // Cambiar
        ]);
        // Crear estudiante
        DB::table('estudiantes')->insert([
            'id' => 3, // Cambiar
            'usuario_id' => 4, // Cambiar
            'numero_control' => '17260622', // Cambiar
            'generacion' => '2020-2022' // Cambiar
        ]);
        // Asignar programa
        DB::table('estudiante_programa')->insert([
            'id'=> 3, // Cambiar
            'estudiante_id' => 3, // Cambiar
            'programa_id' => 1,
        ]);
        // Asignar una línea
        DB::table('estudiante_linea')->insert([
            'id' => 3, // Cambiar
            'estudiante_id' => 3, // Cambiar
            'linea_investigacion_id' => 1
        ]);
        // Crear tesis
        DB::table('tesis')->insert([
            'id' => 3, // Cambiar
            'estudiante_id' => 3, // Cambiar
            'titulo' => 'El emprendimiento como estrategia de desarrollo en México.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 4
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 5, // Cambiar
            'nombre' => 'Cecilia Belinda', // Cambiar
            'apellidos' => 'Amaro González', // Cambiar
            'email' => 'estudiante4@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 5, // Cambiar
            'role_id' => 3,
            'usuario_id' => 5 // Cambiar
        ]);
        // Crear estudiante
        DB::table('estudiantes')->insert([
            'id' => 4, // Cambiar
            'usuario_id' => 5, // Cambiar
            'numero_control' => '17260623', // Cambiar
            'generacion' => '2019-2021' // Cambiar
        ]);
        // Asignar programa
        DB::table('estudiante_programa')->insert([
            'id'=> 4, // Cambiar
            'estudiante_id' => 4, // Cambiar
            'programa_id' => 1,
        ]);
        // Asignar una línea
        DB::table('estudiante_linea')->insert([
            'id' => 4, // Cambiar
            'estudiante_id' => 4, // Cambiar
            'linea_investigacion_id' => 1
        ]);
        // Crear tesis
        DB::table('tesis')->insert([
            'id' => 4, // Cambiar
            'estudiante_id' => 4, // Cambiar
            'titulo' => 'El neuromarketing aplicado a un consultorio de psicoterapia Gestalt.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 5
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 6, // Cambiar
            'nombre' => 'Cristian Uriel', // Cambiar
            'apellidos' => 'Hernández Castillo', // Cambiar
            'email' => 'estudiante5@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 6, // Cambiar
            'role_id' => 3,
            'usuario_id' => 6 // Cambiar
        ]);
        // Crear estudiante
        DB::table('estudiantes')->insert([
            'id' => 5, // Cambiar
            'usuario_id' => 6, // Cambiar
            'numero_control' => '17260625', // Cambiar
            'generacion' => '2019-2021' // Cambiar
        ]);
        // Asignar programa
        DB::table('estudiante_programa')->insert([
            'id'=> 5, // Cambiar
            'estudiante_id' => 5, // Cambiar
            'programa_id' => 1,
        ]);
        // Asignar una línea
        DB::table('estudiante_linea')->insert([
            'id' => 5, // Cambiar
            'estudiante_id' => 5, // Cambiar
            'linea_investigacion_id' => 1
        ]);
        // Crear tesis
        DB::table('tesis')->insert([
            'id' => 5, // Cambiar
            'estudiante_id' => 5, // Cambiar
            'titulo' => 'Implementación de un sistema de control de inventarios digitalizado por medio de código QR.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// ESTUDIANTE 6
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 7, // Cambiar
            'nombre' => 'Moisés', // Cambiar
            'apellidos' => 'Pedraza Castillo', // Cambiar
            'email' => 'estudiante6@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 7, // Cambiar
            'role_id' => 3,
            'usuario_id' => 7 // Cambiar
        ]);
        // Crear estudiante
        DB::table('estudiantes')->insert([
            'id' => 6, // Cambiar
            'usuario_id' => 7, // Cambiar
            'numero_control' => '17260626', // Cambiar
            'generacion' => '2019-2021' // Cambiar
        ]);
        // Asignar programa
        DB::table('estudiante_programa')->insert([
            'id'=> 6, // Cambiar
            'estudiante_id' => 6, // Cambiar
            'programa_id' => 1,
        ]);
        // Asignar una línea
        DB::table('estudiante_linea')->insert([
            'id' => 6, // Cambiar
            'estudiante_id' => 6, // Cambiar
            'linea_investigacion_id' => 1
        ]);
        // Crear tesis
        DB::table('tesis')->insert([
            'id' => 6, // Cambiar
            'estudiante_id' => 6, // Cambiar
            'titulo' => 'Implementar la herramienta de mejora continua 5 ´S en el área de producción en la PyME de Manufacturas y Servicios.', // Cambiar
            'objetivo_general' => 'Detectar enfermedades en imágenes de plantas verdes en la región a través de reconocimiento de patrones en una aplicación.',
            'objetivo_especifico' => 'Etiquetar las enfermedades a sus respectivas plantas. Implementar el reconocimiento de imágenes supervisada mediante el procesamiento de los datos.',
        ]);

        /////////////////////////////////////////////////////////////// COORDINADOR
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 8, // Cambiar
            'nombre' => 'Wendy Aracely', // Cambiar
            'apellidos' => 'Sánchez Gómez', // Cambiar
            'email' => 'coordinador@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 8, // Cambiar
            'role_id' => 5,
            'usuario_id' => 8 // Cambiar
        ]);
        // Crear docente, aunque sea de tipo coordinador
        DB::table('docentes')->insert([
            'id' => 1, // Cambiar
            'usuario_id' => 8, // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 1
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 9, // Cambiar
            'nombre' => 'Erandi Lizzete', // Cambiar
            'apellidos' => 'Contreras Ocegueda', // Cambiar
            'email' => 'docente1@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 9, // Cambiar
            'role_id' => 2,
            'usuario_id' => 9 // Cambiar
        ]);
        // Crear docente
        DB::table('docentes')->insert([
            'id' => 2, // Cambiar
            'usuario_id' => 9, // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 2
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 10, // Cambiar
            'nombre' => 'Oscar Cuauhtémoc', // Cambiar
            'apellidos' => 'Aguilar Rascón', // Cambiar
            'email' => 'docente2@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 10, // Cambiar
            'role_id' => 2,
            'usuario_id' => 10 // Cambiar
        ]);
        // Crear docente
        DB::table('docentes')->insert([
            'id' => 3, // Cambiar
            'usuario_id' => 10, // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 3
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 11, // Cambiar
            'nombre' => 'Corina Guillermina', // Cambiar
            'apellidos' => 'Ocegueda Mercado', // Cambiar
            'email' => 'docente3@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 11, // Cambiar
            'role_id' => 2,
            'usuario_id' => 11 // Cambiar
        ]);
        // Crear docente
        DB::table('docentes')->insert([
            'id' => 4, // Cambiar
            'usuario_id' => 11, // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 4
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 12, // Cambiar
            'nombre' => 'Claudio Alejandro', // Cambiar
            'apellidos' => 'Alcalá Salinas', // Cambiar
            'email' => 'docente4@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 12, // Cambiar
            'role_id' => 2,
            'usuario_id' => 12 // Cambiar
        ]);
        // Crear docente
        DB::table('docentes')->insert([
            'id' => 5, // Cambiar
            'usuario_id' => 12, // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 5
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 13, // Cambiar
            'nombre' => 'José Javier', // Cambiar
            'apellidos' => 'Treviño Uribe', // Cambiar
            'email' => 'docente5@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 13, // Cambiar
            'role_id' => 2,
            'usuario_id' => 13 // Cambiar
        ]);
        // Crear docente
        DB::table('docentes')->insert([
            'id' => 6, // Cambiar
            'usuario_id' => 13, // Cambiar
        ]);

        /////////////////////////////////////////////////////////////// DOCENTE 6
        
        // Crear usuario
        DB::table('usuarios')->insert([
            'id' => 14, // Cambiar
            'nombre' => 'Santa Iliana', // Cambiar
            'apellidos' => 'Castillo García', // Cambiar
            'email' => 'docente6@mail.com', // Cambiar
            'password' => Hash::make('12345678')
        ]);
        // Asignar role
        DB::table('role_usuario')->insert([
            'id' => 14, // Cambiar
            'role_id' => 2,
            'usuario_id' => 14 // Cambiar
        ]);
        // Crear docente
        DB::table('docentes')->insert([
            'id' => 7, // Cambiar
            'usuario_id' => 14, // Cambiar
        ]);

    }
}
