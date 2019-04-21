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
// use App\Mail\sendEmailMailable;
// use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});
//'middleware' => 'CheckLogIn'
Route::group(['prefix' => 'logins'], function () {
    Route::get('/','LoginController@getLogin')->name('logins');
    Route::post('/','LoginController@postLogin');
    Route::get('logout', 'LoginController@getLogout');
});
//,'middleware' => 'CheckLogOut'
Route::group(['prefix' => 'admin','middleware' => 'CheckLogOut'], function () {
    Route::group(['prefix' => 'cate'], function () {
        Route::get('add','CateController@getAdd')->name('add_cate');
        Route::post('add','CateController@postAdd');
        Route::get('list','CateController@getList')->name('list_cate');
        Route::get('edit/{id}','CateController@getEdit')->name('edit_cate');
        Route::post('edit/{id}','CateController@postEdit');
        Route::get('delete/{id}','CateController@getDelete')->name('delete_cate');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('add','ProductController@getAdd')->name('add_product');
        Route::post('add','ProductController@postAdd');
        Route::get('list','ProductController@getList')->name('list_product');
        Route::get('delete/{id}','ProductController@getDelete')->name('delete_product');
        Route::get('edit/{id}','ProductController@getEdit')->name('edit_product');
        Route::post('edit/{id}','ProductController@postEdit');
        Route::post('delete-img/{id}','ProductController@getDeleImage');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('add','UsersController@getAdd')->name('add_user');
        Route::post('add','UsersController@postAdd');
        Route::get('list','UsersController@getList')->name('list_user');
        Route::get('delete/{id}','UsersController@getDelete')->name('delete_user');
        Route::get('edit/{id}','UsersController@getEdit')->name('edit_user');
        Route::post('edit/{id}','UsersController@postEdit');
    });
});

Route::group(['prefix' => 'frontend'], function () {
    Route::get('/','FrontendHomeController@getHome')->name('home');
    Route::get('loai-san-pham/{id}/{alias}.html', 'FrontendHomeController@getLoaiSanPham')->name('loaisanpham');
    Route::get('detail/{id}/{alias}.html','FrontendHomeController@getDetail')->name('getdetail');
});

Auth::routes();


Route::get('sendEmail','sendMailController@getSendMail');

Route::get('sendEmailJob','sendMailController@getSendEmailJob');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('image/index', 'ImageController@index');
Route::post('image/upload', 'ImageController@upload');

Route::get('insert-data','InsertUserController@insertData');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('image-event','ImageEvent@getImageEvent');
Route::post('image-event','ImageEvent@postImageEvent');

Route::get('image-job','ImageEvent@getImageJob');
Route::post('image-job','ImageEvent@postImageJob');


Route::get('try-catch/{id}','tryCatchController@getTryCatch');

Route::get('try-catch-user/{id}','tryCatchController@getTryCatchUser');
Route::get('exception/read','tryCatchController@customException');


Route::get('/users/search', 'UserControllerTryCatch@index')->name('users.index');
Route::post('/users/search', 'UserControllerTryCatch@search')->name('users.search');

Route::get('/users/{id}','UserControllerTryCatch@show');

Route::get('validator','ValidatorController@getValidator');
Route::post('validator','ValidatorController@postValidator');

Route::get('validator-controller','ValidatorController@getValidatorController');
Route::post('validator-controller','ValidatorController@postValidatorController');

Route::get('validator-model','ValidatorController@getValidatorModel');
Route::post('validator-model','ValidatorController@postValidatorModel');


Route::get('custom-validator','CustomValidateController@getCustom');
Route::post('custom-validator','CustomValidateController@postCustom');

Route::get("custom-validator-form","CustomValidateController@index");
Route::post("custom-validator-form","CustomValidateController@store");


Route::get('validate-model-image-event','CustomValidateController@validateModelImageEvent');


