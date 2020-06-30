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

Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/webapps', 'PagesController@webapps');
Route::get('/resources', 'PagesController@resources');

Route::get('/webapps/drivertools', 'DriverToolsController@index');
Route::get('/webapps/drivertools/calculator', 'DriverToolsController@index');
Route::get('/webapps/drivertools/count', 'DriverToolsController@count');
Route::get('/webapps/drivertools/vehicle', 'DriverToolsController@vehicle');
Route::get('/webapps/drivertools/goals', 'DriverToolsController@goals');


Route::get('/webapps/alpha', 'PagesController@alpha');
//Route::get('/webapps/foodbank', 'PagesController@foodbank');
//Route::get('/webapps/showfoodbank', 'FoodBanksController@getFoodBanks');
//Route::get('/webapps/fb/show', 'FoodBanksController@show');
Route::get('/webapps/foodbank', 'FoodBanksController@index');




// admin area 

//Route::prefix('/admin')->group(function () {

    Route::group(['middleware' => 'CheckUser', 'middleware' => 'auth'], function(){

        Route::group(['middleware' => 'role:SLY_ADMIN'], function(){

            Route::get('/admin', 'AdminController@index')->name('admin');


            Route::get('/displayusers', 'UsersController@index');

            Route::get('/webapps/foodbank/showcities', 'FoodBankCitiesController@index');
            Route::post('/webapps/foodbank/addcity', 'FoodBankCitiesController@store');
            Route::get('/webapps/foodbank/showAdminList', 'FoodBanksController@showAdminList');

            Route::get('/webapps/foodbank/addfoodbank', 'FoodBanksController@create');
            Route::post('/webapps/foodbank/savefoodbank', 'FoodBanksController@store');

            Route::get('/webapps/foodbank/show/{id}', 'FoodBanksController@show');
            Route::get('/webapps/foodbank/edit/{id}', 'FoodBanksController@edit');
            Route::get('/webapps/foodbank/updatefoodbank/{id}', 'FoodBanksController@update');
            

        });

        Route::group(['middleware' => 'role:SLY_SUPERADMIN'], function(){

            Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin');
            //Route::get('/superadmin', 'SuperAdminController@index');
    
        });


    });
//});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
