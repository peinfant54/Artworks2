<?php

use Illuminate\Database\Seeder;
use App\Models\SysModel\SysArtista;

class SysArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SysArtista::create([
            'id'            => 1,
            'nombre'       => 'Rodolfo',
            'apellido'       => 'Opazo'
        ]);
        SysArtista::create([
            'id'            => 2,
            'nombre'       => 'Carmen',
            'apellido'       => 'Piemonte'
        ]);

        SysArtista::create([
            'id'            => 3,
            'nombre'       => 'Matías',
            'apellido'       => 'Vial'
        ]);

        SysArtista::create([
            'id'            => 4,
            'nombre'       => 'Aixa',
            'apellido'       => 'Vicuña'
        ]);

        SysArtista::create([
            'id'            => 5,
            'nombre'       => 'Ramón',
            'apellido'       => 'Vergara Grez'
        ]);

        SysArtista::create([
            'id'            => 6,
            'nombre'       => 'Rene',
            'apellido'       => 'Portocarrero'
        ]);

        SysArtista::create([
            'id'            => 7,
            'nombre'       => 'Kurt',
            'apellido'       => 'Herdan'
        ]);
    }
}
