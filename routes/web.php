<?php

use Illuminate\Support\Facades\Route;

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
/** @var \Laravel\Lumen\Routing\Router $router */
Route::get('/', function () { return view('welcome'); });

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('/studio', 'HomeController@index')->name('home');

$router->group(['prefix'=>'/studio', 'middleware'=> 'auth', 'admin'], function () use ($router){
    $router->group(['prefix'=>'/user'], function () use ($router){

        // $router->get('', 'UserController@index')->name('user.index');

        $router->get('/create','UserController@create')->name('user.formRegister');
        $router->post('/create','Auth\RegisterController@store')->name('user.register');

        /*$router->get('/{id}', 'UserController@show')->name('user.show');
        $router->get('/{id}', 'UserController@edite')->name('user.edit');
        $router->put('/{id}', 'UserController@update')->name('user.update');
        $router->delete('/{id}', 'UserController@destroy')->name('user.destroy');*/

    });

    $router->resource('user', 'UserController')->except(['store', 'create']);


    /*$router->group(['prefix'=>'/album'], function () use ($router){
       /* $router->resouce('/album', '');
        $router->get('', 'AlbumController@index')->name('index_album');
        $router->post('', 'AlbumConttroller@store')->name('store_album');
        $router->get('/{id}', 'AlbumController@show')->name('show_album');
        $router->put('/{id}', 'AlbumController@update')->name('update_album');
        $router->delete('/{d}', 'AlbumController@destroy')->name('delete_album');
        $router->get('/{id}/photos', 'PhotoController@photosPorAlbum')->name('photosPorAlbum');

    });*/
    /*$router->group(['prefix' => '/photo'], function () use ($router){
        $router->resource('', 'PhotoController');
    });*/
});
