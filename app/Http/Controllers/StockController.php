<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function show(){
        $stocks = Stock::get();
        return $stocks;
    }
    public function create(Request $request){
        $stock = Stock::updateOrCreate(
            ['name'=> $request->name, 
            'coordinates' => $request->coordinates,]);
        return $stock;
    }
    public function delete($id){
        try{
            $stock = Stock::findOrFail($id);
        } catch(\Exception $e){
            throw new NotFoundException;
        }
        $stock->delete();  
    }
    public function update($id, Request $request){
        try{
            $stock = Stock::findOrFail($id);
        } catch(\Exception $e){
            throw new NotFoundException;
        }
        $stock->update(
            ['name'=> $request->name, 
            'coordinates' => $request->coordinates,]);
        $stock->save();
    }
}
