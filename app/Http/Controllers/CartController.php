<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\order;
use App\order_detail;
use Validator;
use Illuminate\Support\Facades\Mail;
class CartController extends Controller
{
    public function add(Request $rq,$code){
    	$product = DB::table('products')->where('code',$code)->first();
    	// dd($product);
    	$cart = Cart::add(['id' => $product->id, 'name' => $product->name, 'price'=>$product->price,'qty'=>$rq->quantity,'options' => ['code' => $product->code,'size'=>$rq->size,'color'=>$rq->color]] );
     	return redirect('/checkout');
    }
    public function destroy($rowId){
        $cart = Cart::get($rowId);
        Cart::remove($rowId);

        // dd($cart);
        return response()->json([
            'cartDelete'=>$cart
        ]);
    }
    public function plus($rowId){
        $cart = Cart::get($rowId);
        $qty = (int)($cart->qty);
        $qty++;
        Cart::update($rowId, $qty);
        return response()->json([
            'data'=>$cart,'qty'=>$qty,
        ]);
    }
    public function minus($rowId){
        $cart = Cart::get($rowId);
        $qty = (int)($cart->qty);
        $qty--;
        Cart::update($rowId, $qty);
        return response()->json([
            'data'=>$cart,'qty'=>$qty,
        ]);
    }
    public function store(Request $rq){
      
        $validator = Validator::make($rq->all(), [
            'name' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/checkout')
                        ->withErrors($validator)
                        ->withInput();
        }
        $order = new order();
        $order->code = rand();
        $order->mobile = $rq->mobile;
        $order->email = $rq->email;
        $order->name = $rq->name;
        $order->user_id = '1';
        $order->status = 1;
        $order->address = $rq->address;
        $order->total_price = Cart::total();
        $order->save();
        $content = Cart::content();
        foreach($content as $key => $value){
            $order_detail = new order_detail();
            $order_detail->quantity = $value->qty;
            $order_detail->price = $value->price;
            $order_detail->order_id = $order->id;
            $order_detail->product_detail_id = '3';
            $order_detail->save();
        }
        Mail::send('mails.normal',['name'=>'shop.zent','order'=>$order,'content'=>$content],function($m){
            $m->subject('Xác nhận đơn hàng từ shop.zent');
            $m->to('vanduy07c.r@gmail.com','Zent');
            $m->from('zentgroup@gmail.com','ZentGroup');
        });
        Cart::destroy();
        return redirect('/checkout')->with(['flash_level'=>'result_msg','message'=>'Đã gửi giỏ hàng thàng công!']);
    }
}
