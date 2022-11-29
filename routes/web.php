<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

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
    return redirect('user_management');
});

Route::get('/user_management',[UserManagementController::class,'index']);
Route::get('/add_user',[UserManagementController::class,'add_user'])->name('add_user');
Route::post('/save_user_info',[UserManagementController::class,'save_user_info'])->name('save_user_info');
Route::get('/delete_entry{id}',[UserManagementController::class,'delete_entry'])->name('delete_entry');
Route::get('/edit_user_entry/{id}',[UserManagementController::class,'edit_user_entry'])->name('edit_user_entry');
Route::post('/update_user_info/{id}',[UserManagementController::class,'update_user_info'])->name('update_user_info');
Route::get('back',function(){
    return redirect('/user_management');
})->name('back');

