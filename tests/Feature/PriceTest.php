<?php

namespace Tests\Feature;

use App\Models\Price;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PriceTest extends TestCase
{
    use RefreshDatabase;

    public function test_prices_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->withSession(['banned' => false])->get(route('price.index'));

        $response->assertStatus(200);
    }

    public function test_form_add_price_can_be_rendered_only_by_owner()
    {
        $user = User::factory()->create([
            'email' => 'galangaidil45@gmail.com'
        ]);

        $response = $this->actingAs($user)->withSession(['banned' => false])->get(route('price.create'));

        $response->assertStatus(200);
    }

    public function test_form_add_price_can_not_be_rendered_by_staff()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->withSession(['banned' => false])->get(route('price.create'));

        $response->assertStatus(403);
    }

    public function test_owner_can_define_new_price()
    {
        User::factory()->create([
            'email' => 'galangaidil45@gmail.com'
        ]);

        $response = $this->post(route('price.store'), [
            'buy' => 1990,
            'sell' => 2290
    ]);

        $response->assertStatus(302);
    }

    public function test_the_application_returns_buy_price()
    {
        Price::factory()->create();

        $response = $this->get(route('getBuyPrice'));

        $response->assertStatus(200);
    }

    public function test_the_application_returns_sell_price()
    {
        Price::factory()->create();

        $response = $this->get(route('getSellPrice'));

        $response->assertStatus(200);
    }


}
