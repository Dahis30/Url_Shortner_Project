<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortlinkController_show;
use App\Http\Controllers\ShortlinksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/',[ShortlinkController::class,'index'] );
// Route::post('/generate-shorten-link',[ShortlinkController::class,'store'] )->name('generate.short.link');

 
Route::resource('Shortlink', ShortlinksController::class);
Route::get('/',[ShortlinksController::class,'index'] );
Route::get('/{code}',[ShortlinkController_show::class,'show'])->name('show.shorten.link');
 Route::delete('/delete/{c}',[ShortlinkController_show::class,'destroy'])->name('delete.shorten.link');