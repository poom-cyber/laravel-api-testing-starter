<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\User;

class AuthenticationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function checkDuplicateEmail(){

        $user1 = factory(CEO::class)->create([
            "name" => "Susan",
            "email" => "t1@gmail.com",
            "password" => "1234567890"
        ]);

        $user2 = factory(CEO::class)->create([
            "name" => "Wojcicki",
            "email" => "t1@gmail.com",
            "password" => "1234567890"
        ]);

        $user = User::create($user1);

        $accessToken1 = $user->createToken('authToken')->accessToken;

        $user2 = User::create($user2);

        $accessToken2 = $user2->createToken('authToken')->accessToken;

        return response($user, $user2, $accessToken1, $accessToken2);

    }
}
