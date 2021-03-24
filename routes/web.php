<?php

use App\Gratitude;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Reminder;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('bug', 'BugController');
    Route::resource('reminder', 'ReminderController');
    Route::resource('gratitude', 'GratitudeController');
    Route::resource('account', 'AccountController');
    Route::get('/reminders', function () {
        $reminders = Reminder::where('user_id', Auth::user()->id)->get();
        return view('reminder.all', compact('reminders'));
    });

    Route::get('/about', function () {
        return view('single_pages.about');
    });

    Route::get('/faq', function () {
        return view('single_pages.faq');
    });


    Route::get('/privacy', function () {
        return view('single_pages.privacy');
    });

    Route::get('/grab_gratitude', function () {
        $list_today = Gratitude::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
        return response()->json(['list_today' => $list_today], 200);
    });

});



