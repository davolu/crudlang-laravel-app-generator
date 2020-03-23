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
    return view('login');
});

Route::get('login', function () {
    return view('login');
});


Route::get('register', function () {
    return view('register');
});



Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');




//user auths 

Route::post('/login', [
     
    'uses' => 'UserController@loginview',
    'as' => 'user.loginview'
    
    
    ]);

    Route::post('/dashboard', [
     
        'uses' => 'UserController@getDashboard',
        'as' => 'user.dashboard'
        
        
        ]);

    Route::post('/register', [
     
        'uses' => 'UserController@RegisterUser',
        'as' => 'user.register'
        
        
        ]);
    
        Route::post('/dologin', [
     
            'uses' => 'UserController@doLogin',
            'as' => 'user.dologin'
            
            
            ]);
       
 
    Route::get('/logout', [
     
    'uses' => 'UserController@doLogout',
    'as' => 'user.logout'
    
    
    ]);






        