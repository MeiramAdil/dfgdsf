<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(){
        $categories = Category::get();
        return $categories;
    }
    public function create(Request $request){
        $category = Category::updateOrCreate([
            'name'=> $request->name, 
            'parent_id' => $request->parent_id
        ]);
        return $category;
    }
    public function delete($id){
        try{
            $category = Category::findOrFail($id);
        } catch(\Exception $e){
            throw new NotFoundException;
        }
        $category->delete();  
    }
    public function update($id, Request $request){
        try{
            $category = Category::findOrFail($id);
        } catch(\Exception $e){
            throw new NotFoundException;
        }
        $category->update(['name'=> $request->name, 
        'parent_id' => $request->parent_id,]);
        $category->save();
    }
}
