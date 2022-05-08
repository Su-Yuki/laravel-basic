<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Person;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class HelloTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testreqest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/hello');
        $response->assertStatus(302);

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/hello');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }

    public function testHello()
    {
        factory(User::class)->create([
            "name"     => "AAA",
            "email"    => "AAA@AAA.com",
            "password" => "AAAAAAA",
        ]);
        factory(User::class, 10)->create();

        $this->assertDatabaseHas("users", [
            "name"     => "AAA",
            "email"    => "AAA@AAA.com",
            "password" => "AAAAAAA",
        ]);

        factory(Person::class)->create([
            "name"     => "BBB",
            "mail"    => "BBB@BBB.com",
            "age"      => 23,
        ]);
        factory(Person::class, 10)->create();

        $this->assertDatabaseHas("people", [
            "name"     => "BBB",
            "mail"    => "BBB@BBB.com",
            "age"      => 23,
        ]);
    }
}
