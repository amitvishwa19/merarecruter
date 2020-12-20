
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Route::get('/',function(){
//    return 'Home Page';
// });

Route::prefix('/')->group(base_path('routes/client.php'));



//Email verification
Route::get('/verifyemail/{email}/{token}','Auth\RegisterController@verifyemail')->name('auth.verifyemail');


//Default theme Route file
//Route::prefix('/')->group(base_path('routes/default.php'));

//Paytm callback action
//Route::post('/payment/paytm/status', 'Admin\PaytmWalletController@paymentCallback')->name('payment.paytm.status');

//Auto Deploy from github push
Route::post('/deploy/github-notify', 'Admin\GithubDeployController@notify')->name('git.notify');
Route::post('/deploy/github-pull', 'Admin\GithubDeployController@deploy')->name('git.deploy');

//Test Routes
Route::prefix('/test')->group(base_path('routes/test.php'));

//Auth Route
Auth::routes();



//Admin route
Route::prefix('/appadmin')->middleware(['auth'])->group(base_path('routes/admin.php'));


