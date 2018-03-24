<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function dashboard(){
    	return view('admin.dashboard');
    }
    public function logout() {
    	Auth::guard('admin')->logout();
    	return redirect()->to('admin/login');
    }
}
