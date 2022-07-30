<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AplicationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('/user')->group(function(){
    //Route login
    Route::post('/login', [LoginController::class,'login']);
    
    Route::middleware('auth:api')->get('/user', [LoginController::class, 'user']);
    //Route Logout
    Route::middleware('auth:api')->post('/logout', [LoginController::class, 'logout']);
    //Route para register users
    Route::post('/register', [RegisterController::class, 'register']);
    //forgot and reset password
    Route::post('/forgot-password', [ForgotPasswordController::class,  'forgotPassword'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
    
    Route::apiResource('users', UserController::class);
    Route::apiResource('aplications', AplicationController::class);

    Route::apiResource('userHasModule', UserHasModuleController::class);
    Route::get('userHasModule/modules/{id}', [UserHasModuleController::class, 'getUsuarios']);
});