<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Components\AddUserHelper;

class UserHelperTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /**
     * @dataProvider providerPhone
     */
    public function testFilterPhone($a, $b)
    {

        $result = AddUserHelper::filterPhone($b);
        $this->assertEquals($a, $result);
    }

    public function providerPhone(){
        return [
            [375445867077, '+375(44)586-70-77'],
            [375445867077, '8044586-70-77'],
            [375445867077, 375445867077]
        ];
    }
}
