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

Auth::routes();
Route::get('/logout','HomeController@logout')->name('logout');
Route::get('/master', function (){
    return view('layouts/master');
});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');

Route::get('/member/view/{id}', 'MemberController@view');
Route::get('/member/cart/{id}', 'MemberController@cart');
Route::get('/member/cartshow', 'MemberController@cartshow')->name('cartshow');
Route::get('/member/cartDelete/{id}', 'MemberController@cartDelete');
Route::put('/member/checkout', 'MemberController@checkout')->name('checkout');
Route::get('/member/transaction', 'MemberController@transaction')->name('transaction');
Route::get('/member/profile/{id}', 'MemberController@profile');
Route::put('/member/profile', 'MemberController@profileupdate')->name('update');
Route::get('/member/feedback/{id}', 'MemberController@feedback');
Route::post('/member/feedback', 'MemberController@storefeedback')->name('storefeedback');

Route::get('/admin/figure/', 'AdminConstroller@figure')->name('figure');
Route::get('/admin/figure/insert', 'AdminConstroller@insertfigure')->name('insertfigure');
Route::post('/admin/figure/storeinsert', 'AdminConstroller@storefigure')->name('storefigure');
Route::get('/admin/figure/update/{id}', 'AdminConstroller@updatefigure');
Route::put('/admin/figure/update/', 'AdminConstroller@setfigure')->name('updatefigure');
Route::get('/admin/figure/delete/{id}', 'AdminConstroller@deletefigure');
Route::get('/admin/transaction', 'AdminConstroller@transaction')->name('adminTransaction');

Route::get('/admin/user/', 'AdminConstroller@user')->name('user');
Route::get('/admin/user/insert', 'AdminConstroller@insertuser')->name('insertuser');
Route::post('/admin/user/storeuser', 'AdminConstroller@storeuser')->name('storeuser');
Route::get('/admin/user/update/{id}', 'AdminConstroller@updateuser');
Route::put('/admin/user/update/', 'AdminConstroller@setuser')->name('updateuser');
Route::get('/admin/user/delete/{id}', 'AdminConstroller@deleteuser');

Route::get('/admin/category', 'AdminConstroller@category')->name('category');
Route::get('/admin/category/insert', 'AdminConstroller@insertcategory')->name('insertcategory');
Route::post('/admin/category/storecategory', 'AdminConstroller@storecategory')->name('storecategory');
Route::get('/admin/category/update/{id}', 'AdminConstroller@updatecategory');
Route::put('/admin/category/update/', 'AdminConstroller@setcategory')->name('updatecategory');
Route::get('/admin/category/delete/{id}', 'AdminConstroller@deletecategory');

Route::get('/admin/feedback', 'AdminConstroller@feedback')->name('feedback');
Route::get('/admin/feedback/update/{id}', 'AdminConstroller@approvefeedback');
Route::get('/admin/feedback/delete/{id}', 'AdminConstroller@removefeedback');




