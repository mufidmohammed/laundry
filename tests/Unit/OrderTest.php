<?php

namespace Tests\Unit;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_only_logged_in_user_can_see_order_index_page()
    {
        $this->actingAs($this->actingUser())
            ->get('/order')
            ->assertOk();
    }

    public function test_that_only_logged_in_user_can_see_order_create_page()
    {
        $this->actingAs($this->actingUser())
            ->get('/order/create')
            ->assertOk();
    }


    public function test_that_it_redirects_to_login_if_user_is_not_logged_in()
    {
        $this->get('/')->assertRedirect('/login');

    }

    public function test_that_laundry_type_id_field_is_required()
    {
        $this->actingAs($this->actingUser())
            ->post('/order', [
                'laundry_type_id' => ''
            ])
            ->assertSessionHasErrors('laundry_type_id');
    }

    public function test_that_laundry_type_id_field_is_numeric()
    {
        $this->actingAs($this->actingUser())
            ->post('/order', [
                'laundry_type_id' => 'qweqwe'
            ])
            ->assertSessionHasErrors('laundry_type_id');
    }

    public function test_that_quantity_field_is_required()
    {
        $this->actingAs($this->actingUser())
            ->post('/order', [
                'quantity' => ''
            ])
            ->assertSessionHasErrors('quantity');
    }

    public function test_that_quantity_field_is_numeric()
    {
        $this->actingAs($this->actingUser())
            ->post('/order', [
                'quantity' => 'one'
            ])
            ->assertSessionHasErrors('quantity');
    }

//    public function test_that_user_can_create_order()
//    {
//        $user = $this->actingUser();
//        $this->actingAs($user);
//        $order = Order::factory()->create([
//            'user_id'=>$user->id
//        ]);
//        $this->assertCount(1, Order::all());
//    }



    private function actingUser(){
        return User::factory()->create();
    }
}
