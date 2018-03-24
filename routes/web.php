<?php

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Mail;
Route::get('/mail',function(){
	// dd(env('MAIL_USERNAME'));
	Mail::send('mails.normal',['name'=>'hiep','data'=>'ahihi'],function($m){
		$m->subject('welcome!');
		$m->to('vanduy07c.r@gmail.com','Zent');
		$m->from('zentgroup@gmail.com','ZentGroup');
	});
	dd('done');
});
// Route::get('/', function () {
//     Cart::add('293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
//     Cart::add('dep', 'Product 2', 1, 9.99, ['size' => 'large']);
//     dd(Cart::content());
// });
Route::prefix('admin')->group(function(){
	Route::get('login','Auth\AdminLoginController@showLoginForm');
	Route::post('login','Auth\AdminLoginController@login')->name('adminLogin');
	
	Route::middleware(['admin.auth'])->group(function () {
		Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
		Route::get('user','UserController@index')->name('userIndex');

		Route::get('products','ProductController@index')->name('productIndex');
		Route::get('products/create','ProductController@createFormShow')->name('createProduct');
		Route::post('products/store','ProductController@store')->name('storeProduct');
		Route::get('product/{id}','ProductController@detail')->name('product.detail');
		Route::get('product/edit/{id}','ProductController@edit')->name('product.edit');
		Route::put('product/{id}','ProductController@update')->name('product.update');
		Route::delete('product/{id}','ProductController@destroy')->name('product.destroy');

		Route::get('product/list/{id}','ProductDetailController@index')->name('productDetail.index')
		;
		Route::post('product-detail/store','ProductDetailController@store')->name('productDetail.store');
		Route::delete('product-detail/{id}','ProductDetailController@destroy')->name('productDetail.destroy');
		Route::get('product-detail/edit/{id}','ProductDetailController@edit')->name('productDetail.edit');
		Route::put('product-detail/{id}','ProductDetailController@update')->name('productDetail.update');
		// Route::get('')

		Route::get('brands','BrandController@index')->name('brand.index');
		Route::post('brand/store','BrandController@store')->name('brand.store');
		Route::get('brand/{id}','BrandController@detail')->name('brand.detail');
		Route::delete('brand/{id}','BrandController@destroy')->name('brand.destroy');
		Route::put('brand/{id}',"BrandController@update")->name('brand.update');

		Route::get('categories','CategoryController@index')->name('categories.index');
		Route::post('category/{id}','CategoryController@store')->name('category.store');
		Route::get('category/{id}','CategoryController@detail')->name('category.detail');
		Route::delete('category/{id}','CategoryController@destroy')->name('category.destroy');
		Route::put('category/{id}',"CategoryController@update")->name('category.update');

		Route::post('logout','AdminController@logout')->name('adminLogout');

	    Route::post('user/store','UserController@store')->name('user.store');
	    Route::delete('user/{id}',"UserController@destroy")->name('user.destroy');
	    Route::get('user/{id}',"UserController@detail")->name('user.detail');
		Route::put('user/{id}',"UserController@update")->name('user.update');

		Route::get('orders','OrderController@index')->name('orders.index');
		Route::get('orders/{id}','OrderController@detail');
		Route::delete('order/{id}','OrderController@destroy');
		Route::get('order/status/{id}','OrderController@changeStatus');
	});
});
Route::get('/','PageController@homeShop')->name('page.homeShop');
// Route::get('/login','PageController@login')->name('page.login');
Route::get('/detail/{code}','PageController@detail')->name('page.detail');
Route::get('/checkout','PageController@checkout')->name('page.checkout');
Route::post('/addToCart/{code}','CartController@add');

Route::get('/deleteProductInCart/{rowId}','CartController@destroy');
Route::get('/plus/{rowId}','CartController@plus');
Route::get('/minus/{rowId}','CartController@minus');
Route::post('/storeCart','CartController@store')->name('storeCart');
Route::get('/storeCart',function(){
	Cart::store('duy');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
