<?php


use app\Router;
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class SignUpTest extends TestCase
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     */
    public function should_sign_up_a_user(){
        $client = new Client();
        $response = $client->request('POST', 'localhost:8080'.Router::INDEX_ROUTE.'/users', [
            'form_params' => [
                'name' => 'amir',
                'username' => 'amirkouchaki',
                'email' => 'amirkouchaki@gmail.com',
                'password' => 'adsfadsfafd',
                'userRegistrationForm'=>''
            ]
        ]);
        self::assertEquals('amirkouchaki',$response->getBody()->getContents());
    }
}