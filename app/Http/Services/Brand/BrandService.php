<?php

namespace App\Http\Services\Brand;

use App\Models\Brand;

class BrandService{

    public function getAll(){

        return Brand::orderByDesc('id')->get();
    }

    public function create($request){ 
        
        Brand::create($request->all());

    }

    public function update($request , $brand) {

        $brand->fill($request->all());
        $brand->save();
        
    }

    public function destroy($id){
        
        $brand = Brand::Find($id);

        if($brand){
            
            return $brand->delete();
        }
        return false;
    }
}