<?php

use Illuminate\Database\Seeder;
use App\Models\CoreModel\CorePermission;

class CorePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CorePermission::create([
            'id'            => 1,
            'id_module'     => 1,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);
        CorePermission::create([
            'id'            => 2,
            'id_module'     => 2,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);

        CorePermission::create([
            'id'            => 3,
            'id_module'     => 3,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);

        CorePermission::create([
            'id'            => 4,
            'id_module'     => 4,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);
        CorePermission::create([
            'id'            => 5,
            'id_module'     => 5,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);
        CorePermission::create([
            'id'            => 6,
            'id_module'     => 6,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);

        CorePermission::create([
            'id'            => 7,
            'id_module'     => 7,
            'id_profile'    => 1,
            'rread'         => 1,
            'wwrite'        => 1,
            'eedit'         => 1,
            'ddelete'       => 1,
        ]);
    }
}
