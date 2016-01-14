<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ExampleTest extends TestCase
{
    //use DatabaseMigrations;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    /*public function testBasicExample()
    {
        $this->visit('http://laratest.app/register')
            ->type('Lingbo', 'name')
            ->type('lguo@greenedu.com', 'email')
            ->type('123123', 'password')
            ->type('123123', 'password_confirmation')
            ->press('Register')
            ->seePageIs('http://laratest.app/home');
    }*/

    /*private $driver1;
    private $driver2;

    protected function setUp()
    {
        $this->driver1 = $this->createDriver();

        $this->driver2 = $this->createDriver();
    }

    protected function createDriver()
    {
        $driver = new PHPUnit_Extensions_Selenium2TestCase();
        $driver->setBrowser('firefox');
        $driver->setBrowserUrl('http://www.example.com/');
        $driver->start();

        return $driver;
    }*/
    private $auth = null;

    /**
     * @return $this
     */
    public function testLoginExample()
    {
        $response = $this->call('POST', '/login', [
            'email' => 'guolingbo1991@gmail.com',
            'password' => '123123'
        ]);
        /*$user_1 = App\User::first();
        Auth::login($user_1);*/
        $user_1 = App\User::first();
        $user_2 = Auth::user();
        var_dump($user_1->session_id);
        var_dump(Auth::check());
        var_dump($user_2->session_id);
        var_dump(Session::getHandler()->read($user_1->session_id));
        var_dump(Session::getHandler()->read($user_2->session_id));
        //$this->assertEquals(200, $response->getStatusCode());
    }
}
