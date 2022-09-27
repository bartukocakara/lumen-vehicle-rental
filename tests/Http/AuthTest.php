<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Account;

class AuthTest extends TestCase
{
    private const API_PREFIX = "api";
    private const API_VERSION = "v1";
    private const ZERO_BALANCE = 0;

    public function test_register() : void
    {
        $payload = [
            'first_name' => 'Bartu',
            'last_name' => 'kocakara',
            'email' => 'test@gmail.com',
            'password' => 'password',
        ];
        $headers = [
            "Accept" => "application/json",
        ];

        $test = $this->call('POST', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                    self::API_VERSION . DIRECTORY_SEPARATOR . "auth/register", $payload, $headers);
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(201);
    }

    public function test_login() : void
    {
        $payload = [
            'email' => 'test@gmail.com',
            'password' => 'password',
        ];
        $headers = [
            "Accept" => "application/json",
        ];
        $test = $this->call('POST', self::API_PREFIX . DIRECTORY_SEPARATOR .
                                    self::API_VERSION . DIRECTORY_SEPARATOR .
                                    'auth/login');
        $test->assertJson(json_decode($test->getContent(), true));
        $test->assertStatus(200);
    }
}
