<?php

use Vinkla\Hashids\Facades\Hashids;

Route::controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController',
]);
Route::group(['middleware' => ['auth', 'App\Http\Middleware\VisitorMiddleware']], function () {
    Route::get('CV/search', 'CVController@search');
    Route::get('CV', 'CVController@index');
    Route::get('CV/{CV}/getPDF', 'CVController@getPDF');

});
Route::group(['middleware' => ['auth']], function () {
    Route::bind('User', function ($id) {
        return Hashids::decode($id)[0];
    });
    Route::bind('Bookmark', function ($id) {
        return Hashids::decode($id)[0];
    });
    Route::bind('CV', function ($id) {
        return Hashids::decode($id)[0];
    });
    //every one can see
    Route::get('/', function () {
        return view('about');
    });
    Route::get('about', function () {
        return view('about');
    });

    //every one see different page  
    Route::get('CV/{CV}', 'CVController@show')->where('id', '^(?!search).*');
    Route::get('CV/{CV}/view', 'CVController@show2');
    Route::get('Record/index/{type}', 'RecordController@index');
    Route::get('User/{User}/changePass', 'UsersController@changePassword');

    //admin only
    Route::get('User/search', 'UsersController@search');

    Route::resource('User', 'UsersController', ['except' => ['create']]);
    Route::resource('Bookmark', 'BookmarkController', ['except' => ['store', 'destroy', 'create', 'edit']]);
    Route::resource('Record', 'RecordController');
    Route::resource('Skill', 'SkillController');
});
Route::group(['middleware' => ['auth', 'App\Http\Middleware\ApplicantMiddleware']], function () {
    Route::resource('CV', 'CVController', ['except' => ['index', 'destroy', 'show']]);
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@myLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
