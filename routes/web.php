<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
	return 'Hello Word';
});

Route::get('/hi', function() {
	return "This is valentine day";
});

/********************** Method GET ****************/
Route::get('/test', function() {
	return "This is test";
});
// test duoc goi la request ma nguoi dung gui len
// :: static
// return "This is test"; duoc hieu la respone tra ket qua ve

/*********************** Method POST *************/
Route::post('/demopost',function() {
	return "This is method post";
});

/*********************** Method delete *************/
Route::delete('/demo-delete', function()  {
	return "this is method delete";
});

/*********************** Method PUT *************/
Route::put('/demo-put', function()  {
	return "this is method PUT";
});

//chap nhan moi phuong thuc cho 1 request
Route::any('/demo-any', function() {
	return "this is method Any";
});

// chap nhan 1 hoac nhieu phuong thuc cho 1 request
Route::match(['get', 'post', 'put'], '/all-in-one', function() {
	return "This is method Match";
});

Route::get('/quynh-bup-be-t1', function() {
	return redirect('nguoi-phan-xu-t1'); // dieu huong trang
});

Route::get('/nguoi-phan-xu-t1', function() {
	return "Nguoi phan xu tap 1";
})->name('npx');

Route::get('/film-super-man', function() {
	return redirect()->route('npx');
});

Route::get('/demo-view', function() {
	return view('demo'); // goi đến đoạn html tại resources/views/demo.blade.php
});

// truyen tham so vao router
// phai truyen du tham so vao link
Route::get('/samsung/{name}/{price}', function($namePhone,$pricePhone) {
	return "ban dang xem dien thoai {$namePhone} - gia ban la : {$pricePhone}";
});

// tham so khong bat buoc
Route::get('/apple/{name?}/{price?}', function($name = null, $price = null) {
	return "Ban dang xem dien thoai IP {$name} - gia ban la : {$price}";
});

// validate tham so routes
// tuoi chi duoc phep nhap so
// ten chi dc la chu
Route::get('/check-age/{age}/{name}', function($age, $name) {
	return "my age is {$age} - ten la : {$name}";
})->where(['age' => '[0-9]+', 'name' => '[A-Za-z]+']);

// name routes
Route::get('/home-page-1', function() {
	return view('home-page');
})->name('homePage');

Route::get('/contact-page', function() {
	return "this is contact page";
})->name('ContactPage');

//route group


Route::group([
	'prefix' => 'admin', // tien tố đứng đầu của các đường link
	'as' => 'admin.', // đứng đầu trước tất cả các name()
], function() {
	Route::get('/home', function() {
		return "admin - home";
	})->name('home');
	Route::get('/product', function() {
		return "admin - Product";
	})->name('product');
});

Route::get('/login', function() {
	return redirect()->route('admin.home');
});

Route::get('/watch-film/{age}', function($age) {
	return redirect()->route('qbb');
})->name('WatchFilm')
->where('age' , '[0-9]+')
->middleware('myCheckAge');

Route::get('/quynh-bup-be-t10', function() {
	return "Chuc ban xem phim vui ve";
})->name('qbb');

Route::get('/do-not-watch-film', function() {
	return "Ban chua du tuoi de vao xem";
})->name('cancleFilm');

Route::get('/kt-snt/{number}', function($number){

});
Route::get('/result-ok', function() {
	return "OK";
});

Route::get('/result-fail', function() {
	return "FAIL";
});
