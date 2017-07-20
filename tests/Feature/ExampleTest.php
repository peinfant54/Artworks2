<?php

namespace Tests\Feature;

use App\Models\CoreModel\CoreProfile;
use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //use DatabaseMigrations;
    //use DatabaseTransactions;

    public function testBasicTest()
    {
        $credentials = [
            'username' => 'peinfant',
            'password' => 'pablopablo',
        ];

        $response = $this->get('/');
        $response->assertStatus(200);
        /*$this->assertDatabaseHas('users', [
            'email' => 'pablo@infante.cl'
        ]);*/
        //$user = factory(User::class)->create();
        //$response->assertViewHas('Intep');
    }

    public function testLoginResponseSucess()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
            ->get('/login');
        $response->assertStatus(302);
    }

    public function testLoginResponseWrong()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)
            ->post('/login');
        $response->assertStatus(302);
    }
    public function testUserList()
    {
        $user = User::find(1);
        $mod  = User::find(1)->profile->module;
        $this->actingAs($user)
            ->get('/login')
            ->assertStatus(302)
            ->assertRedirect('admin/index');

        $response = $this->get('/admin/user/index');
        //dd($response);
        $response->assertStatus(200);
        $profile = CoreProfile::find(1)->pluck('name','id');
        $response->assertViewHas('profile', $profile);
        $response->assertViewHas('modulos', $mod);
        $response->assertViewHas('title', 'Proyecto Galeria');
    }
}
