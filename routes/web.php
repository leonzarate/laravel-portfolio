<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

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


Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

//Route::apiResource('portfolio', App\Http\Controllers\PortfolioController::class,['index']);
/*
Route::get('/portfolio', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/portfolio/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::get('/portfolio/{project}/editar', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portfolio/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::post('/portfolio', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::get('/portfolio/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
Route::delete('/portfolio/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');
*/

/*
* El Route:resource de abajo, en una sola linea, llama a todos los request HTTP de arriba.
* Es mas limpio. Crea todos los metodos HTTP: index, create, store, update, show, destroy, edit
*/
Route::resource('portfolio', 'App\Http\Controllers\ProjectController')
    ->parameters(['portfolio' => 'project']) //esto es porque en el ProjectController el parametro se llama $project
    ->names('projects');
    //->middleware('auth'); //esta es una forma de llamar al middleware AUTH para proteger el acceso a todo
                          //lo relacionado con pedido de login.
                          //Otro camino es a través del __constructor().
                          //la desventaja de ésta opcion, acá, es que al ser un resource, bloquea todas 
                          //las rutas del resource sin permitir, por ej, listar los proyectos.

Route::post('contact', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');

/* Route::get('/', function () {
    $nombre = "Mauricio";

    return view('home')->with('nombre', $nombre);
})->name('home'); */

/* Route::get('saludo/{nombre?}', function ($nombre = "Invitado") {
    return "Hola, ". $nombre;
});

Route::get('contactame', function () {
    return "seccion de contactos";
})->name('contactos');

Route::get('/', function() {
    echo "<a href='" . route('contactos') . "'>Contactos 1</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 2</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 3</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 4</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 5</a><br>";
}); */

//Auth::routes(['register'=>false]);//register => false, deshabilito la ruta de register'logout');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Auth::routes();

/*
Auth::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Auth::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
*/