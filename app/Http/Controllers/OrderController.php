<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use DB;
class OrderController extends Controller
{
    public function index(){
    	$orders = order::orderBy('id', 'DEST')->get();
    	return view('admin.order',['orders'=>$orders]);
    }
    public function detail($id){
    	$list_detail = DB::table('order_details')->where('order_id',$id)->get();
    	// $list_detail = order::find($id)->order_detail->first();
    	return view('admin.order_detail',['list_detail'=>$list_detail]);
    }
    public function destroy($id){
    	order::find($id)->delete();
    	DB::table('order_details')->where('order_id',$id)->delete();
        return response()->json(['message'=>'Xóa thành công']);
    }
    public function changeStatus($id){
    	$order = order::find($id);
    	$order->status = 0;
    	$order->update();
    	return response()->json(['message'=>'Thay đổi thành công']);
    }
}
