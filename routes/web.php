<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TransactionTypeController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\Select2Controller;
use App\Http\Controllers\SellTokenController;
use App\Http\Controllers\GiftTokenController;
use App\Http\Controllers\TransferTokenController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\MenuController;

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

Route::get('/', function() {
  return redirect('/dashboard');
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm']);

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('Dashboard');
        Route::get('/analytics', [DashboardController::class, 'analytics'])->name('Analytics');
        Route::get('/crm', [DashboardController::class, 'crm'])->name('CRM');
        Route::get('/reports', [DashboardController::class, 'reports'])->name('Reports');
        Route::get('/saas', [DashboardController::class, 'saas'])->name('SaaS');
        Route::get('/sales', [DashboardController::class, 'sales'])->name('Sales');
    });
    
    Route::group(['prefix' => 'settings'], function() {
        Route::group(['prefix' => 'roles'], function() {
            Route::get('/', [RoleController::class, 'index'])->name('Roles');
            Route::get('datatable', [RoleController::class, 'datatable']);
            Route::post('/', [RoleController::class, 'store']);
            Route::get('/{id}', [RoleController::class, 'edit']);
            Route::put('/{id}', [RoleController::class, 'update']);
            Route::delete('/{id}', [RoleController::class, 'destroy']);
        });
    
        Route::group(['prefix' => 'users'], function() {
            Route::get('datatable', [UserController::class, 'datatable']);
            Route::get('/', [UserController::class, 'index'])->name('Users');
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{id}', [UserController::class, 'edit']);
            Route::post('/{id}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
        });

        Route::group(['prefix' => 'payment-methods'], function() {
            Route::get('datatable', [PaymentMethodController::class, 'datatable']);
            Route::get('/', [PaymentMethodController::class, 'index'])->name('Payment Methods');
            Route::post('/', [PaymentMethodController::class, 'store']);
            Route::get('/{id}', [PaymentMethodController::class, 'edit']);
            Route::put('/{id}', [PaymentMethodController::class, 'update']);
            Route::delete('/{id}', [PaymentMethodController::class, 'destroy']);
        });

        Route::group(['prefix' => 'statuses'], function() {
            Route::get('datatable', [StatusController::class, 'datatable']);
            Route::get('/', [StatusController::class, 'index'])->name('Statuses');
            Route::post('/', [StatusController::class, 'store']);
            Route::get('/{id}', [StatusController::class, 'edit']);
            Route::put('/{id}', [StatusController::class, 'update']);
            // Route::delete('/{id}', [StatusController::class, 'destroy']);
        });

        Route::group(['prefix' => 'transaction-types'], function() {
            Route::get('datatable', [TransactionTypeController::class, 'datatable']);
            Route::get('/', [TransactionTypeController::class, 'index'])->name('Transaction Types');
            Route::post('/', [TransactionTypeController::class, 'store']);
            Route::get('/{id}', [TransactionTypeController::class, 'edit']);
            Route::put('/{id}', [TransactionTypeController::class, 'update']);
            // Route::delete('/{id}', [TransactionTypeController::class, 'destroy']);
        });

        Route::group(['prefix' => 'wallets'], function() {
            Route::get('datatable', [WalletController::class, 'datatable']);
            Route::get('/', [WalletController::class, 'index'])->name('Wallets');
            Route::post('/', [WalletController::class, 'store']);
            Route::get('/{id}', [WalletController::class, 'edit']);
            Route::put('/{id}', [WalletController::class, 'update']);
            // Route::delete('/{id}', [TransactionTypeController::class, 'destroy']);
        });

        Route::group(['prefix' => 'menus'], function() {
            Route::get('/', [MenuController::class, 'index'])->name('Menus');
            Route::get('datatable', [MenuController::class, 'datatable']);
            Route::post('/', [MenuController::class, 'store']);
            Route::get('/{id}', [MenuController::class, 'edit']);
            Route::put('/{id}', [MenuController::class, 'update']);
            Route::delete('/{id}', [MenuController::class, 'destroy']);
        });
    });

    Route::group(['prefix' => 'operations'], function() {
        Route::group(['prefix' => 'transactions'], function() {
            Route::get('datatable', [TransactionController::class, 'datatable']);
            Route::get('/', [TransactionController::class, 'index'])->name('Transactions');
            Route::get('/{id}', [TransactionController::class, 'edit']);
            Route::get('/get-tokens', [TransactionController::class, 'gettokens']);
            Route::post('/buy', [TransactionController::class, 'buy']);
            Route::post('/buy-approve/{id}', [TransactionController::class, 'approve']);
            Route::post('/buy-reject/{id}', [TransactionController::class, 'reject']);
        });

        Route::group(['prefix' => 'sell-tokens'], function() {
            Route::get('/', [SellTokenController::class, 'index'])->name('Sell Tokens');
            Route::get('datatable', [SellTokenController::class, 'datatable']);
            Route::post('/', [SellTokenController::class, 'store']);
            Route::get('/{id}', [SellTokenController::class, 'edit']);
            Route::put('/{id}', [SellTokenController::class, 'update']);
            Route::delete('/{id}', [SellTokenController::class, 'destroy']);
            Route::post('/sell-approve/{id}', [SellTokenController::class, 'approve']);
            Route::post('/sell-cancel/{id}', [SellTokenController::class, 'cancel']);
        });

        Route::group(['prefix' => 'gift-tokens'], function() {
            Route::get('/', [GiftTokenController::class, 'index'])->name('Gift Tokens');
            Route::get('datatable', [GiftTokenController::class, 'datatable']);
            Route::post('/', [GiftTokenController::class, 'store']);
            Route::delete('/{id}', [GiftTokenController::class, 'destroy']);
        });

        Route::group(['prefix' => 'transfer-tokens'], function() {
            Route::get('/', [TransferTokenController::class, 'index'])->name('Transfer Tokens');
            Route::get('datatable', [TransferTokenController::class, 'datatable']);
            Route::post('/', [TransferTokenController::class, 'store']);
            Route::delete('/{id}', [TransferTokenController::class, 'destroy']);
        });
    });

    Route::group(['prefix' => 'select2'], function() {
        Route::get('/user-accounts', [Select2Controller::class, 'useraccounts']);
        Route::get('/tokens', [Select2Controller::class, 'tokens']);
        Route::get('/menus', [Select2Controller::class, 'menus']);
        Route::get('/payment-methods', [Select2Controller::class, 'paymentMethods']);
    });

    Route::get('/current-price/{id}', [HelperController::class, 'currentPrice']);

});

Auth::routes();
