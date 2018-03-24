<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    public function index(){
    	$brands = Brand::get();
    	return view('admin.brand',['brands'=>$brands]);
    }
    public function detail($id){
        $brand=Brand::find($id);
        // return view('products.detail',compact('product','id'));
        return response()->json([
            'data'=>$brand
        ]);
    }
    public function store(Request $request){
        $this->validate(request(), [
          'name' => 'required',
          'code' => 'required|unique:brands',
        ]);
        $data = $request->all();
    	$brand = Brand::create($data);
    	return response()->json([
            'data'=>$brand
        ]);
    }

    public function update(Request $request,$id){
    	$brand = Brand::find($id);
        $this->validate(request(), [
          'name' => 'required',        ]);
        $brand->name = $request->get('name');
        $brand->code = $request->get('code');
        $brand->save();
        $brand = Brand::find($id);
    	return response()->json([
            'data'=>$brand
        ]);
    }

    public function destroy($id){
    	Brand::find($id)->delete();
    	return response()->json(['message'=>'Xóa thành công']);
    }
}
