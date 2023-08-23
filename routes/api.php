<?php
namespace App\Http\Controllers;

use App\Models\Consultations;
use App\Models\expereince;
use App\Models\experttime;
use App\Models\favorite;
use App\Models\phone;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trait_response;
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
    Route::post('/register',[auth::class,'register']); // الطلب الاجباري الأول
    Route::post('/login'   ,[auth::class,'login']);  //الطلب الاجباري الثاني




      Route::group(['middleware' => ['auth:sanctum']], function() {

        Route::post('create/expert',   [ExpereinceController::class, 'create']); // الطلب الثالث الإجباري
        Route::get('consultations/type',   [ConsultationsController::class, 'see_consultations']);//الطلب الرابع الاجباري _1
        Route::get('getexpertsforspecifectype/{spec}',   [ExpereinceController::class, 'indexbyconsultation']);//لطلب الرابع الاجباري _2
        Route::get('getkind/{name}',   [ConsultationsController::class, 'search_about_consultations']);//الطلب الاول الاساسي 1
        Route::post('getexpert/{name}',   [ExpereinceController::class, 'search']);

        Route::post('logout',   [auth::class, 'logout']);

        Route::post('create_wallet',   [WalletController::class, 'create_wallet']);

        Route::post('create_phone',   [PhoneController::class, 'create_phone']);

        Route::post('expert',   [ExpereinceController::class, 'expert']);



        Route::post('consultations',   [ConsultationsController::class, 'makeConsultation']);
        
        Route::post('pay',   [ConsultationsController::class, 'pay']);
        Route::post('addtowalletvalue',   [WalletController::class, 'addvalue']);





        Route::get('getallall',   [PersonController::class, 'all']);
        Route::get('getinformationsforexpert/{id}',   [ExpereinceController::class, 'getinformations']);

        Route::post('makereserve',   [ReserveController::class, 'makereserve']);


        Route::get('showreserveofexpert',   [ReserveController::class, 'show']);
        Route::get('showreserveofuser',   [PersonController::class, 'show']);
        Route::post('message',   [ConversitionController::class, 'create']);
        Route::get('show messages',   [ConversitionController::class, 'show']);

        Route::post('addtofavoirite',   [FavoriteController::class, 'add']);
        Route::get('getmyfavoutite',   [FavoriteController::class, 'show']);

        Route::post('adddatetoexpert',   [ExperttimeController::class, 'add']);
        Route::get('showdatetoexpert/{id}',   [ExperttimeController::class, 'showdates']);

    });


//Route::get('indexconst',   [PersonController::class, 'indexconst']); // بحث عن تصنيف
        //Route::post('serachexpert/{name}',   [PersonController::class, 'serachexpert']); // بحث عن خبير
