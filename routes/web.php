<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\NotificationController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
         'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Auth::routes();

      Route::middleware(['auth'])->group(function () {
            Route::redirect('/', '/offices')->name('home');

            // مسارات المكاتب
            Route::get('/offices', [OfficeController::class, 'index'])->name('offices.index');
            Route::get('/offices/create', [OfficeController::class, 'create'])->name('offices.create');
            Route::post('/offices', [OfficeController::class, 'store'])->name('offices.store');
            Route::get('/offices/{office}/edit', [OfficeController::class, 'edit'])->name('offices.edit');
            Route::put('/offices/{office}', [OfficeController::class, 'update'])->name('offices.update');
            Route::delete('/offices/{office}', [OfficeController::class, 'destroy'])->name('offices.destroy');
            Route::get('/offices/{office}', [OfficeController::class, 'show'])->name('offices.show');
            Route::get('/offices/{office}/transfers', [OfficeController::class, 'showTransfers'])->name('offices.transfers');

            // مسارات الحوالات
            Route::get('/transfers', [TransferController::class, 'index'])->name('transfers.index');
            Route::get('/transfers/create', [TransferController::class, 'create'])->name('transfers.create');
            Route::post('/transfers', [TransferController::class, 'store'])->name('transfers.store');
            Route::delete('/transfers/{transfer}', [TransferController::class, 'destroy'])->name('transfers.destroy');
            Route::post('transfers/{transfer}/mark-received', [TransferController::class, 'markReceived'])
                ->name('transfers.mark-received')->middleware('permission:transfer-delete');

            // مسارات العملات
            Route::get('/currencies', [CurrencyController::class, 'index'])->name('currencies.index');
            Route::get('/currencies/create', [CurrencyController::class, 'create'])->name('currencies.create');
            Route::post('/currencies', [CurrencyController::class, 'store'])->name('currencies.store');

            // مسارات المستخدمين
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::PATCH('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
            Route::get('/profile/{id}', [UserController::class, 'show'])->name('users.profile');

               // مسارات التصدير
               Route::get('/export/sent-transfers/{office}', [ExportController::class, 'exportSentTransfers'])
               ->name('export.sent-transfers');
           Route::get('/export/received-transfers/{office}', [ExportController::class, 'exportReceivedTransfers'])
               ->name('export.received-transfers');
           Route::get('/transfers/export-all', [TransferController::class, 'exportAllTransfers'])
               ->name('transfers.export-all');


            // مسارات أسعار الصرف
            Route::get('/exchange-rates', [ExchangeRateController::class, 'showExchangeRates']);

            // مسار للحصول على حوالات لم تتم استلامها بعد
            Route::get('/get-unreceived-transfers', [NotificationController::class, 'getUnreceivedTransfers'])
                ->name('get.unreceived.transfers');
        });
    }
);
