<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserControllerTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */

    public function testNoConfirmationLogin()
    {
        $this->visit('/login')
            ->type('karshak123', 'login')
            ->type('1234567890', 'password')
            ->press('send')
            ->seePageIs('/login');
    }

    public function testConfirmationLogin()
    {
        $this->visit('/login')
            ->type('karshak', 'login')
            ->type('12345678', 'password')
            ->press('send')
            ->seePageIs('/userPage');
    }

    /**
     *@depends testConfirmationLogin
     */


    public function testProfileReduct(){

        $response = $this->withSession(['id' => 1])
            ->call('GET', '/userUpdateData');
        $this->assertEquals(200, $response->status());
    }


}
