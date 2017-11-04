<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(CoreGroupModuleSeeder::class);
        $this->call(CoreProfileSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoreModuleSeeder::class);
        $this->call(CorePermissionsSeeder::class);
        $this->call(SysUbicacionesSeeder::class);
        $this->call(SysArtistaTableSeeder::class);
        $this->call(SysObraTableSeeder::class);


        Model::reguard();
    }
}
