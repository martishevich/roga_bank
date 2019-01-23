<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransferTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTransfer(){

        $response = $this->withSession(['id' => 1])
            ->call('GET', '/transfer');
        $this->assertEquals(200, $response->status());
    }

    public function testTransferForm(){

        $this->withSession(['id' => 1])
            ->visit('/transfer')
            ->type('4234018073666952', 'card_number')
            ->type('Андрей', 'first_name')
            ->type('Каршакевич', 'last_name')
            ->type('1', 'sum')
            ->press('add')
            ->seePageIs('/transferPass');

    }
}
