<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testProfileCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/profile/index')
                ->press('new');
            $browser->pause(1000)
                ->type('#name_new','Test Profile Old')
                ->type('#descripcion_new','Test Profile generate by Dusk')
                ->press('Save');

            $browser->pause(1000)
                ->assertPathIs('/admin/profile/index')
                ->assertSee('The register has been Create!')
                ->assertSee('Test Profile');
            ;
            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
            //$browser->assertSe

        });
    }

    public function testProfileEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/profile/index')
                ->press('#Edit4');

            $browser->pause(1000)
                ->type('#name_edit4','Old_Test_Profile_Edit')
                ->type('#descripcion_edit4','Old Test Edit Profile generate by Dusk')
                ->press('update_edit4')
            ;

            $browser->pause(1000)
                ->assertPathIs('/admin/profile/index')
                ->assertSee('The register has been Update!')
                ->assertSee('Test_Profile_Edit');
            ;


            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testProfilePermissionsEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/profile/index')
                ->press('#Pass3');

            $browser->pause(1000)
                ->assertSee('Edit Profile')
                ->assertSee('Module')
                ->assertSee('Read')
                ->assertSee('Write')
                ->assertSee('Delete')
                ->check('#3read1')
                ->check('#3write1')
                ->check('#3edit1')
                ->check('#3delete1')
                ->check('#3read2')
                ->check('#3write2')
                ->check('#3edit2')
                ->check('#3delete2')
                ->check('#3read3')
                ->check('#3write3')
                ->check('#3edit3')
                ->check('#3delete3')
                ->press('UpdatePer3')
                ;

            $browser->pause(1000)
                ->assertPathIs('/admin/profile/index')
                ->assertSee('The register has been Update!')
                ->assertSee('Mr. Chris Lowe')
                ->press('#Pass3')
            ;

            $browser->pause(1000)
                ->assertSee('Edit Profile')
                ->assertSee('Module')
                ->assertSee('Read')
                ->assertSee('Write')
                ->assertSee('Delete')
                ->uncheck('#3read1')
                ->uncheck('#3write1')
                ->uncheck('#3edit1')
                ->uncheck('#3delete1')
                ->uncheck('#3read2')
                ->uncheck('#3write2')
                ->uncheck('#3edit2')
                ->uncheck('#3delete2')
                ->uncheck('#3read3')
                ->uncheck('#3write3')
                ->uncheck('#3edit3')
                ->uncheck('#3delete3')
                ->press('UpdatePer3')
            ;

            $browser->pause(1000)
                ->assertPathIs('/admin/profile/index')
                ->assertSee('The register has been Update!')
                ->assertSee('Mr. Chris Lowe')
            ;

             $browser->clickLink('Logout')
                 ->assertPathIs('/')
                 ->assertSee('Login')
                 ->assertSee('Password');

            ;
        });

    }

    public function testProfileDelete()
    {


        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/profile/index')
                ->press('#Delete11');
            $browser->pause(1000)
                ->press('#Yes11')
            ;

            $browser->pause(1000)
                ->assertPathIs('/admin/profile/index')
                ->assertSee('The register has been Delete!')
                ->assertDontSee('Test Profile');
            ;

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }

    public function testProfileDeleteWithUserAssign()
    {


        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/admin/profile/index')
                ->press('#Delete1');
            $browser->pause(1000)
                ->press('#Yes1')
            ;

            $browser->pause(1000)
                ->assertPathIs('/admin/profile/index')
                ->assertSee('The Profile cannot be deleted, because some users has assigned this profile!')
                ->assertSee('Admin');
            ;

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('Login')
                ->assertSee('Password');
        });
    }
}
