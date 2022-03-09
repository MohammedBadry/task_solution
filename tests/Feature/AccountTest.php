<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_accounts()
    {

        $clients = Client::factory(10)->create();

        $this->get('/api/v1/account')
            ->assertSee($clients->first()->client_name);
    }

}
