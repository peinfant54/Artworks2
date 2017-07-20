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
    }
}
