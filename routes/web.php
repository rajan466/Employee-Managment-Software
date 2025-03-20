
<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\CompanyManagment;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Logout;
use App\Livewire\Admin\Profile;
use App\Livewire\Admin\ProjectManagement;
use App\Livewire\Admin\Reports;
use App\Livewire\Admin\StaffManagement;
use App\Livewire\Admin\TaskManagement;
use App\Livewire\Auth\ForgetPassword;
use App\Livewire\Auth\Login;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/admin/login', Login::class)->name('admin.login');

Route::get('/forget-password', ForgetPassword::class)->name('password.request');

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::get('/company', CompanyManagment::class)->name('company');

Route::get('/task', TaskManagement::class)->name('task');

Route::get('/staff', StaffManagement::class)->name('staff');

Route::get('/report', Reports::class)->name('report');

Route::get('/project', ProjectManagement::class)->name('project');

Route::get('/profile', Profile::class)->name('profile');

Route::get('/logout', Logout::class)->name('logout');


