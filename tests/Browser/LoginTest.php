<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginCorrect()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Login')
                ->assertSee('Password')
                ->type('username', 'peinfant')
                ->type('password', 'pablo1')
                ->press('Login')
                ->assertPathIs('/admin/index')
                ->assertSee('Welcome')
                ->clickLink('Logout');

            $browser->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testLoginInCorrect()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('username', 'peinfant')
                ->type('password', 'pablopphp arablo')
                ->press('Login')
                ->assertPathIs('/')
                ->assertSee('These credentials do not match our records.');

        });
    }

    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/index')
                ->assertPathIs('/admin/index')
                ->clickLink('Logout');

            $browser->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testFooter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertPathIs('/')
                ->clickLink('Intep');

            $browser->assertPathIs('/index')
                ->assertSee('Intep')
                ->assertSee('Login');
        });
    }
}

