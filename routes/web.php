<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','AdminController@loginAdmin');
Route::post('/','AdminController@postloginAdmin');

Route::get('home', function () {
    return view('home');
});
//add category
Route::prefix('admin')->group(function (){
    Route::prefix('category')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' =>'CategoryContronller@index'
        ]);

        Route::get('/create',[
            'as' => 'categories.create',
            'uses' =>'CategoryContronller@create'
        ]);

        Route::post('/store',[
            'as' => 'categories.store',
            'uses' =>'CategoryContronller@store'
        ]);

        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' =>'CategoryContronller@edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' =>'CategoryContronller@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' =>'CategoryContronller@delete'
        ]);
    });
//add publishers
Route::prefix('publishers')->group(function () {
    Route::get('/',[
        'as' => 'publishers.index',
        'uses' =>'PublishersContronller@index'
    ]);
    Route::get('/create',[
        'as' => 'publishers.create',
        'uses' =>'PublishersContronller@create'
    ]);
    Route::post('/store',[
        'as' => 'publishers.store',
        'uses' =>'PublishersContronller@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'publishers.edit',
        'uses' =>'PublishersContronller@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'publishers.update',
        'uses' =>'PublishersContronller@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'publishers.delete',
        'uses' =>'PublishersContronller@delete'
    ]);


});
//add books
Route::prefix('books')->group(function () {
    Route::get('/',[
        'as' => 'books.index',
        'uses' =>'AdminBooksController@index'
    ]);

    Route::get('/create',[
        'as' => 'books.create',
        'uses' =>'AdminBooksController@create'
    ]);

    Route::post('/store',[
        'as' => 'books.store',
        'uses' =>'AdminBooksController@store'
    ]);
    Route::get('/edit/{id}',[
        'as' => 'books.edit',
        'uses' =>'AdminBooksController@edit'
    ]);
    Route::post('/update/{id}',[
        'as' => 'books.update',
        'uses' =>'AdminBooksController@update'
    ]);
    Route::get('/delete/{id}',[
        'as' => 'books.delete',
        'uses' =>'AdminBooksController@delete'
    ]);
});
    //add Authors
    Route::prefix('authors')->group(function () {
        Route::get('/',[
            'as' => 'authors.index',
            'uses' =>'AdminAuthorsController@index'
        ]);

        Route::get('/create',[
            'as' => 'authors.create',
            'uses' =>'AdminAuthorsController@create'
        ]);

        Route::post('/authors',[
            'as' => 'authors.store',
            'uses' =>'AdminAuthorsController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'authors.edit',
            'uses' =>'AdminAuthorsController@edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'authors.update',
            'uses' =>'AdminAuthorsController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'authors.delete',
            'uses' =>'AdminAuthorsController@delete'
        ]);

    });


});

// Route đăng nhập
Route::group(['prefix' => 'auth'], function($route) {
    $route->get('login',[App\Http\Controllers\Admin\Users\LoginController::class,'index'])->name('login');
    $route->post('login',[App\Http\Controllers\Admin\Users\LoginController::class,'store']);
    $route->get('register',[App\Http\Controllers\Admin\Users\LoginController::class,'getRegister'])->name('get.register');
	$route->post('register',[App\Http\Controllers\Admin\Users\LoginController::class,'postRegister'])->name('post.register');
    

});
// Route trang chu
Route::middleware(['auth'])->group(function(){
Route::get('/admin/main',[App\Http\Controllers\Admin\MainController::class,'index'])->name('main')->middleware('auth');

});
// Admin
		Route::group(['prefix'=>'admin'],function(){ //middle ware 
//dashboard
    	Route::group(['prefix'=>'dashboard'],function(){
      	Route::get('mud/index',[App\Http\Controllers\Admin\Users\LoginController::class,'dashboard'])->name('dashboard');
    });
//profile
   	 	Route::group(['prefix'=>'profile'],function(){
    	Route::get('profile-index/{id}',[App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profile.index');
        Route::post('edit',[App\Http\Controllers\Admin\ProfileController::class,'editProfile'])->name('profile.edit');
//User
    	Route::group(['prefix'=>'user'],function(){
      	Route::get('mud/index',[App\Http\Controllers\Admin\UserController::class,'index'])->name('index.user');
     	Route::get('mud/create',[App\Http\Controllers\Admin\UserController::class,'create'])->name('create.user');
    	Route::post('mud/create-user',[App\Http\Controllers\Admin\UserController::class,'store'])->name('add.user');
  		Route::get('edit/{id}',[App\Http\Controllers\Admin\UserController::class,'edit'])->name('edit.user');
  		Route::post('edit-user/{id}',[App\Http\Controllers\Admin\UserController::class,'update'])->name('update.user'); //{id}: biết muốn sửa thể loại nào
  		Route::get('delete/{id}',[App\Http\Controllers\Admin\UserController::class,'destroy'])->name('delete.user');
      	Route::get('/search/user',[App\Http\Controllers\Admin\UserController::class,'search'])->name('search.user');
   });
//Comment
    Route::group(['prefix'=>'comment'],function(){
      Route::get('mud/pendding-index',[App\Http\Controllers\Admin\CommentController::class,'penddingIndex'])->name('pendding.index.comment');
      Route::get('mud/success-index',[App\Http\Controllers\Admin\CommentController::class,'successIndex'])->name('success.index.comment');
      Route::get('success-comment/{id}',[App\Http\Controllers\Admin\CommentController::class,'successComment'])->name('success.comment');
      Route::get('delete-comment/{id}',[App\Http\Controllers\Admin\CommentController::class,'deleteComment'])->name('delete.comment');
   });
});
//Borrow
Route::group(['prefix' => 'borrow'],function () {
    Route::get('', [App\Controller\BorrowController::class],'index')->name('borrow.index');
    Route::get('status/{id}', [App\Controller\BorrowController::class],'updateStatus')->name('borrow.status');

});
});

