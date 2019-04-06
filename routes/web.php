<?php
use Illuminate\Support\Facades\Auth;
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
    if (Auth::user()) {
        return App::call('App\Http\Controllers\MemeController@mashup');
    }
    return view('welcome');
});

Route::get('/signup', function() {
    return view('signup');
});

Route::middleware('auth')->get('/post', function() {
    return view('post');
})->name('post');

Route::get('/leaderboard', 'MemeController@leaderboard')->name('leaderboard');

Route::middleware('auth')->get('/mash', 'MemeController@mashup')->name('mash');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
