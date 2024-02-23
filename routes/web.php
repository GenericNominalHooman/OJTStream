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
use App\Http\Livewire\Kupli\PengurusanDokumen as KupliPengurusanDokumen;
use App\Http\Livewire\Kupli\PenyuntinganDokumen as KupliPenyuntinganDokumen;
use App\Http\Livewire\Kupli\PenyuntinganDokumenTambah;
use App\Http\Livewire\Kupli\SenaraiPelajar;
use App\Http\Livewire\PenyuntinganDokumen;
use App\Http\Livewire\OJTStream\UserProfile;
use App\Http\Livewire\OJTStream\UserManagement;
use App\Http\Livewire\Pelajar\LawatanPPO;

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
    return redirect('sign-in');
});

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');



Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::get('user-profile', UserProfile::class)->middleware('auth')->name('user-profile');
Route::get('user-management', UserManagement::class)->middleware('auth')->name('user-management');

Route::group(['middleware' => 'auth'], function () {
    // LOGINNED USER ONLY
Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('billing', Billing::class)->name('billing');
Route::get('profile', Profile::class)->name('profile');
Route::get('tables', Tables::class)->name('tables');
Route::get('notifications', Notifications::class)->name("notifications");
Route::get('virtual-reality', VirtualReality::class)->name('virtual-reality');
Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
Route::get('rtl', RTL::class)->name('rtl');

// PELAJAR ROUTES BEGIN
Route::get('lawatan-ppo', LawatanPPO::class)->name('lawatan ppo');
Route::get('pengurusan-dokumen', PengurusanDokumen::class)->name('pelajar pengurusan dokumen');
Route::get('pengurusan-dokumen/{dokumenOJTPelajar:id}/sunting', PenyuntinganDokumen::class)->name('pelajar penyuntingan dokumen');
// PELAJAR ROUTES ENDS

// KUPLI ROUTE BEGIN
Route::get('kupli/pengurusan-dokumen', KupliPengurusanDokumen::class)->name('kupli pengurusan dokumen');
Route::get('kupli/pengurusan-dokumen/tambah', PenyuntinganDokumenTambah::class)->name('kupli penyuntingan dokumen tambah');
Route::get('kupli/pengurusan-dokumen/{dokumen_ojt:id}/sunting', KupliPenyuntinganDokumen::class)->name('kupli penyuntingan dokumen');
// Route::delete('kupli/pengurusan-dokumen/{dokumen_ojt:id}/hapus', KupliPenyuntinganDokumen::class);
Route::get('kupli/pelajar/senarai', SenaraiPelajar::class)->name('kupli senarai pelajar');
// KUPLI ROUTE ENDS
});