<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class test_for_crud_product extends TestCase
{
    public function test_show(){
        $response = $this->get('http://127.0.0.1:8000/api/product');
        $response->assertStatus(200);
    }
    public function test_create()
    {
        $response = $this->post('//http://127.0.0.1:8000/api/product', ['name'=> "Test", 
        'category_id' =>1,
        'stock_id' => 1,
        'details'=> "jsdjcfjsd",
        'barcode'=> "25456451",
        'supply_price'=> null,
        'selling_price'=> 100,
        'price_cheat'=> null]);
        $response->assertStatus(201);
    }
    public function test_update(){
        $response = $this->post('//http://127.0.0.1:8000/api/product/', ['name'=> "Test", 
        'category_id' =>1,
        'stock_id' => 1,
        'details'=> "jsdjcfjsd",
        'barcode'=> "25456451",
        'supply_price'=> null,
        'selling_price'=> 100,
        'price_cheat'=> null]);
        $response->assertStatus(201);
    }
}
