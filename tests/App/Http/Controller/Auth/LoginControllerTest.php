<?php
/**
 * Created by PhpStorm.
 * User: peinfant
 * Date: 01-06-17
 * Time: 15:59
 */


use Tests\TestCase;


class LoginControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }


}
