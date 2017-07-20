<?php
/**
 * Created by PhpStorm.
 * User: peinfant
 * Date: 01-06-17
 * Time: 15:29
 */

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Mockery as m;
use Laracasts\Integrated\Extensions\Goutte as IntegrationTest;

use App\Http\Controllers\HomeController;

class HomeControllerTest extends IntegrationTest
{

    protected $baseUrl = 'http://localhost:8000';

    public function testIndex()
    {
        //$this->withoutMiddleware();php
        //$response = $this->call('GET', '/');
        //$this->assertEquals(200, $response->status());
        //$response->assertViewHas('home');
        //$response->assertRedirect('login');
    }

    public function test_Login_Suceess()
    {
        //$this->withoutMiddleware();
        //$response = $this->call('GET', 'admin/index');
        //$response->assertRedirectedToRoute('index');
        //$this->assertEquals(200, $response->status());
        //$response->assertViewHas('title');

       /* $this->get('admin/index')
              ->assertViewHas('Proyecto');*/
        //Auth::shouldReceive('check')->once()->andReturn(false);

        /*$response = $this->call('GET', 'admin/index');
        $response->assertViewHas(
            'content'
        );*/
        $this->visit('index')
            ->see('Proyecto Galería')
            ->see('Intep')
            ->type('peinfant','username' )
            ->type('pichula2','password' )
            ->press('Login')
            ->seePageIs('admin/index')
            ->see('page User');
    }

    public function test_it_returns_home_page_if_user_is_authenticated()
    {
        //$this->withoutMiddleware();

        //$a = Auth::shouldReceive('check')->once()->andReturn(false);

        $auth = m::mock('Illuminate\Auth\AuthManager');
        //$this->app['auth'] = $auth = m::mock('Illuminate\Auth\AuthManager');
        $auth->shouldReceive('guest')->once()->andReturn(true);
        //$response=$this->call('GET', 'admin/index');
        //$view = m::mock('Illuminate\View\Environment');
        //$response->assertViewHas('content');
        //$this->assertEquals(302, $response->status());
        //$response->assertRedirect('login');
    }

    public function test_it_redirects_to_login_if_user_is_not_authenticated()
    {
        //$this->withoutMiddleware();
        Auth::shouldReceive('check')->once()->andReturn(false);

        //$response = $this->call('GET', 'admin/index');
        //$this->assertEquals(500, $response->status());
    }

    public function test_it_redirects_to_home_page_after_user_logs_in()
    {
        $credentials = [
            'username' => 'peinfant',
            'password' => 'pichula2',
        ];

        Auth::shouldReceive('attempt')
            ->once()
            ->with($credentials)
            ->andReturn(true);

        $response = $this->call('POST', 'login', $credentials);

        $response->assertRedirect('admin/index');
    }
    public function test_Yalogeado()
    {
        /*$credentials = [
            'username' => 'peinfant',
            'password' => 'pichula2',
        ];*/

        /*Auth::shouldReceive('attempt')
            ->once()
            ->with($credentials)
            ->andReturn(true);*/
        //$this->withoutMiddleware();
        //$response = $this->call('GET', 'admin/index');
        //print $response->baseResponse->content();
        //$response->assertViewHas('content');
    }
    public function tearDown() {
        m::close();
    }
}
