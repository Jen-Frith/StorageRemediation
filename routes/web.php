<?php

use Illuminate\Support\Facades\Route;
use App\Carousel;
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
    $carousels=Carousel::all();
    return view('carousel/index', compact('carousels'));});


Route::get('/indexo', function(){
    return view('addEmployee');
})->name('user.indexo');

Route::resource('/carousel', 'CarouselController');

Route::get('/mail', 'ContactController@store')->name('contact.store');
// Route::resource('/utilisateur', 'UtilisateurController');


Route::get('test', function () {

    $user = [
        'name' => 'Brahiam',
        'info' => 'Laravel Developer'
    ];

    \Mail::to('rua.brahiam@gmail.com')->send(new \App\Mail\NewMail($user));

    dd("success");

})->name('mailito');