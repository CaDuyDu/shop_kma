<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\product_detail;
class ProductDetailController extends Controller
{
    public function index($id){
    	$pro = Product::find($id);
    	$code = $pro->code;
    	$products = Product::find($id)->productsDetail()->get();
    	return view('admin.products.list_detail_product',['products'=>$products,'code'=>$code,'product_id'=>$id]);
    }
    public function edit($id){
    	$product = product_detail::find($id);
    	return response()->json([
    		'data'=>$product,
    	]);
    }
    public function store(Request $request){
        // $validator = \Validator::make($request->all(), ['name' => 'required',
        //   'email' => 'required|unique:users|email',
        //   'password' => 'required|min:6',]);
        
        // if ($validator->fails()) {
        //   return response()->json(['errors'=>$validator->errors()], 422);
        // }
        $data = $request->all();
    	$product = product_detail::create($data);
    	return response()->json([
            'data'=>$product,
        ],200);
    }
    public function destroy($id){
        product_detail::find($id)->delete();
        return response()->json(['message'=>'Xóa thành công']);
    }
    public function update(Request $request,$id){
    	$product = product_detail::find($id);
        // $this->validate(request(), [
        //   'name' => 'required',
        //   'email' => 'required|email',
        // ]);
        $product->size = $request->get('size');
        $product->color = $request->get('color');
        $product->quantity = $request->get('quantity');
        $product->save();
        $product = product_detail::find($id);
    	return response()->json([
            'data'=>$product
        ]);
    }
}
