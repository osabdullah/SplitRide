<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RideController;
use App\Http\Controllers\chatController;
use App\Http\Controllers\ForgotPasswordController;

use App\Models\Ride;

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
Route::get('/',[RideController::class, 'indexPage'] );
Route::get('/login',[RideController::class, 'loginPage'] );
Route::get('/register',[RideController::class, 'registerPage'] );



Route::get('/dashboard', function () {
    return view('welcome');
});
//Auth::routes();
Route::post('login', [RideController::class, 'postAdminLogin']);
Route::post('/register',[RideController::class, 'postUserRegistration'] );
// -----------------------------   Rides Crud --------------------------------
Route::get('/addRide', [RideController::class, 'addRideview']);
Route::get('/editRide/{id}', [RideController::class, 'editRideView']);
Route::get('/showAllRides', [RideController::class, 'showAllRides']);
Route::post('/addRide', [RideController::class, 'addNewRide']);
Route::get('/delRide/{id}', [RideController::class, 'deleteRide']);
Route::post('/editRide', [RideController::class, 'updateRide']);
Route::post('/bookRideWithUser/{ride_id}/{sender_id}',[RideController::class, 'bookNewRide'] );
Route::get('/showAllRidesAndSearch', [RideController::class, 'showAllRidesAndSearch']);
Route::post('/searchRide', [RideController::class, 'searchRide']);
Route::get('/showAllRidesOfLoggedInUser', [RideController::class, 'showAllRidesOfLoggedInUser']);
Route::get('/editLoggedInUserRides/{id}', [RideController::class, 'editRideViewOfLoggedIn']);
Route::post('/editLoggedInRide', [RideController::class, 'updateLoggedInRide']);
//Chat crud
Route::post('/startChat', [chatController::class, 'addMessage']);
Route::post('/startGroupChat', [chatController::class, 'addGroupMessage']);
Route::get('/addChat', [chatController::class, 'getAllChatsOfLoggedInUser']);
Route::get('/addGroupChat', [chatController::class, 'getGroupChatView']);
Route::get('/getChatWithReceiverId/{id}', [chatController::class, 'getChatWithId']);
Route::get('/chatWithNewUser/{rideId}/{userId}', [chatController::class, 'chatWithANewUserAndExistingUser']);
Route::get('/groupChatWithNewUser/{rideId}/{userId}', [chatController::class, 'groupChatWithANewUserAndExistingUser']);

///getChatWithReceiverId/
//
Route::get('/allNotifications', [chatController::class, 'getAllNotifications']);
Route::get('/delNotifications/{id}', [chatController::class, 'deleteNotification']);
Route::get('employee_dashboard', [RideController::class, 'employee_dashboard']);


Route::post('/logout', [RideController::class, 'logout'])->name('logout');

//Login with google
//
Route::get('/redirect', [RideController::class, 'LoginWithGoogle']);
Route::get('/callback', [RideController::class, 'callback']);


Route::get('/allUsers',[RideController::class,'getAllUsers']);
Route::post('/editNotificationStatus/{id}',[RideController::class,'updateNotificationStatus']);
Route::post('/editNotificationStatusSingleUser/{id}',[RideController::class,'updateNotificationStatusSingleUser']);
Route::get('/delUser/{id}', [RideController::class, 'deleteUser']);


//profile crud
Route::get('/showProfile', [chatController::class, 'showProfile']);
Route::post('/addProfile', [chatController::class, 'addProfile']);
Route::post('/editProfile', [chatController::class, 'editProfile']);
Route::get('/editUser/{id}',[chatController::class, 'editUser'] );
Route::post('/editUser',[chatController::class, 'updateUser'] );

//Notification
Route::post('/changeNotificationStatus/{id}',[RideController::class, 'updateNotificationStatusOnAdminPanel'] );


//Map
Route::get('/showMap', [chatController::class, 'showMap']);
Route::get('/verify_email/{id}', [RideController::class, 'updateUserVerifiedStatus']);


// Password forget and Reset
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
