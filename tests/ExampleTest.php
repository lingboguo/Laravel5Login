<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ExampleTest extends TestCase
{
    /**
     * @group login
     * @return $this
     */
    public function testLoginExample()
    {
        $user_1 = App\User::where('email', 'guolingbo1991@gmail.com')->first();

        if(is_null($user_1)){
            $this->visit('http://laratest.app/register')
                ->type('lingbo', 'name')
                ->type('guolingbo1991@gmail.com', 'email')
                ->type('123123', 'password')
                ->type('123123', 'password_confirmation')
                ->press('Register')
                ->seePageIs('http://laratest.app/home');
        }

        //Start another session(login another browser)
        $response = $this->call('POST', '/login', [
            'email' => 'guolingbo1991@gmail.com',
            'password' => '123123'
        ]);

        $user_2 = App\User::where('email', 'guolingbo1991@gmail.com')->first();

        var_dump($user_1->session_id);
        var_dump($user_2->session_id);

        $this->assertEquals("",Session::getHandler()->read($user_1->session_id));
        $this->assertNotEquals("", Session::getHandler()->read($user_2->session_id));
    }
}
