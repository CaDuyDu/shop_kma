<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminLoginController extends Controller
{
    public function showLoginForm(){
    	return view('admin.loginAdmin');
    }
    public function login(Request $request){

    	$check = Auth::guard('admin')->attempt($request->only(['email','password']));
    	if ($check) {

    		return redirect()->intended('admin/dashboard');


    	} else {

    		dd('Tai khoan khong dung');
    	}
    }
}
