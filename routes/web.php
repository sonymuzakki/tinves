<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\monitoringController;
use App\Http\Controllers\NotesController;

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
    return view('auth.login');
});

// Route::get('/calender', function () {return view('Backend.Calender.network');});

Route::get('/users', function () { return view('Frontend.index');})->name('users');

Route::controller(monitoringController::class)->group(function () {
    Route::get('/getEvent', 'getevent')->name('getevent')->middleware('role:admin');
    Route::post('/createevent', 'createEvent')->name('createevent')->middleware('role:admin');
    Route::post('/deleteevent', 'deleteevent')->name('deleteevent')->middleware('role:admin');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/users', 'index')->name('users')->middleware(['auth','verified']);
    Route::post('/request', 'RequestStore')->name('request');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout')->middleware(['auth','verified']);
    Route::get('/profile', 'profile')->name('admin.profile')->middleware('role:admin');
    Route::get('/editProfile', 'editProfile')->name('edit.profile')->middleware('role:admin');
    Route::post('/storeProfile', 'storeProfile')->name('store.profile')->middleware('role:admin');
});

Route::controller(InventoryController::class)->group(function () {
    Route::get('/Inventaris-Add','InventarisAdd')->name('invetaris.add')->middleware('role:admin');
    Route::post('/Inventaris-store','InventarisStore')->name('invetaris.store')->middleware('role:admin');
    Route::get('/InventarisEdit-{id}','InventarisEdit')->name('inventaris.edit')->middleware('role:admin');
    Route::put('/InventarisUpdate/{id}','InventarisUpdate')->name('inventaris.update')->middleware('role:admin');
    Route::get('/InventarisDelete-{id}','InventarisDelete')->name('invetaris.delete')->middleware('role:admin');
    Route::get('/InventarisDetails-{id}','InventarisDetails')->name('invetaris.details')->middleware('role:admin');
    Route::get('/json', 'json')->name('json')->middleware('role:admin');
    Route::get('/index', 'index_json')->name('index_json')->middleware('role:admin');

    // Printer
    Route::get('/json', 'json_printer')->name('json_printer')->middleware('role:admin');
    Route::get('/Printer', 'index_printer')->name('index_printer')->middleware('role:admin');
    Route::get('/add-printer', 'add_printer')->name('add-printer')->middleware('role:admin');
    Route::post('/store-printer', 'store_printer')->name('store-printer')->middleware('role:admin');
    Route::get('/edit-printer-{id}', 'edit_printer')->name('edit-printer')->middleware('role:admin');
    Route::post('/update-printer-{id}', 'update_printer')->name('update-printer')->middleware('role:admin');
    Route::get('/delete-printer-{id}', 'delete_printer')->name('delete-printer')->middleware('role:admin');
    Route::get('/details-printer-{id}', 'details_printer')->name('details-printer')->middleware('role:admin');

    // Printer
    Route::get('/json', 'json_ups')->name('json_ups')->middleware('role:admin');
    Route::get('/ups', 'index_ups')->name('index_ups')->middleware('role:admin');
    Route::get('/add-ups', 'add_ups')->name('add-ups')->middleware('role:admin');
    Route::post('/store-ups', 'store_ups')->name('store-ups')->middleware('role:admin');
    Route::get('/edit-ups-{id}', 'edit_ups')->name('edit-ups')->middleware('role:admin');
    Route::post('/update-ups-{id}', 'update_ups')->name('update-ups')->middleware('role:admin');
    Route::get('/delete-ups-{id}', 'delete_ups')->name('delete-ups')->middleware('role:admin');
    Route::get('/details-ups-{id}', 'details_ups')->name('details-ups')->middleware('role:admin');

});


Route::controller(MasterController::class)->group(function () {
    Route::get('/jenis-all', 'jenisAll')->name('jenis.all')->middleware('role:admin');
    Route::get('/jenis-add', 'jenisAdd')->name('jenis.add')->middleware('role:admin');
    Route::post('/jenis-store', 'jenisStore')->name('jenis.store')->middleware('role:admin');
    Route::get('/jenis-delete{id}', 'jenisDelete')->name('jenis.delete')->middleware('role:admin');
    Route::get('/jenis-edit{id}', 'jenisEdit')->name('jenis.edit')->middleware('role:admin');
    Route::post('/jenisUpdate','jenisUpdate')->name('jenis.update')->middleware('role:admin');

    Route::get('/Divisi-All', 'divisiAll')->name('divisi.all')->middleware('role:admin');
    Route::get('/divisi-add', 'divisiAdd')->name('divisi.add')->middleware('role:admin');
    Route::post('/divisi-store', 'divisiStore')->name('divisi.store')->middleware('role:admin');
    Route::get('/divisi-delete{id}', 'divisiDelete')->name('divisi.delete')->middleware('role:admin');
    Route::get('/divisiEdit-{id}','divisiEdit')->name('divisi.edit')->middleware('role:admin');
    Route::post('/divisiUpdate','DivisiUpdate')->name('divisi.update')->middleware('role:admin');

    Route::get('/lokasi-All', 'lokasiAll')->name('lokasi.all')->middleware('role:admin');
    Route::get('/lokasi-add', 'lokasiAdd')->name('lokasi.add')->middleware('role:admin');
    Route::post('/lokasi-store', 'lokasiStore')->name('lokasi.store')->middleware('role:admin');
    Route::get('/lokasi-delete{id}', 'lokasiDelete')->name('lokasi.delete')->middleware('role:admin');
    Route::post('/lokasiUpdate','lokasiUpdate')->name('lokasi.update')->middleware('role:admin');
    Route::get('/lokasi-edit-{id}','lokasiEdit')->name('lokasi.edit')->middleware('role:admin');

    Route::get('/user-All', 'userAll')->name('user.all')->middleware('role:admin');
    Route::get('/user-Add', 'userAdd')->name('user.add')->middleware('role:admin');
    Route::post('/user-store', 'userStore')->name('user.store')->middleware('role:admin');
    Route::get('/user-delete{id}', 'userDelete')->name('user.delete')->middleware('role:admin');
    Route::get('/userEdit-{id}','userEdit')->name('user.edit')->middleware('role:admin');
    Route::PUT('/userUpdate','userUpdate')->name('user.update')->middleware('role:admin');
});

Route::controller(HistoryController::class)->group(function () {
    Route::get('/request-all', 'HistoryAll')->name('request.all')->middleware('role:admin');
    Route::get('/request-add', 'RequestAdd')->name('request.add')->middleware('role:admin');
    Route::post('/request-store', 'RequestStore')->name('request.store')->middleware('role:admin');
    Route::get('/request-proses', 'RequestPending')->name('request.pending')->middleware('role:admin');
    Route::get('/history-proses-{id}', 'historyProses')->name('history.proses')->middleware('role:admin');
    Route::PUT('/history-update/{id}', 'historyUpdate')->name('history.update')->middleware('role:admin');
    Route::get('/history-approved-{id}', 'historyApprove')->name('history.approve')->middleware('role:admin');
    Route::get('/history-approved-Dsh/{id}', 'historyApproveDashboard')->name('history.approvedsh')->middleware('role:admin');
    Route::get('/get-jenis/{id}', 'getJenis')->name('getJenis')->middleware('role:admin');

});

Route::controller(NotesController::class)->group(function () {
    Route::get('/notes', 'notes')->name('notes')->middleware('role:admin');
    Route::get('/notes-server', 'notes_server')->name('notes-server')->middleware('role:admin');
    Route::get('/json', 'json')->name('json')->middleware('role:admin');
    Route::resource('notes', NotesController::class)->middleware('role:admin');
    Route::get('notes-all', 'index')->name('notes-json')->middleware('role:admin');
    Route::get('notesAdd', 'notesAdd')->name('notesAdd')->middleware('role:admin');
    Route::post('/notesStore', 'notesStore')->name('notes.store')->middleware('role:admin');
    Route::get('/notesEdit-{id}', 'notesEdit')->name('notes.edit')->middleware('role:admin');
    Route::post('/notesUpdate', 'notesUpdate')->name('notes.update')->middleware('role:admin');
    Route::get('/finish-{id}', 'finish')->name('finish.approve')->middleware('role:admin');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('role:admin');
});

Route::controller(CalendarController::class)->group(function () {
    Route::get('/fullcalender', 'index')->name('calendar')->middleware('role:admin');
    Route::post('/fullcalenderAjax', 'ajax')->name('cal.store')->middleware('role:admin');
});
// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'profile'])->name('admin.profile');
//     Route::get('/editProfile', [ProfileController::class, 'editProfile'])->name('edit.profile');
//     Route::get('/storeProfile', [ProfileController::class, 'storeProfiel'])->name('store.profile');
//     Route::get('/admin/logout', [ProfileController::class, 'destroy'])->name('admin.logout');
// });

require __DIR__.'/auth.php';

Auth::routes();