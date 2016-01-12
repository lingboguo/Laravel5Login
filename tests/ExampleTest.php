<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('http://laratest.app/register')
            ->type('Lingbo', 'name')
            ->type('lguo@greenedu.com', 'email')
            ->type('123123', 'password')
            ->type('123123', 'password_confirmation')
            ->press('Register')
            ->seePageIs('http://laratest.app/home');
    }
}
