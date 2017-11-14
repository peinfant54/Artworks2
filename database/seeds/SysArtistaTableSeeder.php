<?php

use Illuminate\Database\Seeder;

class SysArtistaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_artista')->delete();
        
        \DB::table('sys_artista')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'Rodolfo',
                'apellido' => 'Opazo',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'Carmen',
                'apellido' => 'Piemonte',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'Matías',
                'apellido' => 'Vial',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            3 => 
            array (
                'id' => 4,
                'nombre' => 'Aixa',
                'apellido' => 'Vicuña',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            4 => 
            array (
                'id' => 5,
                'nombre' => 'Ramón',
                'apellido' => 'Vergara Grez',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            5 => 
            array (
                'id' => 6,
                'nombre' => 'Rene',
                'apellido' => 'Portocarrero',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            6 => 
            array (
                'id' => 7,
                'nombre' => 'Kurt',
                'apellido' => 'Herdan',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            7 => 
            array (
                'id' => 8,
                'nombre' => 'Mario',
                'apellido' => 'Carreño',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            8 => 
            array (
                'id' => 9,
                'nombre' => 'Elsa',
                'apellido' => 'Bolivar',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            9 => 
            array (
                'id' => 10,
                'nombre' => 'Claudio',
                'apellido' => 'Girola',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            10 => 
            array (
                'id' => 11,
                'nombre' => 'Torres',
                'apellido' => 'García',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            11 => 
            array (
                'id' => 12,
                'nombre' => 'Maria',
                'apellido' => 'Freire',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            12 => 
            array (
                'id' => 13,
                'nombre' => 'Roberto',
                'apellido' => 'Matta',
                'created_at' => '2017-10-03 20:16:09',
                'updated_at' => '2017-10-03 20:16:09',
            ),
            13 => 
            array (
                'id' => 14,
                'nombre' => 'Antoni',
                'apellido' => 'Tapies',
                'created_at' => '2017-10-18 13:17:52',
                'updated_at' => '2017-10-18 13:18:05',
            ),
            14 => 
            array (
                'id' => 15,
                'nombre' => 'Elsa',
                'apellido' => 'Andrada',
                'created_at' => '2017-10-30 21:19:04',
                'updated_at' => '2017-10-30 21:19:04',
            ),
            15 => 
            array (
                'id' => 16,
                'nombre' => 'Alberto',
                'apellido' => 'Biasi',
                'created_at' => '2017-10-31 12:54:37',
                'updated_at' => '2017-10-31 12:54:37',
            ),
            16 => 
            array (
                'id' => 17,
                'nombre' => 'Tomás',
                'apellido' => 'Munita',
                'created_at' => '2017-11-02 14:35:03',
                'updated_at' => '2017-11-02 14:35:03',
            ),
            17 => 
            array (
                'id' => 18,
                'nombre' => 'Mario',
                'apellido' => 'Toral',
                'created_at' => '2017-11-02 20:04:59',
                'updated_at' => '2017-11-02 20:04:59',
            ),
            18 => 
            array (
                'id' => 19,
                'nombre' => 'Federico',
                'apellido' => 'Assler',
                'created_at' => '2017-11-02 20:08:06',
                'updated_at' => '2017-11-02 20:08:06',
            ),
            19 => 
            array (
                'id' => 20,
                'nombre' => 'Antonio',
                'apellido' => 'Asis',
                'created_at' => '2017-11-02 20:11:49',
                'updated_at' => '2017-11-02 20:11:49',
            ),
            20 => 
            array (
                'id' => 21,
                'nombre' => 'Dante',
                'apellido' => 'Mellado',
                'created_at' => '2017-11-02 22:45:00',
                'updated_at' => '2017-11-02 22:45:00',
            ),
            21 => 
            array (
                'id' => 22,
                'nombre' => 'Andrea',
                'apellido' => 'Del Sarto',
                'created_at' => '2017-11-02 23:10:34',
                'updated_at' => '2017-11-02 23:10:34',
            ),
            22 => 
            array (
                'id' => 23,
                'nombre' => 'Lothar',
                'apellido' => 'Charoux',
                'created_at' => '2017-11-02 23:40:15',
                'updated_at' => '2017-11-02 23:40:15',
            ),
            23 => 
            array (
                'id' => 24,
                'nombre' => 'Loló',
                'apellido' => 'Soldevilla',
                'created_at' => '2017-11-03 00:25:29',
                'updated_at' => '2017-11-03 00:25:29',
            ),
            24 => 
            array (
                'id' => 26,
                'nombre' => 'Jesús Rafael',
                'apellido' => 'Soto',
                'created_at' => '2017-11-03 02:03:03',
                'updated_at' => '2017-11-03 02:03:03',
            ),
            25 => 
            array (
                'id' => 27,
                'nombre' => 'Lucio',
                'apellido' => 'Fontana',
                'created_at' => '2017-11-03 02:25:45',
                'updated_at' => '2017-11-03 02:25:45',
            ),
            26 =>
                array (
                    'id' => 28,
                    'nombre' => 'Pablo',
                    'apellido' => 'Picasso',
                    'created_at' => '2017-11-03 02:25:45',
                    'updated_at' => '2017-11-03 02:25:45',
                ),
            27 =>
                array (
                    'id' => 29,
                    'nombre' => 'Gracia',
                    'apellido' => 'Barrios',
                    'created_at' => '2017-11-03 02:25:45',
                    'updated_at' => '2017-11-03 02:25:45',
                ),
            28 =>
                array (
                    'id' => 30,
                    'nombre' => 'Andrés',
                    'apellido' => 'Vio',
                    'created_at' => '2017-11-03 02:25:45',
                    'updated_at' => '2017-11-03 02:25:45',
                ),
            29 =>
                array (
                    'id' => 31,
                    'nombre' => 'Carlos',
                    'apellido' => 'Ortuzar',
                    'created_at' => '2017-11-03 02:25:45',
                    'updated_at' => '2017-11-03 02:25:45',
                ),
            30 =>
                array (
                    'id' => 32,
                    'nombre' => 'José',
                    'apellido' => 'Balmes',
                    'created_at' => '2017-11-03 02:25:45',
                    'updated_at' => '2017-11-03 02:25:45',
                ),
        ));
        
        
    }
}