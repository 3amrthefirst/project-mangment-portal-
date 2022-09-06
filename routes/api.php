<?php

use App\Http\Controllers\CharterController;
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



//register route
Route::post('register', 'AuthController@register');
// login route
Route::post('login', [\App\Http\Controllers\User\AuthController::class, 'login']);





//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/register_user', 'Auth\AuthApiController@regester');
//Route::post('/login', 'Auth\AuthApiController@login');

Route::post('/login', [\App\Http\Controllers\User\AuthController::class, 'login']);

Route::group([
    'namespace' => 'User'
], function () {
   Route::group([
       'prefix' => 'users'
   ], function() {
       Route::post("/", [\App\Http\Controllers\User\UserController::class, 'create']);
       Route::put("/{id}", [\App\Http\Controllers\User\UserController::class, 'update']);
       Route::delete("/{id}", [\App\Http\Controllers\User\UserController::class, 'delete']);
       Route::get("/", [\App\Http\Controllers\User\UserController::class, 'index']);
       Route::get("/{id}", [\App\Http\Controllers\User\UserController::class, 'get']);
   });
});


Route::group(["middleware" => "auth:api"], function () {
    Route::get('/logout', 'Auth\AuthApiController@logout');
});


Route::group(['namespace' => 'WelcomeCall'], function () {
    Route::post('/StoreWelcomeCall', [\App\Http\Controllers\WelcomeCall\WelcomeCallController::class, 'store']);
    Route::get('/GetAllWelcomeCalls', 'WelcomeCallController@index');
    Route::get('/GetPaginWelcomeCalls', 'WelcomeCallController@index_pag');
    Route::get('/GetAllWelcomeCallsByStatus/{status}', 'WelcomeCallController@getAllWelcomeCallsByStatus');
    Route::get('/GetWelcomeCall/{id}', 'WelcomeCallController@show');
    Route::get('/GetWelcomeCallEdit/{id}', 'WelcomeCallController@edit');
    Route::patch('/UpdateWelcomeCall/{id}', 'WelcomeCallController@update');
    Route::patch('/UpdateStatusWelcomeCall/{id}', 'WelcomeCallController@update_status');
    Route::delete('/DeleteWelcomeCall/{id}', 'WelcomeCallController@destroy');
    Route::delete('/ForceDeleteWelcomeCallFromArchive/{id}', 'WelcomeCallController@destroy_force_form_archive');
    Route::delete('/ForceDeleteWelcomeCall/{id}', 'WelcomeCallController@destroy_force');
    Route::get('/RestoreWelcomeCall/{id}', 'WelcomeCallController@restore_welcome_call');
    Route::get('/SearchWelcomeCallByDate/{dataFrom}/{dateTo}', 'WelcomeCallController@searchWelcomeCallByDate');

});

Route::post('/send-welcome-mail', [\App\Http\Controllers\WelcomeCall\WelcomeCallController::class, 'sendWelcomeEmail']);

Route::group([
    'prefix' => 'states'
], function () {
    Route::get('/', [\App\Http\Controllers\Api\StateController::class, 'index']);
});

Route::group([
    'prefix' => 'tickets'
], function () {
    Route::get('/', [\App\Http\Controllers\PMProcess\TicketController::class, 'index']);
    Route::post('/', [\App\Http\Controllers\PMProcess\TicketController::class, 'store']);
    Route::post('/assign-pm', [\App\Http\Controllers\PMProcess\TicketController::class, 'assignUser']);
    Route::get('counts', [\App\Http\Controllers\PMProcess\TicketController::class, 'ticketCounts']);
    Route::get('/{id}', [\App\Http\Controllers\PMProcess\TicketController::class, 'show']);

    Route::group([
       'prefix' => 'pm-statuses'
    ], function() {
        Route::get('/{ticket_id}', [\App\Http\Controllers\PMProcess\PMStatusController::class, 'show']);
        Route::post('/create-issue', [\App\Http\Controllers\PMProcess\PMStatusController::class, 'createIssue']);
        Route::put('/{id}', [\App\Http\Controllers\PMProcess\PMStatusController::class, 'update']);
        Route::delete('/{id}', [\App\Http\Controllers\PMProcess\PMStatusController::class, 'destroy']);
    });
});


// business license
    Route::group(['prefix' => 'businessLicense','namespace' => '\App\Http\Controllers'], function () {
        Route::get('/GetAllBusinessLicense', 'BusinessLicenceController@index');
        Route::post('/StoreBusinessLicense', 'BusinessLicenceController@store');
        Route::get('/GetBusinessLicense/{id}', 'BusinessLicenceController@show');
        Route::post('/UpdateBusinessLicense/{id}', 'BusinessLicenceController@update');
        Route::delete('/DeleteBusinessLicense/{id}', 'BusinessLicenceController@destroy');
    });

    // meter spot routes

Route::group(['prefix' => 'MeterSpot','namespace' => '\App\Http\Controllers'], function () {
    Route::get('/GetAllMeterSpot', 'MeterSpotController@index');
    Route::post('/StoreMeterSpot', 'MeterSpotController@store');
    Route::get('/GetMeterSpot/{id}', 'MeterSpotController@show');
    Route::post('/UpdateMeterSpot/{id}', 'MeterSpotController@update');
    Route::delete('/DeleteMeterSpot/{id}', 'MeterSpotController@destroy');
});


Route::group(['prefix' => 'charter'], function () {
    Route::get('/',                     [CharterController::class, 'index']);
    Route::get('/{id}',                 [CharterController::class, 'show']);
    Route::post('/create',              [CharterController::class, 'create']);
    Route::post('/update/{id}',         [CharterController::class, 'update']);
    Route::get('/destroy/{id}',         [CharterController::class, 'destroy']);
    Route::get('/restore/{id}',         [CharterController::class, 'restore']);
    Route::get('/trashed',              [CharterController::class, 'trashed']);
    Route::get('/destroy-forever/{id}', [CharterController::class, 'destroyForever']);
    Route::post('/search',              [CharterController::class, 'search']);
});

