<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\f1\GenConsentController;
use App\Http\Controllers\f1\HarapanPasienController;
use App\Http\Controllers\f1\PersetujuanRanapController;
use App\Http\Controllers\f2\PpaRajalController;
use App\Http\Controllers\f2\TriageIgdController;
use App\Http\Controllers\f4\CpptController;
use App\Http\Controllers\f5\RadiologiController;
use App\Http\Controllers\f8\ResumeController;
use App\Http\Controllers\f8\ResumeTerapiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PpaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
// Auth::routes();
Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate'])->name('login');
Route::get('/loginotp',[LoginController::class,'otp'])->name('loginotp');
Route::group(['middleware'=>'auth'],function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/pasien',[PasienController::class,'index']);
    Route::get('/pasien/cari',[PasienController::class,'cari']);
    Route::get('/pasien/{nopasien}',[PasienController::class,'show']);
    Route::get('/pasien/{nopasien}/{noreg}',[PasienController::class,'riwayat']);

    Route::controller(GenConsentController::class)->group(function(){
        Route::get('/f1/generalconsent','index')->name('generalconsent.index');
        Route::get('/f1/generalconsent/create','create');
        Route::post('/f1/generalconsent','store')->name('generalconsent.store');
        Route::get('/f1/generalconsent/{noreg}','edit')->name('generalconsent.edit');
        Route::put('/f1/generalconsent/{noreg}','update')->name('generalconsent.update');
        Route::get('/f1/generalconsent/{id}/delete','delete')->name('generalconsent.delete');
    });

    Route::controller(RadiologiController::class)->group(function(){
        Route::get('/f5/radiologi','index')->name('radiologi.index');
        Route::get('/f5/radiologi/create','create');
        Route::post('/f5/radiologi','store')->name('radiologi.store');
        Route::get('/f5/radiologi/{noreg}','show');
        Route::get('/f5/radiologi/{noreg}/edit','edit')->name('radiologi.edit');
        Route::patch('/f5/radiologi/{noreg}','update')->name('radiologi.update');
        Route::get('/f5/radiologi/{id}/delete','delete')->name('radiologi.delete');
        Route::get('/f5/radiologi/{noreg}/pdf','generate');
    });

    Route::controller(TriageIgdController::class)->group(function(){
        Route::get('/f2/triageigd','index')->name('triageigd.index');
        Route::get('/f2/triageigd/create','create');
        Route::post('/f2/triageigd','store')->name('triageigd.store');
        Route::get('/f2/triageigd/{noreg}','edit')->name('triageigd.edit');
        Route::patch('/f2/triageigd/{noreg}','update')->name('triageigd.update');
        Route::get('/f2/triageigd/{id}/delete','delete')->name('triageigd.delete');
    });
    
    Route::controller(PpaRajalController::class)->group(function(){
        Route::get('/f2/pparajal','index')->name('pparajal.index');
        Route::get('/f2/pparajal/create','create');
        Route::get('/f2/pparajal/dashboard/{noreg}','dashboard')->name('pparajal.dashboard');
        Route::post('/f2/pparajal','store')->name('pparajal.store');
        Route::get('/f2/pparajal/{noreg}','edit')->name('pparajal.edit');
        Route::patch('/f2/pparajal/{noreg}','update')->name('pparajal.update');
        Route::get('/f2/pparajal/{id}/delete','delete')->name('pparajal.delete');
    });
    
    Route::controller(PersetujuanRanapController::class)->group(function(){
        Route::get('/f1/persetujuanranap','index')->name('persetujuanranap.index');
        Route::get('/f1/persetujuanranap/create','create');
        Route::post('/f1/persetujuanranap','store')->name('persetujuanranap.store');
        Route::get('/f1/persetujuanranap/{noreg}','edit')->name('persetujuanranap.edit');
        Route::patch('/f1/persetujuanranap/{noreg}','update')->name('persetujuanranap.update');
        Route::get('/f1/persetujuanranap/{id}/delete','delete')->name('persetujuanranap.delete');
    });

    Route::controller(HarapanPasienController::class)->group(function(){
        Route::get('/f1/harapanpasien','index')->name('harapanpasien.index');
        Route::get('/f1/harapanpasien/create','create');
        Route::post('/f1/harapanpasien','store')->name('harapanpasien.store');
        Route::get('/f1/harapanpasien/{noreg}','edit')->name('harapanpasien.edit');
        Route::patch('/f1/harapanpasien/{noreg}','update')->name('harapanpasien.update');
        Route::get('/f1/harapanpasien/{id}/delete','delete')->name('harapanpasien.delete');
    });

    Route::controller(CpptController::class)->group(function(){
        Route::get('/f4/cppt','index')->name('cppt.index');
        Route::get('/f4/cppt/create','create');
        Route::post('/f4/cppt','store')->name('cppt.store');
        Route::get('/f4/cppt/{noreg}','edit')->name('cppt.edit');
        Route::patch('/f4/cppt/{noreg}','update')->name('cppt.update');
        Route::get('/f4/cppt/{id}/delete','delete')->name('cppt.delete');
    });

    Route::controller(ResumeController::class)->group(function(){
        Route::get('/f8/resume','index')->name('resume.index');
        Route::get('/f8/resume/create','create');
        Route::post('/f8/resume','store')->name('resume.store');
        Route::get('/f8/resume/{noreg}','edit')->name('resume.edit');
        Route::patch('/f8/resume/{noreg}','update')->name('resume.update');
        Route::get('/f8/resume/{id}/delete','delete')->name('resume.delete');
    });

    Route::get('/resumerajal', App\Http\Livewire\F2\Resume\Index::class);

    Route::get('/user',[UserController::class,'index']);
    Route::post('/user',[UserController::class,'store']);
    Route::get('/fetch-users',[UserController::class,'fetchusers']);
    Route::get('/edit-user/{id}',[UserController::class,'edit']);
    Route::put('/update-user/{id}',[UserController::class,'update']);
    Route::delete('/delete-user/{id}',[UserController::class,'destroy']);
    
    Route::get('/ppa',[PpaController::class,'index'])->name('ppa.index');
    Route::post('/ppa',[PpaController::class,'store'])->name('ppa.store');
    Route::get('/ppa/qrcode/{id}', [PpaController::class, 'qrcode'])->name('qrcode');

    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

// Route::post('/triageigd-simpan-terapi', function () {Route::get('/b/post/{id}/delete',[PostController::class,'delete'])->name('post.delete');
//     return 'oke';
// });

// Route::post('/triageigd-simpan-terapi','simpanTerapi');
// Route::get('/simpan-triage', App\Http\Livewire\F2\Resume\simpanTriage::class);