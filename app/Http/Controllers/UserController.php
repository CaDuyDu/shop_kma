<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(){
    	$users = User::get();
    	return view('admin.user',['users'=>$users]);
    }
    public function detail($id){
        $user=User::find($id);
        // return view('products.detail',compact('product','id'));
        return response()->json([
            'data'=>$user
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
        $pass = $data['password'];
        $data['password'] = bcrypt($pass);
    	$user = User::create($data);
    	return response()->json([
            'data'=>$user
        ],200);
    }

    public function update(Request $request,$id){
    	$user = User::find($id);
        $this->validate(request(), [
          'name' => 'required',
          'email' => 'required|email',
        ]);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        $user = User::find($id);
    	return response()->json([
            'data'=>$user
        ]);
    }

    public function destroy($id){
    	User::find($id)->delete();
    	return response()->json(['message'=>'Xóa thành công']);
    }
}
