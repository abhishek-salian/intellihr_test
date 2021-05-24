<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_admin_login_with_wrong_password()
    {
        $response = $this->postJson('/api/admin/login', ['username' => 'GLaDOS', "password" => "password"]);

        $response
            ->assertStatus(Response::HTTP_UNAUTHORIZED)
            ->assertJson([
                'error' => [
                    'code' => 401,
                    'message' => 'Invalid username password',
                    'status' => 'UNAUTHENTICATED'
                ]
            ]);
    }

    public function test_admin_login_success()
    {
        $response = $this->postJson('/api/admin/login', ['username' => 'GLaDOS', "password" => "ISawDeer"]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                "id" => 1,
                "name" => "GLaDOS User",
                "username" => "GLaDOS",
            ]);
    }
}
