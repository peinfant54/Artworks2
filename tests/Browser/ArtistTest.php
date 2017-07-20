<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArtistTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * Para realizar las pruebas, colocar el sistema en ingles por defecto
     * @return void
     */


    public function testArtistCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                    ->visit('/admin/index')
                    ->assertPathIs('/admin/index');
                    //->clickLink('English');

            $browser->visit('/art/artist/index')
                    ->press('new')
                    ->pause(1000)
                    ->type('#nombre_new','NombreTest')
                    ->type('#apellido_new','ApellidoTest')
                    ->press('save');

            $browser->pause(1000)
                ->assertPathIs('/art/artist/index')
                ->assertSee('The register has been Create!')
                ->assertSee('NombreTest')
                ->assertSee('ApellidoTest');

            $browser->assertVisible('#logout')
                    ->visit($browser->attribute('#logout', 'href'))
                    ->pause(5000)
                    ->assertPathIs('/logout')
                    ->pause(5000)
                    ->assertSee('System Access')
                    ->assertSee('Forgot Your');
            //$browser->assertSe

        });
    }

    public function testArtistEdit()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/art/artist/index')
                ->press('#Edit8');

            $browser->pause(1000)
                ->type('#nombre_edit8','Nombre_Edit')
                ->type('#apellido_edit8','Apellido_Edit')
                ->press('update_edit8')
            ;

            $browser->pause(1000)
                ->assertPathIs('/art/artist/index')
                ->assertSee('The register has been Update!')
                ->assertSee('Nombre_Edit');
            ;


            $browser->assertVisible('#logout')
                ->visit($browser->attribute('#logout', 'href'))
                ->pause(1000)
                ->assertPathIs('/logout')
                ->pause(1000)
                ->assertSee('System Access')
                ->assertSee('Forgot Your');
        });
    }

    public function testArtistDelete()
    {


        $this->browse(function (Browser $browser) {
            $browser->loginAs('1')
                ->visit('/art/artist/index')
                ->press('#Delete8');
            $browser->pause(1000)
                ->press('#Yes8')
            ;

            $browser->pause(1000)
                ->assertPathIs('/art/artist/index')
                ->assertSee('The register has been Delete!')
                ->assertDontSee('Nombre_Edit')
                ->assertDontSee('Apellido_Edit');
            ;

            $browser->assertVisible('#logout')
                ->visit($browser->attribute('#logout', 'href'))
                ->pause(1000)
                ->assertPathIs('/logout')
                ->pause(1000)
                ->assertSee('System Access')
                ->assertSee('Forgot Your');
        });
    }
}
