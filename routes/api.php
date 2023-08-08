<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
use App\Http\Controllers\apiauthcontroller;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Inside this we put all the api which can be secured and only access with the help of token
Route::middleware('auth:sanctum')->group(function(){

 //Get all data
Route::get('/show',[apicontroller::class,'show']);
//Get Single data
Route::get('/showsingle/{id?}',[apicontroller::class,'showsingle']);
//Post data inside database
Route::post('/send',[apicontroller::class,'send']);
//Delete Data from database
Route::delete('/delete/{id?}',[apicontroller::class,'delete']);
//Update Data from database
Route::put('/update/{id?}',[apicontroller::class,'update']);
//Search name from database
Route::get('/search/{id?}',[apicontroller::class,'search']);

//logout Route
Route::post('/logout',[apiauthcontroller::class,'logout']);

});


//Signup for api authentication with the help of sanctum
Route::post('/signup',[apiauthcontroller::class,'signup']);
//Login for api authentication with the help of sanctum
Route::post('/login',[apiauthcontroller::class,'login']);
