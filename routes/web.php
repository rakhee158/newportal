<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PandaemicController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\NewspaperController;
use App\Http\Controllers\User\ReviewController;
use App\Models\Country;
use App\Models\Post;
use App\Models\category;


Route::get('/', function () {
  $data =   Country::all();
  $post_data=  Post::all();

  $category_data= category::all();
    return view('front/layouts/home',compact(['data','post_data','category_data']));
});

Auth::routes();

Route::get('/home', function(){
       
});

Route::group(['prefix' => 'home', 
              'middleware' => (['auth'])
            ], function(){
	Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

	// Route::group(['namespace' => 'App\Http\Controllers' , 'as' => 'admin.'], function(){
	// 	Route::resource('pandaemic/store1',PandaemicController::class);
 //    });

	Route::group(['namespace' => 'App\Http\Controllers\Admin' , 'as' => 'admin.'], function(){
		Route::resources([
            'setup/category' => CategoryController::class,
            'setup/country' => CountryController::class,
            'setup/city' => CityController::class,
            'setup/subcategory' => SubcategoryController::class,
        ]);
	});
    Route::group(['namespace' => 'App\Http\Controllers\User' , 'as' => 'User.'], function(){
        Route::resources([
            // 'newspost' => NewspostController::class,
            'post' => PostController::class,
            'newspaper' => NewspaperController::class,
            // 'review' => ReviewController::class,
             
        ]);
    });
	 
});

