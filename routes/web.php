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

Route::get('/time', function () {
    return date("Y-m-d H:i:s");
});

Auth::routes();

Route::get('/phpinfo', 'HomeController@phpinfo');

Route::get('/user', 'UserController@user');

/*Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
});*/

Route::get('/request', 'RequestController@index');

Route::get('/request/test', 'RequestController@test');
Route::post('/request/test', 'RequestController@test');

Route::get('/phone/code', 'ApiController@sendVerifyCode');

Route::get('/job/demo', function() {
    dispatch(new \App\Jobs\Demo());
});

Route::get('/send', 'DefaultController@index');
//Route::post('/phone/code', 'ApiController@sendVerifyCode');

/*Route::get('testCsrf',function(){
    $csrf_field = csrf_field();
    $html = <<<GET
        <form method="POST" action="/testCsrf">
            {$csrf_field}
            <input type="submit" value="Test"/>
        </form>
GET;
    return $html;
});

Route::post('testCsrf',function(){
    return 'Success!';
});*/