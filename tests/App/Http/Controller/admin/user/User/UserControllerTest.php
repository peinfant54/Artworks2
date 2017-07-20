<?php
/**
 * Created by PhpStorm.
 * User: peinfant
 * Date: 01-06-17
 * Time: 15:39
 */



use Tests\TestCase;
use App\Http\Controllers\admin\user\UserController;

class UserControllerTest extends TestCase
{
    public function __call($method, $args)
    {
        if (in_array($method, ['get', 'post', 'put', 'patch', 'delete']))
        {
            return $this->call($method, $args[0]);
        }

        throw new BadMethodCallException;
    }

    public function testUserIndex()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/admin/user/index')
            ->see('Hello, '.$user->name);
    }
}
