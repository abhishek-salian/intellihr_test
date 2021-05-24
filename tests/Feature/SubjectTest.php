<?php

namespace Tests\Feature;

use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_subject_login_with_wrong_details()
    {
        $response = $this->postJson('/api/subject/login', ['username' => 'GLaDOS', "password" => "ISawDeer"]);

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

    public function test_subject_get_questions()
    {
        $response = $this->getJson('/api/subject/test');

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                "id" => 1,
                "name" => "GLaDOS User",
                "username" => "GLaDOS",
            ]);
    }
}
