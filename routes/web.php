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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*---------------frontend----------------------*/
Route::get('/',['as'=>'home','uses'=>'HomeController@getIndex']);


/*---------------Backend----------------------*/
Route::get('/admin',['as'=>'admin','uses'=>'AdminController@getLogin']);
Route::post('/admin',['as'=>'admin','uses'=>'AdminController@postLogin']);

Route::group(['prefix'=>'admin'], function () {
    
    Route::get('dashboard',['as'=>'admin.dashboard','uses'=>'AdminController@getDashboard']);
    
    Route::group(['prefix'=>'staff'], function () {
        Route::get('/',['as'=>'admin.staff.getList','uses'=>'StaffController@getListStaff']);
        Route::get('list',['as'=>'admin.staff.getList','uses'=>'StaffController@getListStaff']);
        Route::get('add',['as'=>'admin.staff.getAdd','uses'=>'StaffController@getAddStaff']);
    	Route::post('add',['as'=>'admin.staff.postAdd','uses'=>'StaffController@postAddStaff']);
        Route::get('edit/{id}',['as'=>'admin.staff.getEdit','uses'=>'StaffController@getEditStaff']);
        Route::post('edit/{id}',['as'=>'admin.staff.postEdit','uses'=>'StaffController@postEditStaff']);
        Route::get('delete/{id}',['as'=>'admin.staff.getDelete','uses'=>'StaffController@getDeleteStaff']);
    });
   
});

