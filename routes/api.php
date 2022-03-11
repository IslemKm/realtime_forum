<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;




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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/register_user', function(){
    $user = User::create([
        'name'=>'islam',
        'email'=>'krim.islam96@gmail.com',
        'password'=>Hash::make('AdexAdex'),
    ]);
    return $user;
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('question','QuestionController');
Route::apiResource('category','CategoryController');
Route::apiResource('{question}/reply','ReplyController');
Route::post('like/{reply}','LikeController@LikeIt');
Route::delete('like/{reply}','LikeController@unLikeIt');
