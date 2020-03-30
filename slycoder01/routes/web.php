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


Route::get('/webapps/alpha', 'PagesController@alpha');
//Route::get('/webapps/foodbank', 'PagesController@foodbank');
//Route::get('/webapps/showfoodbank', 'FoodBanksController@getFoodBanks');
//Route::get('/webapps/fb/show', 'FoodBanksController@show');
Route::get('/webapps/foodbank', 'FoodBanksController@index');
// admin area 
Route::get('/webapps/foodbank/showcities', 'FoodBankCitiesController@index');
Route::post('/webapps/foodbank/addcity', 'FoodBankCitiesController@store');
//Route::get('/webapps/foodbank/show', 'FoodBanksController@index');
Route::get('/webapps/foodbank/addfoodbank', 'FoodBanksController@create');
Route::post('/webapps/foodbank/saveaddition', 'FoodBanksController@store');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
