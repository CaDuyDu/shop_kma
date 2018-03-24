<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\brand;
use App\Category;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
class PageController extends Controller
{
    public function homeShop(){
		// $categories = Category::get(); 
		$latest_products_1 = Product::orderBy('id','DEST')->Where('category_id',1)->take(3)->get();
		$latest_products_2 = Product::orderBy('id','DEST')->Where('category_id',2)->take(3)->get();
        // dd($latest_products_2);
		return view('front-end.index',[
        	'latest_products_1'=>$latest_products_1,
			'latest_products_2'=>$latest_products_2,
		]);   	
    }
    // public function login(){
    // 	return view('frontend.register');
    // }
    public function checkout(){
        $cart = Cart::content();
        return view('front-end.checkout',['cart'=>$cart]);
    }
    public function detail($code){

    	$product = DB::table('products')->where('code',$code)->first();
        $products = Product::orderBy('id','DEST')->Where('category_id',$product->category_id)->take(3)->get();
    	$images = Product::find($product->id)->imagesDetail->Where('is_thumbnail','0');
    	$colors = Product::find($product->id)->productsDetail->groupBy('color');
    	$size = Product::find($product->id)->productsDetail->groupBy('size');
    	$details = Product::find($product->id)->productsDetail;
    	// dd($details);
    	return view('front-end.single',[
            'products'=>$products,
    		'product'=>$product,
    		'images_detail'=>$images,
    		'details'=>$details,
    		'colors'=>$colors,
    		'size'=>$size,
    	]);
    }
}
