<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ObraTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testObraCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/art/location/index')
                ->press('new');
            $browser->pause(1000)
                ->type('#name_new','Test Location New2')
                ->press('Save');

            $browser->pause(1000)
                ->assertPathIs('/art/location/index')
                ->assertSee('The register has been Create!')
                ->assertSee('Test Location New2');
            ;
            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('System Access')
                ->assertSee('Forgot Your');
            //$browser->assertSe

        });
    }

    public function testObraEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/art/location/index')
                ->press('#Edit11');

            $browser->pause(1000)
                ->type('#name_edit11','Test_Location_Edit')
                ->press('update_edit11')
            ;

            $browser->pause(1000)
                ->assertPathIs('/art/location/index')
                ->assertSee('The register has been Update!')
                ->assertSee('Test_Location_Edit');
            ;


            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('System Access')
                ->assertSee('Forgot Your');
        });
    }

    public function testObraDelete()
    {


        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/art/location/index')
                ->press('#Delete11');
            $browser->pause(1000)
                ->press('#Yes11')
            ;

            $browser->pause(1000)
                ->assertPathIs('/art/location/index')
                ->assertSee('The register has been Delete!')
                ->assertDontSee('Old_Test_Location_Edit');
            ;

            $browser->clickLink('Logout')
                ->assertPathIs('/')
                ->assertSee('System Access')
                ->assertSee('Forgot Your');
        });
    }
}
