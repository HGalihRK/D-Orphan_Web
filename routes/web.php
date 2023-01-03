<?php

use App\Http\Controllers\TransactionController;
use App\Http\Livewire\CompetitionManageAdmin;
use App\Http\Livewire\CompetitionRecommendation;
use App\Http\Livewire\CourseBooking;
use App\Http\Livewire\CourseManage;
use App\Http\Livewire\CourseTutor;
use App\Http\Livewire\DetailCompetitionManageAdmin;
use App\Http\Livewire\DetailCompetitionRecommendation;
use App\Http\Livewire\DetailCourse;
use App\Http\Livewire\DetailCourseBooking;
use App\Http\Livewire\DetailUser;
use App\Http\Livewire\DonationDelivery;
use App\Http\Livewire\KelolaPantiAsuhan;
use App\Http\Livewire\SaldoManage;
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
    return view('home');
})->name('/');
Route::get('/donasi', function () {
    return view('list-orphanage');
})->name('donasi');

Route::get('/detail-user/{user_id}', DetailUser::class)->name('detail-user');
Route::get('/kirim-donasi/{user_id}', DonationDelivery::class)->name('kirim-donasi');
Route::get('midtrans/{id}', [TransactionController::class, 'showMidtrans'])->name('midtrans');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dasbor/{nameTab?}', CourseBooking::class)->name('dasbor');
    Route::get('/kursus', function () {
        return view('course');
    })->name('kursus');
    Route::get('/kursus/tutor/{skill_id}', CourseTutor::class)->name('tutor');
    Route::get('/kursus/tutor/detail-kursus/{course_id}/{isFromCourseBooking?}', DetailCourse::class)->name('detail-kursus');
    Route::get('/course-booking/{course_booking_id}', DetailCourseBooking::class)->name('detail-course-booking');
    Route::get('/kelola-kursus', CourseManage::class)->name('kelola-kursus');
    Route::get('/kelola-saldo', SaldoManage::class)->name('kelola-saldo');
    Route::get('/lomba', CompetitionRecommendation::class)->name('lomba');
    Route::get('/lomba/detail-lomba/{competition_recommendation_id}', DetailCompetitionRecommendation::class)->name('detail-competition-recommendation');
    Route::get('/kelola-panti', KelolaPantiAsuhan::class)->name('kelola-panti');

    Route::get('/kursus/tutor/detail-tutor/{course_id}/detail-reservation', function () {
        return view('detail-reservation');
    })->name('detail-reservation');
    Route::get('/kelola-competition-admin', CompetitionManageAdmin::class)->name('kelola-competition-admin');
    Route::get('/kelola-competition-admin/{competition_id}', DetailCompetitionManageAdmin::class)->name('detail-competition-admin');
});
