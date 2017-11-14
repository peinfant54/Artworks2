<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['id'  =>   1,
        'username'  => 'peinfant',
        'email'     =>  'peinfant@gmail.com',
        'password'  => '$2y$10$PfNwiNEW/RW/jtTLZ3PEc.0Mbpft2nuoP.AFiHdSS/fGj55YbgQpW',
        'id_profile'    => 1,
        'remember_token'    =>  NULL
        ]);
        User::create(['id'  =>   2,
            'username'  => 'acruz',
            'email'     =>  'alecruzsuber@gmail.com',
            'password'  => '$2y$10$INPj/NtIrVEk5uuGbz6.zuPHCj.oP7ai7QcUXLcRJyAv56/NflyDS',
            'id_profile'    => 1,
            'remember_token'    =>  NULL
        ]);
    }
}
