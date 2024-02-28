<?php

use App\Http\Livewire\RTL;
use GuzzleHttp\Middleware;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\VirtualReality;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PengurusanDokumen;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Kupli\KupliDashboard;
use App\Http\Livewire\Kupli\Penguguman;
use App\Http\Livewire\Kupli\PengugumanCreate;
use App\Http\Livewire\Kupli\PengugumanEdit;
use App\Http\Livewire\Kupli\PengurusanDokumen as KupliPengurusanDokumen;
use App\Http\Livewire\Kupli\PenyuntinganDokumen as KupliPenyuntinganDokumen;
use App\Http\Livewire\Kupli\PenyuntinganDokumenTambah;
use App\Http\Livewire\Kupli\SenaraiPelajar;
use App\Http\Livewire\Kupli\SuntingPelajar;
use App\Http\Livewire\Kupli\TambahPelajar;
use App\Http\Livewire\Kupli\UserProfile as KupliUserProfile;
use App\Http\Livewire\PenyuntinganDokumen;
use App\Http\Livewire\OJTStream\UserProfile;
use App\Http\Livewire\OJTStream\UserManagement;
use App\Http\Livewire\Pelajar\Dashboard as PelajarDashboard;
use App\Http\Livewire\Pelajar\LawatanPPO;
use App\Http\Livewire\Pelajar\Notifikasi;

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

Route::get('/', function(){
    return redirect()->route('login');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

Route::group(['middleware' => 'auth'], function () {
    // LOGINNED USER ONLY
Route::get('dashboard2', Dashboard::class)->name('dashboard');
Route::get('billing', Billing::class)->name('billing');
Route::get('profile', Profile::class)->name('profile');
Route::get('tables', Tables::class)->name('tables');
Route::get('notifications', Notifications::class)->name("notifications");
Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
Route::get('rtl', RTL::class)->name('rtl');

// 
// PELAJAR ROUTES BEGIN
// 
Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('notifikasi', Notifikasi::class)->name('pelajar notifikasi');
Route::get('dashboard', PelajarDashboard::class)->name('pelajar dashboard');

// LAWATAN PPO(UNUSED)
Route::get('lawatan-ppo', LawatanPPO::class)->name('lawatan ppo');

// PENGURUSAN DOKUMEN
Route::get('pengurusan-dokumen', PengurusanDokumen::class)->name('pelajar pengurusan dokumen');
Route::get('pengurusan-dokumen/{dokumenOJTPelajar:id}/sunting', PenyuntinganDokumen::class)->name('pelajar penyuntingan dokumen');
// PELAJAR ROUTES ENDS

// 
// KUPLI ROUTE BEGIN
// 
Route::get('kupli/user-profile', KupliUserProfile::class)->name('kupli profil');
Route::get('kupli/dashboard', KupliDashboard::class)->name('kupli dashboard');

// PENGUGUMAN
Route::get('kupli/penguguman', Penguguman::class)->name('kupli penguguman');
Route::get('kupli/penguguman/tambah', PengugumanCreate::class)->name('kupli penguguman tambah');
Route::get('kupli/penguguman/{penguguman:id}/sunting', PengugumanEdit::class)->name('kupli penguguman sunting');

// PENGURUSAN DOKUMEN
Route::get('kupli/pengurusan-dokumen', KupliPengurusanDokumen::class)->name('kupli pengurusan dokumen');
Route::get('kupli/pengurusan-dokumen/tambah', PenyuntinganDokumenTambah::class)->name('kupli penyuntingan dokumen tambah');
Route::get('kupli/pengurusan-dokumen/{dokumen_ojt:id}/sunting', KupliPenyuntinganDokumen::class)->name('kupli penyuntingan dokumen');

// PENGURUSAN PELAJAR
Route::get('kupli/pelajar/senarai', SenaraiPelajar::class)->name('kupli senarai pelajar');
Route::get('kupli/pelajar/tambah', TambahPelajar::class)->name('kupli tambah pelajar');
Route::get('kupli/pelajar/{pelajar:user_id}/sunting', SuntingPelajar::class)->name('kupli sunting pelajar');
// KUPLI ROUTE ENDS
});