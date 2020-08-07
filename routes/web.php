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

Route::get('/', function () {
    return view('welcome');
});

// ------------------------------------------------------------------------------------------------------------
// Anime view

Route::get('/animes', 'AnimesController@AnimesStore')->name('AnimesStore');

Route::get('/animes/{id}', 'AnimesController@Details')->name('AnimesDetails');

Route::post('/animes/comment', 'AnimesController@AddComment')->name('AnimesComments');

// Anime view (Admin)

Route::get('/admin/animes', 'AnimesController@Index');

Route::get('/admin/animes/create', "AnimesController@Create");

Route::post('/admin/animes/create', "AnimesController@Store");

Route::get('/admin/animes/delete/{id}', "AnimesController@Delete");

Route::get('/admin/animes/edit/{id}', "AnimesController@Edit");

Route::get('/admin/animes/{id}', "AnimesController@Show");

Route::post('/admin/animes/edit', "AnimesController@Update");

Route::delete('/admin/animes/delete', "AnimesController@Remove");

// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------

// Mangas view

Route::get('/mangas', 'MangasController@MangasStore')->name('MangasStore');

Route::get('/mangas/{id}', 'MangasController@Details')->name('MangasDetails');

Route::post('/mangas/comment', 'MangasController@AddComment')->name('MangasComments');

// Mangas view (Admin)

Route::get('/admin/mangas', 'MangasController@Index');

Route::get('/admin/mangas/create', "MangasController@Create");

Route::post('/admin/mangas/create', "MangasController@Store");

Route::get('/admin/mangas/delete/{id}', "MangasController@Delete");

Route::get('/admin/mangas/edit/{id}', "MangasController@Edit");

Route::get('/admin/mangas/{id}', "MangasController@Show");

Route::post('/admin/mangas/edit', "MangasController@Update");

Route::delete('/admin/mangas/delete', "MangasController@Remove");

// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------

// DragonBalls view

Route::get('/dragonballs', 'DragonBallsController@DragonBallsStore')->name('DragonBallsStore');

Route::get('/dragonballs/{id}', 'DragonBallsController@Details')->name('DraonBallsDetails');

Route::post('/dragonballs/comment', 'DragonBallsController@AddComment')->name('DragonBallsComments');

// DragonBalls view (Admin)

Route::get('/admin/dragonballs', 'DragonBallsController@Index');

Route::get('/admin/dragonballs/create', "DragonBallsController@Create");

Route::post('/admin/dragonballs/create', "DragonBallsController@Store");

Route::get('/admin/dragonballs/delete/{id}', "DragonBallsController@Delete");

Route::get('/admin/dragonballs/edit/{id}', "DragonBallsController@Edit");

Route::get('/admin/dragonballs/{id}', "DragonBallsController@Show");

Route::post('/admin/dragonballs/edit', "DragonBallsController@Update");

Route::delete('/admin/dragonballs/delete', "DragonBallsController@Remove");

// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------

// Movies view

Route::get('/movies', 'MoviesController@MoviesStore')->name('MoviesStore');

Route::get('/movies/{id}', 'MoviesController@Details')->name('MoviesDetails');

Route::post('/movies/comment', 'MoviesController@AddComment')->name('MoviesComments');

// Movies view (Admin)

Route::get('/admin/movies', 'MoviesController@Index');

Route::get('/admin/movies/create', "MoviesController@Create");

Route::post('/admin/movies/create', "MoviesController@Store");

Route::get('/admin/movies/delete/{id}', "MoviesController@Delete");

Route::get('/admin/movies/edit/{id}', "MoviesController@Edit");

Route::get('/admin/movies/{id}', "MoviesController@Show");

Route::post('/admin/movies/edit', "MoviesController@Update");

Route::delete('/admin/movies/delete', "MoviesController@Remove");

// ------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------

// Apps view

Route::get('/apps', 'AppsController@AppsStore')->name('AppsStore');

Route::get('/apps/{id}', 'AppsController@Details')->name('AppsDetails');

Route::post('/apps/comment', 'AppsController@AddComment')->name('AppsComments');

// Apps view (Admin)

Route::get('/admin/apps', 'AppsController@Index');

Route::get('/admin/apps/create', "AppsController@Create");

Route::post('/admin/apps/create', "AppsController@Store");

Route::get('/admin/apps/delete/{id}', "AppsController@Delete");

Route::get('/admin/apps/edit/{id}', "AppsController@Edit");

Route::get('/admin/apps/{id}', "AppsController@Show");

Route::post('/admin/apps/edit', "AppsController@Update");

Route::delete('/admin/apps/delete', "AppsController@Remove");



Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

