<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show(){
        $products = Product::get();
        return $products;
    }
    public function create(Request $request){
        $product = Product::updateOrCreate(
            ['name'=> $request->name, 
            'category_id' => $request->category_id,
            'stock_id' => $request->stock_id,
            'details'=> $request->details,
            'barcode'=> $request->barcode,
            'supply_price'=> $request->supply_price,
            'selling_price'=> $request->selling_price,
            'price_cheat'=> $request->price_cheat]);
        return $product;
    }
    public function delete($id){
        try{
            $product = Product::findOrFail($id);
        } catch(\Exception $e){
            throw new NotFoundException;
        }
        $product->delete();
       
    }
    public function update($id, Request $request){
       try{
            $product = Product::findOrFail($id);
        } catch(\Exception $e){
            throw new NotFoundException;
        }
        $product->update(['name'=> $request->name, 
        'category_id' => $request->category_id,
        'stock_id' => $request->stock_id,
        'details'=> $request->details,
        'barcode'=> $request->barcode,
        'supply_price'=> $request->supply_price,
        'selling_price'=> $request->selling_price,
        'price_cheat'=> $request->price_cheat]);
        
        return $product;
    }
}
