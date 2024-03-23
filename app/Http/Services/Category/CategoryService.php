<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService{

    public function getAll(){

        return Category::get();
    }

    public function getParent(){
        
        return Category::where('parent_id', 0)->get();

    }

    public function create($request){
        
        $categories = $request->all();
        $categories['slug'] = Str::of($request->input('categoryname'))->slug('-');

        Category::create($categories);

    }

    public function update($request , $category){
        
        $category->fill($request->all());
        $category->slug = Str::of($request->input('categoryname'))->slug('-');

        $category->save();

    }

    public function destroy($id){
        
        $category = Category::Find($id);

        if($category){
            return Category::where('id',$id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
}