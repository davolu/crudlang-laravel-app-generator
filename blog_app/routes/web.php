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






         



//wallets crud

Route::get('managewallet', [
     
    'uses' => 'WalletController@index',
    'as' => 'view.managewallet'
    ])->middleware('auth');


 

Route::get('addwallet', [
     
    'uses' => 'WalletController@create',
    'as' => 'form.addwallet'
    ])->middleware('auth');
    
    
    Route::post('submitaddwallet', [
     
        'uses' => 'WalletController@store',
        'as' => 'action.addwallet'
        ])->middleware('auth');
        
        
            
        
        Route::post('submitupdatewallet', [
     
            'uses' => 'WalletController@update',
            'as' => 'action.updatewallet'
            ])->middleware('auth');
            
     
            
        Route::post('deletewallet', [
     
            'uses' => 'WalletController@destroy',
            'as' => 'user.deletewallet'
            ])->middleware('auth');
    
                
         
             



//notifications crud

Route::get('managenotification', [
     
    'uses' => 'NotificationController@index',
    'as' => 'view.managenotification'
    ])->middleware('auth');


 

Route::get('addnotification', [
     
    'uses' => 'NotificationController@create',
    'as' => 'form.addnotification'
    ])->middleware('auth');
    
    
    Route::post('submitaddnotification', [
     
        'uses' => 'NotificationController@store',
        'as' => 'action.addnotification'
        ])->middleware('auth');
        
        
            
        
        Route::post('submitupdatenotification', [
     
            'uses' => 'NotificationController@update',
            'as' => 'action.updatenotification'
            ])->middleware('auth');
            
     
            
        Route::post('deletenotification', [
     
            'uses' => 'NotificationController@destroy',
            'as' => 'user.deletenotification'
            ])->middleware('auth');
    
                
         
            