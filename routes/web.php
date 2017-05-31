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

/*Route::get('/', function () {
    return view('frontend.index');
});*/
/*---------------frontend----------------------*/


Auth::routes();

Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@getLogout')->name('admin.getLogout');
   
	Route::group(['prefix'=>'staff'], function () {
        Route::get('/',['as'=>'admin.staff.getList','uses'=>'StaffController@getListStaff']);
        Route::get('/list',['as'=>'admin.staff.getList','uses'=>'StaffController@getListStaff']);
        Route::get('add',['as'=>'admin.staff.getAdd','uses'=>'StaffController@getAddStaff']);
    	Route::post('add',['as'=>'admin.staff.postAdd','uses'=>'StaffController@postAddStaff']);
        Route::get('edit/{id}',['as'=>'admin.staff.getEdit','uses'=>'StaffController@getEditStaff']);
        Route::post('edit/{id}',['as'=>'admin.staff.postEdit','uses'=>'StaffController@postEditStaff']);
        Route::get('delete/{id}',['as'=>'admin.staff.getDelete','uses'=>'StaffController@getDeleteStaff']);
    });

    Route::group(['prefix'=>'category'], function () {
        Route::get('/',['as'=>'admin.category.getList','uses'=>'CategoryController@getListCategory']);
        Route::get('/list',['as'=>'admin.category.getList','uses'=>'CategoryController@getListCategory']);
        Route::get('add',['as'=>'admin.category.getAdd','uses'=>'CategoryController@getAddCategory']);
        Route::post('add',['as'=>'admin.category.postAdd','uses'=>'CategoryController@postAddCategory']);
        Route::get('edit/{id}',['as'=>'admin.category.getEdit','uses'=>'CategoryController@getEditCategory']);
        Route::post('edit/{id}',['as'=>'admin.category.postEdit','uses'=>'CategoryController@postEditCategory']);
        Route::get('delete/{id}',['as'=>'admin.category.getDelete','uses'=>'CategoryController@getDeleteCategory']);
    });
    Route::group(['prefix'=>'post'], function () {
        Route::get('/',['as'=>'admin.post.getList','uses'=>'PostController@getListPost']);
        Route::get('/list',['as'=>'admin.post.getList','uses'=>'PostController@getListPost']);
        Route::get('add',['as'=>'admin.post.getAdd','uses'=>'PostController@getAddPost']);
        Route::post('add',['as'=>'admin.post.postAdd','uses'=>'PostController@postAddPost']);
        Route::get('edit/{id}',['as'=>'admin.post.getEdit','uses'=>'PostController@getEditPost']);
        Route::post('edit/{id}',['as'=>'admin.post.postEdit','uses'=>'PostController@postEditPost']);
        Route::get('delete/{id}',['as'=>'admin.post.getDelete','uses'=>'PostController@getDeletePost']);
        Route::get('view/{id}',['as'=>'admin.post.getView','uses'=>'PostController@getViewPost']);
    });
    Route::group(['prefix'=>'comment'], function () {
        Route::get('/',['as'=>'admin.comment.getList','uses'=>'CommentController@getListComment']);
        Route::get('/list',['as'=>'admin.comment.getList','uses'=>'CommentController@getListComment']);
        Route::get('edit/{id}',['as'=>'admin.comment.getEdit','uses'=>'CommentController@getEditComment']);
        Route::post('edit/{id}',['as'=>'admin.comment.postEdit','uses'=>'CommentController@postEditComment']);

    });
    Route::group(['prefix'=>'user'], function () {
        Route::get('/',['as'=>'admin.user.getList','uses'=>'UserController@getListUser']);
        Route::get('/list',['as'=>'admin.user.getList','uses'=>'UserController@getListUser']);
        Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEditUser']);
        Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEditUser']);
    });
});

Route::get('/',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/home',['as'=>'home','uses'=>'HomeController@index']);
Route::get('/new-post',['as'=>'new-post','uses'=>'HomeController@index']);
Route::get('/top-view',['as'=>'top-view','uses'=>'HomeController@getTopView']);
Route::get('/top-comment',['as'=>'top-comment','uses'=>'HomeController@index']);
Route::get('/post/{cate_slug}/{post_slug}',['as'=>'post','uses'=>'HomeController@getPost']);
Route::get('/loai-bai-viet',['as'=>'category','uses'=>'HomeController@getCategory']);
Route::get('/{cate}',['as'=>'home','uses'=>'HomeController@getListPostByCategory']);
Route::post('/post/{cate_slug}/{post_slug}',['as'=>'comment','uses'=>'HomeController@postComment']);
