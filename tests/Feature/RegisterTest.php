<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

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
            'phone_no1' => '01000376267',
        ]);
    }

}
