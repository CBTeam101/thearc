<?php

use App\Enums\Role;
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
use App\Http\Controllers\Auth\ForgotPasswordController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

// Route::group(['middleware' => 'auth'], function() {
//     Route::post('transactions', 'App\Http\Controllers\TransactionController@store');
//     Route::get('transactions-datatable', 'App\Http\Controllers\TransactionController@index');
//     Route::get('users-datatable', 'App\Http\Controllers\UserController@index');
//     Route::post('transactions-approve/{id}', 'App\Http\Controllers\TransactionController@approve');
//     Route::post('put-in-tokens', 'App\Http\Controllers\PutInTokenController@store');
//     // Route::resource('user','App\Http\Controllers\UserController');
//     // Route::get('user')

//     Route::get('/', 'App\Http\Controllers\MophyadminController@dashboard_1');
//     Route::get('/cards-center', 'App\Http\Controllers\MophyadminController@cards_center');

//     Route::get('/my-wallet', 'App\Http\Controllers\MophyadminController@my_wallet');
//     Route::get('/invoices', 'App\Http\Controllers\MophyadminController@invoices');
//     Route::get('/transactions', 'App\Http\Controllers\MophyadminController@transactions');
//     //kini ra rey
//     Route::get('/users', 'App\Http\Controllers\MophyadminController@users');
//     Route::get('/transactions-details/{id}', 'App\Http\Controllers\MophyadminController@transactions_details');
//     Route::get('/app-calender', 'App\Http\Controllers\MophyadminController@app_calender');
//     Route::get('/app-profile', 'App\Http\Controllers\MophyadminController@app_profile');
//     Route::get('/post-details', 'App\Http\Controllers\MophyadminController@post_details');
//     Route::get('/chart-chartist', 'App\Http\Controllers\MophyadminController@chart_chartist');
//     Route::get('/chart-chartjs', 'App\Http\Controllers\MophyadminController@chart_chartjs');
//     Route::get('/chart-flot', 'App\Http\Controllers\MophyadminController@chart_flot');
//     Route::get('/chart-morris', 'App\Http\Controllers\MophyadminController@chart_morris');
//     Route::get('/chart-peity', 'App\Http\Controllers\MophyadminController@chart_peity');
//     Route::get('/chart-sparkline', 'App\Http\Controllers\MophyadminController@chart_sparkline');
//     Route::get('/ecom-checkout', 'App\Http\Controllers\MophyadminController@ecom_checkout');
//     Route::get('/ecom-customers', 'App\Http\Controllers\MophyadminController@ecom_customers');
//     Route::get('/ecom-invoice', 'App\Http\Controllers\MophyadminController@ecom_invoice');
//     Route::get('/ecom-product-detail', 'App\Http\Controllers\MophyadminController@ecom_product_detail');
//     Route::get('/ecom-product-grid', 'App\Http\Controllers\MophyadminController@ecom_product_grid');
//     Route::get('/ecom-product-list', 'App\Http\Controllers\MophyadminController@ecom_product_list');
//     Route::get('/ecom-product-order', 'App\Http\Controllers\MophyadminController@ecom_product_order');
//     Route::get('/email-compose', 'App\Http\Controllers\MophyadminController@email_compose');
//     Route::get('/email-inbox', 'App\Http\Controllers\MophyadminController@email_inbox');
//     Route::get('/email-read', 'App\Http\Controllers\MophyadminController@email_read');
//     Route::get('/form-editor-summernote', 'App\Http\Controllers\MophyadminController@form_editor_summernote');
//     Route::get('/form-element', 'App\Http\Controllers\MophyadminController@form_element');
//     Route::get('/form-pickers', 'App\Http\Controllers\MophyadminController@form_pickers');
//     Route::get('/form-validation-jquery', 'App\Http\Controllers\MophyadminController@form_validation_jquery');
//     Route::get('/form-wizard', 'App\Http\Controllers\MophyadminController@form_wizard');
//     Route::get('/map-jqvmap', 'App\Http\Controllers\MophyadminController@map_jqvmap');
//     Route::get('/page-error-400', 'App\Http\Controllers\MophyadminController@page_error_400');
//     Route::get('/page-error-403', 'App\Http\Controllers\MophyadminController@page_error_403');
//     Route::get('/page-error-404', 'App\Http\Controllers\MophyadminController@page_error_404');
//     Route::get('/page-error-500', 'App\Http\Controllers\MophyadminController@page_error_500');
//     Route::get('/page-error-503', 'App\Http\Controllers\MophyadminController@page_error_503');
//     Route::get('/page-forgot-password', 'App\Http\Controllers\MophyadminController@page_forgot_password');
//     Route::get('/page-lock-screen', 'App\Http\Controllers\MophyadminController@page_lock_screen');
//     Route::get('/page-login', 'App\Http\Controllers\MophyadminController@page_login');
//     Route::get('/page-register', 'App\Http\Controllers\MophyadminController@page_register');
//     Route::get('/table-bootstrap-basic', 'App\Http\Controllers\MophyadminController@table_bootstrap_basic');
//     Route::get('/table-datatable-basic', 'App\Http\Controllers\MophyadminController@table_datatable_basic');
//     Route::get('/uc-lightgallery', 'App\Http\Controllers\MophyadminController@uc_lightgallery');
//     Route::get('/uc-nestable', 'App\Http\Controllers\MophyadminController@uc_nestable');
//     Route::get('/uc-noui-slider', 'App\Http\Controllers\MophyadminController@uc_noui_slider');
//     Route::get('/uc-select2', 'App\Http\Controllers\MophyadminController@uc_select2');
//     Route::get('/uc-sweetalert', 'App\Http\Controllers\MophyadminController@uc_sweetalert');
//     Route::get('/uc-toastr', 'App\Http\Controllers\MophyadminController@uc_toastr');
//     Route::get('/ui-accordion', 'App\Http\Controllers\MophyadminController@ui_accordion');
//     Route::get('/ui-alert', 'App\Http\Controllers\MophyadminController@ui_alert');
//     Route::get('/ui-badge', 'App\Http\Controllers\MophyadminController@ui_badge');
//     Route::get('/ui-button', 'App\Http\Controllers\MophyadminController@ui_button');
//     Route::get('/ui-button-group', 'App\Http\Controllers\MophyadminController@ui_button_group');
//     Route::get('/ui-card', 'App\Http\Controllers\MophyadminController@ui_card');
//     Route::get('/ui-carousel', 'App\Http\Controllers\MophyadminController@ui_carousel');
//     Route::get('/ui-dropdown', 'App\Http\Controllers\MophyadminController@ui_dropdown');
//     Route::get('/ui-grid', 'App\Http\Controllers\MophyadminController@ui_grid');
//     Route::get('/ui-list-group', 'App\Http\Controllers\MophyadminController@ui_list_group');
//     Route::get('/ui-media-object', 'App\Http\Controllers\MophyadminController@ui_media_object');
//     Route::get('/ui-modal', 'App\Http\Controllers\MophyadminController@ui_modal');
//     Route::get('/ui-pagination', 'App\Http\Controllers\MophyadminController@ui_pagination');
//     Route::get('/ui-popover', 'App\Http\Controllers\MophyadminController@ui_popover');
//     Route::get('/ui-progressbar', 'App\Http\Controllers\MophyadminController@ui_progressbar');
//     Route::get('/ui-tab', 'App\Http\Controllers\MophyadminController@ui_tab');
//     Route::get('/ui-typography', 'App\Http\Controllers\MophyadminController@ui_typography');
//     Route::get('/widget-basic', 'App\Http\Controllers\MophyadminController@widget_basic');
// });

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
    });

    Route::group(['prefix' => 'select2'], function() {
        Route::get('/user-accounts', [Select2Controller::class, 'useraccounts']);
        Route::get('/tokens', [Select2Controller::class, 'tokens']);
    });

});

Auth::routes();
