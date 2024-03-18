<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\LogsController;
use App\Models\Event;
use App\Models\News;
use App\Http\Controllers\ExportController;
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
    $events = Event::all();
    $news = News::all();

    return view('welcome', compact('events', 'news'));
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/export/excel', [ExportController::class, 'excel'])->name('export.excel');
Route::get('/export/pdf', [ExportController::class, 'pdf'])->name('export.pdf');
Route::get('/export/word', [ExportController::class, 'word'])->name('export.word');

Route::middleware(['auth', 'admin'])->group(function () {

    // Advertisements
    Route::resource('advertisements', AdvertisementController::class)->names([
        'index' => 'admin.advertisement',
        'show' => 'admin.advertisementShow',
        'edit' => 'admin.advertisementEdit',
        'create' => 'admin.advertisementCreate',
        'store' => 'admin.advertisementStore',
        'update' => 'admin.advertisementUpdate',
        'destroy' => 'admin.advertisementDestroy',

    ]);

    // Events
    Route::resource('events', EventController::class)->names([
        'index' => 'admin.events',
        'create' => 'admin.eventsCreate',
        'store' => 'admin.eventsStore',
        'show' => 'admin.eventsShow',
        'edit' => 'admin.eventsEdit',
        'update' => 'admin.eventsUpdate',
        'destroy' => 'admin.eventsDestroy',
    ]);

    //news
    Route::resource('news', NewsController::class)->names([
        'index' => 'admin.news',
        'create' => 'admin.newsCreate',
        'store' => 'admin.news.store',
        'show' => 'admin.newsShow',
        'edit' => 'admin.newsEdit',
        'destroy' => 'admin.newsDestroy',
        'update' => 'admin.newsUpdate',
    ]);



    //logs
    Route::resource('logs', LogsController::class)->except(['create', 'store', 'update', 'destroy'])->names([
        'index' => 'admin.logs',
        'show' => 'admin.logsShow',
        'edit' => 'admin.logsEdit',
    ]);
    //statistics
    Route::resource('statistics', StatisticsController::class)->except(['create', 'store', 'update', 'destroy'])->names([
        'index' => 'admin.statistics',
        'show' => 'admin.statisticsShow',
        'edit' => 'admin.statisticsEdit',
    ]);
    // Users
    Route::resource('users', UserController::class)->except(['create', 'store'])->names([
        'index' => 'admin.users',
        'show' => 'admin.userShow',
        'edit' => 'admin.userEdit',
        'update' => 'admin.userUpdate',
        'destroy' => 'admin.userDestroy',
    ]);
});

// for admin and user
Route::middleware(['auth', 'verified'])->group(function () {

    Route::post('/submit-feedback', [ReportController::class, 'submitFeedback'])->name('admin.submitFeedback');



    // Reports Resource
    Route::resource('reports', ReportController::class)->except(['destroy'])->names([
        'index' => 'admin.reports',
        'create' => 'admin.reportCreate',
        'show' => 'admin.reportShow',
        'edit' => 'admin.reportEdit',
        'store' => 'admin.reportStore',
        'update' => 'admin.reportUpdate',
    ]);
    /*    Route::resource('reports', AdminReport::class)->except(['destroy'])->names([
        'index' => 'admin.adminReport',
        'create' => 'admin.adminReportCreate',
        'show' => 'admin.adminReportShow',
        'edit' => 'admin.adminReportEdit',
        'store' => 'admin.adminReportStore',
        'update' => 'admin.adminReportUpdate',
    ]); */
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
