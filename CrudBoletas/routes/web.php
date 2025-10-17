<?php

use Illuminate\Support\Facades\Route;


/** 
 * Asi es como se ve el archivo web.php antes de los cambios.
*Route::get('/', function () {
*    return view('welcome');
*});
*/

Route::get('/', function () {
    return redirect()->route('boletas.index');
});

use App\Http\Controllers\BoletaController;

//Importa el controlador BoletaController para manejar las rutas relacionadas con las boletas.
Route::resource('boletas', BoletaController::class);