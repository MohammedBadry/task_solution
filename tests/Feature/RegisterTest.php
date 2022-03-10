<?php

namespace Tests\Feature;

use App\Models\Client;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_required_fields()
    {
        $res = $this->postJson('/api/v1/register');
        $res->assertJsonValidationErrors('client_name');
        $res->assertJsonValidationErrors('address1');
        $res->assertJsonValidationErrors('city');
        $res->assertJsonValidationErrors('state');
        $res->assertJsonValidationErrors('country');
        $res->assertJsonValidationErrors('phone_no1');
        $res->assertJsonValidationErrors('first_name');
        $res->assertJsonValidationErrors('last_name');
        $res->assertJsonValidationErrors('email');
        $res->assertJsonValidationErrors('password');
        $res->assertJsonValidationErrors('phone');
    }

    public function test_register_unique_fields()
    {
        $user = User::factory()->create();

        $new_user = $this->postJson('/api/v1/register', [
            'client_name' => 'Ahmed Ali',
            'address1' => 'Luxor',
            'address2' => 'Tod',
            'city' => 'Tod',
            'state' => 'Luxor',
            'country' => 'Egypt',
            'phone_no1' => $user->client->phone_no1,
            'phone_no2' => $user->client->phone_no2,
            'zip' => '85842',
            'first_name' => 'Test',
            'last_name' => 'Test',
            'email' => $user->email,
            'password' => '123456',
            'password_confirmation' => '123456',
            'phone' => $user->phone,
        ]);
        $new_user->assertJsonValidationErrors('phone_no1');
        $new_user->assertJsonValidationErrors('phone_no2');
        $new_user->assertJsonValidationErrors('email');
        $new_user->assertJsonValidationErrors('phone');
    }

    public function test_client_can_register()
    {
        $this->post('/api/v1/register', [
                'client_name' => 'Ahmed Ali',
                'address1' => 'Luxor',
                'address2' => 'Tod',
                'city' => 'Tod',
                'state' => 'Luxor',
                'country' => 'Egypt',
                'phone_no1' => '01000376267',
                'phone_no2' => '01000545646',
                'zip' => '85842',
                'first_name' => 'Mohammed',
                'last_name' => 'Badry',
                'email' => 'mbmba2003@yahoo.com',
                'password' => '123456',
                'password_confirmation' => '123456',
                'phone' => '01097966033',
            ]);

        $this->assertDatabaseHas('clients', [
            'phone_no1' => '01000123456',
        ]);
    }

}
