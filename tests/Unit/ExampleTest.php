<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Models\CoreModel\CoreProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->assertTrue(true);
        $this->assertDatabaseHas('users', [
            'email' => 'peinfant@gmail.com'
        ]);
        /*for($i=1; $i < 10; $i++)
        {
            $user = factory(User::class)->create();
        }*/

        for($i=1; $i < 5; $i++)
        {
            $user = factory(CoreProfile::class)->create();
        }



       /* $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/');*/

        $credentials = [
            'username' => 'peinfant',
            'password' => 'pablopablo',
        ];



        //$response->assertRedirect('admin/index');
    }
}
