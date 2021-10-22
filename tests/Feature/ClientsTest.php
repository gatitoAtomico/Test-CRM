<?php

namespace Tests\Feature;

use App\Clients;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_see_clients_list()
    {
        $response_ = $this->get('/home')->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_see_the_clients_list()
    {
        $this->actingAs(factory(User::class)->create());
        $response_ = $this->get('/home')->assertOk();
    }

    /** @test */
    public function a_client_can_be_added_through_the_form()
    {
        $this->withExceptionHandling();
        $this->actingAs(factory(User::class)->create());

        $resposne = $this->post('home/addClient', [
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'address' => 'testAddress',
            'dob' => "2021-10-15",
            'phone' => ['99123456', '99123458'],
            'gender' => 'male',
        ]);

        $this->assertCount(1, Clients::all());
    }

    /** @test */
    public function test_authorized_user_can_delete_a_client()
    {
        $this->withExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $this->actingAs(factory('App\User')->create());
        $client = factory('App\Clients')->create(['id' => Auth::id()]);
        $this->delete('/home/' . $client->id);
        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }

    /** @test */
    public function test_authorized_user_can_update_a_client()
    {
        $this->withExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $client = factory('App\Clients')->create(['id' => Auth::id()]);
        $client->name = "Updated_Name";
        $this->put('/home/' . $client->id, $client->toArray());
        $this->assertDatabaseHas('clients', ['id' => $client->id, 'name' => 'Updated_Name']);
    }
}
