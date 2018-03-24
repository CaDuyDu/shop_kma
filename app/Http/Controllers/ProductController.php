<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\brand;
use App\product_gallery;
use App\product_detail;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){
    	// $products = Product::get();

    	$products = Product::orderBy('id', 'DEST')->get();
    	return view('admin.products.products',['products'=>$products]);
    }
    public function detail($id){
        $product = Product::find($id);

        $images = Product::find($id)->imagesDetail->where('is_thumbnail', '0');
        // dd($images);
        $thumbnail = Product::find($id)->imagesDetail->where('is_thumbnail', '1')->first();
        // dd($images);
        // $products = Product::orderBy('id', 'DEST')->get();
        return view('admin.products.detail',['product'=>$product,'images'=>$images,'thumbnail'=>$thumbnail]);
    }
    public function destroy($id){
        Product::find($id)->delete();
        return response()->json(['message'=>'Xóa thành công']);
    }
    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();
        $brands = brand::all();
        $images = Product::find($id)->imagesDetail->where('is_thumbnail', '0');
        $thumbnail = Product::find($id)->imagesDetail->where('is_thumbnail', '1')->first();
        // dd($images);
        // $products = Product::orderBy('id', 'DEST')->get();
        return view('admin.products.edit',['product'=>$product,'images'=>$images,'thumbnail'=>$thumbnail,'categories'=>$categories,'brands'=>$brands]);
    }
    public function createFormShow(){
    	$categories = Category::all();
    	$brands = brand::all();
    	return view('admin.products.createForm',["categories"=>$categories,"brands"=>$brands]);
    }
    public function store(Request $rq){
    	$pro = new Product();
    	$pro->name = $rq->name;
    	$pro->brand_id = $rq->brand;
    	$pro->category_id = $rq->category;
    	$pro->code = $rq->code;
    	$pro->price = $rq->price;
    	$pro->description = $rq->description;

    	$pro->save();
    	$thumbnail = new product_gallery();
    	$f = $rq->file('txtimg')->getClientOriginalName();
    	$filename = time().'_'.$f;
    	$thumbnail->link = $filename;
    	$thumbnail->is_thumbnail = true;
    	$thumbnail->product_id = $pro->id;
    	$rq->file('txtimg')->move('images/products/',$filename);
    	$thumbnail->save();

    	// $product_detail = new product_detail();
    	// $product_detail->product_id = $pro->id;
    	// $product_detail->size = $rq->size;
    	// $product_detail->color = $rq->color;
    	// $product_detail->quantity = $rq->quantity;
    	// $product_detail->save();
    	if ($rq->hasFile('txtdetail_img')) {
    		$df = $rq->file('txtdetail_img');
    		foreach ($df as $row) {
    			$img_detail = new product_gallery();
    			if (isset($row)) {
    				$name_img= time().'_'.$row->getClientOriginalName();
    				$img_detail->link = $name_img;
    				$img_detail->product_id = $pro->id;
    				$img_detail->is_thumbnail = false;
    				$row->move('images/products/details',$name_img);
    				$img_detail->save();
    			}
    		}
		}
    	return redirect('/admin/products')->with(['flash_massage'=>' Đã thêm thành công !']);

    }
    public function update(Request $rq,$id){
        $product = Product::find($id);
        $product->name = $rq->name;
        $product->brand_id = $rq->brand;
        $product->category_id = $rq->category;
        $product->code = $rq->code;
        $product->price = $rq->price;
        $product->description = $rq->description; 
        $product->save();
        if ($rq->hasFile('txtimg')) {
            $images = Product::find($id)->imagesDetail->where('is_thumbnail', '1')->first();
            $f = $rq->file('txtimg')->getClientOriginalName();
            $filename = time().'_'.$f;
            $rq->file('txtimg')->move('images/products/',$filename);
            $data['link'] = $filename;
            $images->update($data);
        }
        for($i=1;$i<=3;$i++){
            $filename = "txtdetail_img_".$i;
            if($rq->hasFile($filename)){
                $images = Product::find($id)->imagesDetail->where('is_thumbnail', '0');
                $f = $rq->file($filename)->getClientOriginalName();
                $name = time().'_'.$f;
                $rq->file($filename)->move('images/products/details',$name);
                $data['link'] = $name;
                $images[$i]->update($data);
                }
        }
        return redirect('/admin/products')->with(['flash_massage'=>' Đã sửa thành công !']);       
    }
    	
    
}
