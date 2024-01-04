<?php
use App\Livewire\EmploiDuTemps;
use App\Livewire\Simulateur;
use App\Livewire\Absences;
use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\Billing;
use App\Livewire\Profile;
use App\Livewire\Tables;
use App\Livewire\StaticSignIn;
use App\Livewire\StaticSignUp;
use App\Livewire\Rtl;

use App\Livewire\LaravelExamples\UserProfile;
use App\Livewire\LaravelExamples\UserManagement;
use App\Livewire\PaiementOnline;
use App\Livewire\VirtualReality;
use Illuminate\Http\Request;

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
    return redirect('/login');
});

Route::get('test', CreatePost::class);
Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');

    Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/paiement-online', PaiementOnline::class)->name('Paiement online');
    Route::get('/absences', Absences::class)->name('Absences');
    Route::get('/simulateur', Simulateur::class)->name('Simulateur');
    Route::get('/emploi-du-temps', EmploiDuTemps::class)->name('EmploiDuTemps');

    // Route::get('/billing', Billing::class)->name('billing');
    // Route::get('/profile', Profile::class)->name('profile');
    // Route::get('/tables', Tables::class)->name('tables');
    // Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    // Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    // Route::get('/rtl', Rtl::class)->name('rtl');
    // Route::get('/virtual-reality', VirtualReality::class)->name('virtual-reality');

    // Route::get('/user-management', UserManagement::class)->name('user-management');
});
