<?php

use Illuminate\Http\Request;
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
Route::any('/board', function(Request $request){
    return view('board',['code' => $request->invite_code]);
    //return dd($request);
})->name('board')->middleware('protected_by_invite_codes');

Route::get('/papel', function(){
    return view('papel');
})->name('papel');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::middleware(['auth'])->group(function() {
        Route::resource('/invitation', '\App\Http\Controllers\InviteController')->only(['index', 'create', 'store']);
    });
