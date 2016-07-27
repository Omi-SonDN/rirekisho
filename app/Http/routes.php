<?php

use Vinkla\Hashids\Facades\Hashids;

Route::controllers([
    'auth' => '\App\Http\Controllers\Auth\AuthController',
    'password' => '\App\Http\Controllers\Auth\PasswordController',
]);
// gioi han quyen voi aplication
Route::group(['middleware' => ['auth', 'App\Http\Middleware\VisitorMiddleware']], function () {
    Route::get('CV/search', 'CVController@search');
    Route::get('CV/search1', 'CVController@search1');
    Route::get('CV', 'CVController@index');
    Route::get('CV/{CV}/getPDF', 'CVController@getPDF');
    Route::post('CV/adSearch', 'CVController@adSearch');

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

    //Route::get('CV/create', ['as' => 'getCreateCv', 'uses' => 'CVController@create']);

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
    Route::post('CV/changeStatus','CVController@changeStatus');
    Route::get('Record/index/{type}', 'RecordController@index');
    Route::get('User/{User}/changePass', 'UsersController@changePassword');

    Route::resource('positions', 'PositionsController');
    Route::resource('groups', 'GroupsController');
    Route::post('/groups/getUsername', [
        'as' => 'groups.getUsername',
        'uses' => 'GroupsController@getUsername',
    ]);
    Route::post('/groups/updateListMember', [
        'as' => 'groups.updateListMember',
        'uses' => 'GroupsController@updateListMember',
    ]);

    //admin only
    Route::get('User/search', 'UsersController@search');

    Route::resource('User', 'UsersController', ['except' => ['create']]);
    Route::resource('Bookmark', 'BookmarkController', ['except' => ['store', 'destroy', 'create', 'edit']]);
    Route::resource('Record', 'RecordController');
    Route::resource('Skill', 'SkillController');

    //add user - delete
    Route::group(['prefix' => 'user'], function () {
        Route::get('/add', ['as' => 'getadduser', 'uses' => 'UsersController@getAddUser']);
        Route::post('/add', ['as' => 'postadduser', 'uses' => 'UsersController@postAddUser']);
        Route::get('/{listid}/del', ['as' => 'getdeluser', 'uses' => 'UsersController@getDel']);
    });
});
Route::group(['middleware' => ['auth', 'App\Http\Middleware\ApplicantMiddleware']], function () {
    Route::resource('CV', 'CVController', ['except' => ['index', 'destroy', 'show']]);
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@myLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::post('emails/getEmailAddress', [
    'as' => 'emails.getEmailAddress',
    'uses' => 'EmailsController@getEmailAddress',
]);
Route::get('emails/create', [
    'as' => 'emails.create',
    'uses' => 'EmailsController@create',
]);
Route::post('emails/send', [
    'as' => 'emails.send',
    'uses' => 'EmailsController@send',
]);
Route::post('emails/createFormEmail', [
    'as' => 'emails.createFormEmail',
    'uses' => 'EmailsController@createFormEmail',
]);
Route::post('emails/sendEmail1', [
    'as' => 'emails.sendEmail1',
    'uses' => 'EmailsController@sendEmail1',
]);

