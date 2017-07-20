<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class UserTest extends DuskTestCase
{
    //use DatabaseMigrations;


    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testUserCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/user/index')
                ->press('new');
            $browser->pause(1000)
                ->type('username','peinfant2')
                ->type('email','peinfant2@lop.cl')
                ->type('password','pablopablo2')
                ->select('id_profile_new','3')
                ->type('password_confirmation','pablopablo2')
                ->press('Save');

            $browser->pause(1000)
                    ->assertPathIs('/admin/user/index')
                    ->assertSee('The register has been Create!')
                ->assertSee('peinfant2');
            ;
            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
            //$browser->assertSe

        });
    }

    public function testUserEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/user/index')
                ->press('edit7');

            $browser->pause(1000)
                ->select('id_profile_edit7','3')
                ->press('UpdateEditUser7')
                ;

            $browser->pause(1000)
                ->assertPathIs('/admin/user/index')
                ->assertSee('The register has been Update!')
                ->assertSee(' swift.nasir');
            ;


            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testUserDelete()
    {


        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/user/index')
                ->press('delete10');
            $browser->pause(1000)
                ->press('yes10')
            ;

            $browser->pause(1000)
                ->assertPathIs('/admin/user/index')
                ->assertSee('The register has been Delete!')
                ->assertDontSee('ooo');
            ;

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testUserChangePassword()
    {

        $this->browse(function (Browser $browser) {

            $browser->loginAs('1')
                ->visit('/admin/user/index')
                ->press('pass7');

            $browser->pause(1000)
                ->assertSee('Password')
                ->assertSee('Confirm Password')
                ->type('#password_change7', 'pablo1')
                ->type('#password_change-confirm7', 'pablo1')
                ->press('UpdatePass7')
            ;

            $browser->pause(1000)
                ->assertPathIs('/admin/user/index')
                ->assertSee('The password has been change correctly!')
            ;

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }
}
