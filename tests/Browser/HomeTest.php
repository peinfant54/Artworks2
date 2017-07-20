<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /**
     * Assumign the app lang by default is English
     * */


    public function testChangeLanguageinHome()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->loginAs('1')
                ->visit('/admin/index')
                ->assertPathIs('/admin/index')
                ->clickLink('Español');

            $browser->pause(1000)
                ->assertSee('Bienvenido')
                ->assertPathIs('/admin/index');

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testChangePassword()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->loginAs('1')
                ->visit('/admin/index')
                ->assertPathIs('/admin/index')
                ->press('ChangePass');

            $browser->pause(500)
                ->assertSee('Change your password')
                ->assertSee('Current Password')
                ->type('password1', 'pablo1')
                ->press('Next')
                ->assertPathIs('/admin/user/changepassword')
                ->pause(5000)
                ->assertSee('Change password to user')
                ->assertSee('Confirm Password')
                ->type('password_change', 'pablopablo')
                ->type('password_change_confirmation', 'pablopablo')
                ->press('Update')
                ->pause('500')
            ;

            $browser->assertPathIs('/admin/index')
                ->assertSee('The password has been change correctly!');

             $browser->clickLink('Logout')
                 ->assertPathIs('/')
                 ->assertSee('Login')
                 ->assertSee('Password');

        });
    }

    public function testGoToUser()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->loginAs('1')
                ->visit('/admin/index')
                ->assertPathIs('/admin/index')
                ->clickLink('User');

            $browser->assertPathIs('/admin/user/index')
                ->assertSee('List of User')
                ->assertSee('New User')
            ;

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testGoToProfile()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->loginAs('1')
                ->visit('/admin/index')
                ->assertPathIs('/admin/index')
                ->clickLink('Profile');

            $browser->assertPathIs('/admin/profile/index')
                ->assertSee('List of Profiles')
                ->assertSee('New Profile')
            ;
            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testGoToSystemLog()
    {
        $this->browse(function (Browser $browser)
        {
            $browser->loginAs('1')
                ->visit('/admin/index')
                ->assertPathIs('/admin/index')
                ->clickLink('SystemLog');

            $browser->assertPathIs('/admin/log/index')
                ->assertSee('System Log')
            ;
            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

}
