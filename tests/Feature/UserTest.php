<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $user = $this->createUser();

        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    public function testApiGetUser()
    {

        $user = $this->createUser();
        $this->get('/api/users/' . $user->id)->assertSee($user->email);

    }

    protected function createUser()
    {
        $user = User::forceCreate([
            'name' => 'Test Testsson',
            'email' => 'test@test.se',
            'password' => bcrypt('password')
        ]);

        return $user;
    }


}
