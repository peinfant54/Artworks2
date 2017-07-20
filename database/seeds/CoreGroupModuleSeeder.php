<?php

use Illuminate\Database\Seeder;
use App\Models\CoreModel\CoreGroupModule;

class CoreGroupModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CoreGroupModule::create([
            'id'    => 1,
            'desc'  => 'System Functions'
        ]);

        CoreGroupModule::create([
            'id'    => 2,
            'desc'  => 'Artworks System'
        ]);
    }
}
