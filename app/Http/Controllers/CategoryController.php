<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class categoryController extends Controller
{
    public function index(){
    	$categories = Category::get();
    	return view('admin.category',['categories'=>$categories]);
    }
    public function detail($id){
        $category=Category::find($id);
        // return view('products.detail',compact('product','id'));
        return response()->json([
            'data'=>$category
        ]);
    }
    public function store(Request $request){
        $this->validate(request(), [
          'name' => 'required',
          'code' => 'required|unique:categories',
        ]);
        $data = $request->all();
    	$category = Category::create($data);
    	return response()->json([
            'data'=>$category
        ]);
    }

    public function update(Request $request,$id){
    	$category = Category::find($id);
        $this->validate(request(), [
          'name' => 'required',        ]);
        $category->name = $request->get('name');
        $category->code = $request->get('code');
        $category->save();
        $category = Category::find($id);
    	return response()->json([
            'data'=>$category
        ]);
    }

    public function destroy($id){
    	Category::find($id)->delete();
    	return response()->json(['message'=>'Xóa thành công']);
    }
}
