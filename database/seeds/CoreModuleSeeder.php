<?php

use Illuminate\Database\Seeder;
use App\Models\CoreModel\CoreModule;

class CoreModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CoreModule::create([
            'id'  =>  1,
            'name'  => 'User',
            'descripcion'   => 'Create Users',
            'id_group'      =>  '1',
            'links'         => 'admin/user/index',
            'file'          =>  'users.php',
            'image'         =>  'users.png',
            'visible'       => 1
        ]);

        CoreModule::create([
            'id'  =>  2,
            'name'  => 'Profile',
            'descripcion'   =>  'Create Profiles',
            'id_group'      =>  '1',
            'links'         =>  'admin/profile/index',
            'file'          =>  'profile.php',
            'image'         =>  'profile.png',
            'visible'       =>  1
        ]);

        CoreModule::create([
            'id'  =>  3,
            'name'  => 'SystemLog',
            'descripcion'   =>  'View Log',
            'id_group'      =>  '1',
            'links'         =>  'admin/log/index',
            'file'          =>  'log.php',
            'image'         =>  'log.png',
            'visible'       =>  1
        ]);

        CoreModule::create([
            'id'  =>  4,
            'name'  => 'Locations',
            'descripcion'   =>  'Create Locations',
            'id_group'      =>  '2',
            'links'         =>  'art/location/index',
            'file'          =>  'log.php',
            'image'         =>  'log.png',
            'visible'       =>  1
        ]);
        CoreModule::create([
            'id'  =>  5,
            'name'  => 'Artist',
            'descripcion'   =>  'Create Artist',
            'id_group'      =>  '2',
            'links'         =>  'art/artist/index',
            'file'          =>  'obra.php',
            'image'         =>  'obra.png',
            'visible'       =>  1
        ]);

        CoreModule::create([
            'id'  =>  6,
            'name'  => 'ArtWorks',
            'descripcion'   =>  'Create ArtWorks',
            'id_group'      =>  '2',
            'links'         =>  'art/obra/index',
            'file'          =>  'obra.php',
            'image'         =>  'obra.png',
            'visible'       =>  1
        ]);
    }
}
