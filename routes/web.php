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
    return view('pms');
});
Route::get('/successOrder',function()
{
    
    if (Auth::user()){
        return view('successOrder');
    }else{
        return view('auth.login');
    }
});
// Route::get('/pdashboard', function (){
//     if(Auth::user()){
//         return view('priorityDashboard');
//     }
//     else{
//         return view('auth.login');
//     }
// });
//Route::get('/pdashboard','PriorityController@order');
Route::get('/pdashboard','OrderController@success');
Route::get('/successReg',function ()
{
    return view('successReg');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/xyz','Auth\RegisterController@store')->name('xyz');
Route::middleware(['auth'])->group(function () {
    Route::get('/approval', 'HomeController@approval')->name('approval');
    Route::middleware(['approved'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/adminDashboard', function () {
            return view('adminDashboard');
        });
        Route::get('/orderList','PriorityController@orderList');
        Route::get('/users', 'UserController@index')->name('admin.users.index');
        Route::get('/users/{user_id}/approve', 'UserController@approve')->name('admin.users.approve');
    });
});

// Admin login routes
Route::get('/admin/login', function () {
    return view('auth/login2');
});
//Admin Authentication Routes...
Route::get('login2', 'Auth\LoginController2@showLoginForm')->name('login2');
Route::post('login2', 'Auth\LoginController2@login');
Route::post('logout2', 'Auth\LoginController2@logout')->name('logout2');

Route::post('/order','OrderController@order');
Route::get('delete/{nsu_id}','PriorityController@delete');
