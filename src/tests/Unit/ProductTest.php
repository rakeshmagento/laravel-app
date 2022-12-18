<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * Test api end point
     *
     * @return void
     */
    public function test_api_end_point()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }

    /**
     * Test category search
     *
     * @return void
     */
    public function test_api_response_category_sneakers()
    {
        $response = $this->get('/api/products?category=sneakers');
        $response
            ->assertStatus(200)
            ->assertExactJson([[
                'sku'  => '000005',
                'name' => 'Nathane leather sneakers',
                'category' => 'sneakers',
                'price' => [
                    'original' => 59000,
                    'final'    => 59000,
                    'discount_percentage' => null,
                    'currency' => 'EUR'
                ]
            ]]);
    }

    /**
     * Test category search not existing
     *
     * @return void
     */
    public function test_api_response_category_non_exists()
    {
        $response = $this->get('/api/products?category=aaaaa');
        $response
            ->assertStatus(200)
            ->assertExactJson([]);
    }
}
