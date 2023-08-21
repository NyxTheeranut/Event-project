<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BudgetRequestController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\KanbanBoardController;
use App\Http\Controllers\ProfileController;
use App\Models\BudgetRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/events/apply', function () {
    return view('events.applications.create');
})->name('events.applications.create');

Route::get('/about', function () {
    return view('about.index');
})->name('about.index');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

//Route::resource('/events/apply', EventController::class);

Route::get('/events/{event}/apply',
    [EventController::class, 'createApplication']
)->name('events.applications.create');

//Route::get('/events/create', [EventController::class, 'create'])
//    ->name('event.create');

Route::post('/events/create', [EventController::class, 'store'])->name('event.create');

Route::resource('/events/{event}/kanban-board', KanbanBoardController::class);

//Route::get('/applications', [ApplicationController::class, 'index'])
//    ->name('applications.index');

Route::get('/applications', [ApplicationController::class, 'getEvents'])
    ->name('applications.index');

//Route::get('/budget-requests', [BudgetRequestController::class, 'getEvents2'])
    //->name('budgetrequests.index');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/myprofile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/myprofile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/myprofile/certificates', CertificateController::class);

Route::resource('/budget-requests', BudgetRequestController::class);



//Route::get('/events/apply', 'EventController@createApplication')->name('events.apply');

require __DIR__.'/auth.php';

