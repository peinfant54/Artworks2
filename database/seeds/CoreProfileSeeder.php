<?php

use Illuminate\Database\Seeder;
use App\Models\CoreModel\CoreProfile;

class CoreProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CoreProfile::create([
            'id'  =>  1,
            'name'  => 'Admin',
            'descripcion'   => 'System Admin Profile'
        ]);
        CoreProfile::create([
            'id'  =>  2,
            'name'  => 'Perfil Lector',
            'descripcion'   => 'Perfil Lector'
        ]);
    }
}
