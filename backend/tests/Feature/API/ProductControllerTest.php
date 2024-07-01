<?php

namespace Tests\Feature\API;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_should_products_get_endpoints_list_all(): void
    {
        Product::factory(3)->create();
        $response = $this->getJson('/api/products');

        // $response->dump()->assertStatus(200);
        $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json){
            $json->hasAll(['data', 'meta', 'links']);
            $json->hasAll(['data.0.name', 'data.0.price', 'data.0.price_float']);
            $json->whereAllType(['data.0.name' => 'string', 'data.0.price' => 'integer', 'data.0.price_float' => 'double']);
            $json->count('data', 3)->etc();

        });

    }

    public function test_should_product_get_endpoint_returns_a_sigle_product(): void
    {
        Product::factory(1)->create(['name' => 'Product 1', 'price' => 3999]);
        $response = $this->getJson('/api/products/1');

       $response->dump()->assertStatus(200);
        // $response->assertStatus(200);

        $response->assertJson(function(AssertableJson $json){
            $json->has('data')
            ->hasAll(['data.name', 'data.price', 'data.price_float'])
            ->whereAllType(['data.name' => 'string', 'data.price' => 'integer'])
            ->whereAll([
                'data.name' => 'Product 1',
                'data.price' => 3999,
                'data.price_float' => 39.99
            ]);

        });
    }

    public function test_should_product_post_endpoint_throw_an_unauthorized_status() {

        $response = $this->postJson('/api/products', []);
        $response->dump()->assertUnauthorized();
    }
}
