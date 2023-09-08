<?php

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

//API route
include('api.php');


//Route::group(['middleware' => ['Auth']], function () {

    //Route::any('/', 'AppController@dashboard');
    Route::view('/', 'dashboard', ['caption'=>'caption']);
    Route::view('dashboard', 'dashboard', ['caption'=>'caption']);

    Route::get('list/{jr?}', 'ListController@datalist');
    
    Route::get('account/{id?}', 'AccountController@edit');
    Route::get('contact/{id?}', 'ContactController@edit');
    Route::get('lead/{id?}', 'LeadController@edit');
    Route::get('opportunity/{id?}', 'OpportunityController@edit');
    Route::get('case/{id?}', 'CaseController@edit');
    Route::get('email/{id?}', 'EmailController@edit');
    Route::get('calendar/{id?}', 'CalendarController@edit');
    Route::get('meeting/{id?}', 'MeetingController@edit');
    Route::get('call/{id?}', 'CallsController@edit');
    Route::get('task/{id?}', 'TaskController@edit');
    Route::get('stream/{id?}', 'StreamController@edit');
    Route::get('report/{id?}', 'ReportController@edit');

    // Route::post('account/{id?}', 'AccountController@save');
    // Route::post('contact', 'ContactController@save');
    // Route::post('lead', 'LeadController@save');
    // Route::post('opportunity', 'OpportunityController@save');
    // Route::post('case', 'CaseController@save');
    // Route::post('email', 'EmailController@save');
    // Route::post('calendar', 'CalendarController@save');
    // Route::post('meeting', 'MeetingController@save');
    // Route::post('calls', 'CallsController@save');
    // Route::post('task', 'TaskController@save');
    // Route::post('stream', 'StreamController@save');
    // Route::post('report', 'ReportController@save');





    Route::get('reportall', 'AppController@reportall');
    Route::get('setting', 'AppController@setting');
    Route::post('setting', 'AppController@setting_save');
    // Route::get('logout', 'AppController@logout');
    // Route::get('login', 'AppController@login'); 
    // Route::post('login', 'AppController@checklogin'); 
    Route::get('upload', 'FileUploadController@upload'); // upload file
    Route::post('upload/proses', 'FileUploadController@proses_upload'); // process upload file
    // https://www.malasngoding.com/membuat-upload-file-laravel/

    //dataList
    Route::get('datalist/{jr}', 'MasterController@datalist');
    Route::get('datalist/{jr}/excel', 'MasterController@datalist_exportexcel');
    Route::get('datalist/{jr}/pdf', 'MasterController@datalist_exportpdf');
    Route::get('datalist/{jr}/pdf-usingChromeheadless', 'MasterController@datalist_exportpdf_usingChromeheadless');
    Route::get('accountdetaillist/{id}', 'TransController@accountdetaillist');

    //transList
    Route::get('translist/{jr}', 'TransController@translist');
    Route::get('translist/{jr}/excel', 'TransController@translist_exportexcel');
    Route::get('translist/{jr}/pdf', 'TransController@translist_exportpdf');
    Route::get('translist/{jr}/pdf_usingTPDF', 'TransController@translist_exportpdf_usingTPDF');
    Route::get('translist/EX', 'JournalBankController@translist');
    Route::get('translist/{jr}/dt_excel', 'TransController@translist_dt_exportexcel');

    //edit master
    // Route::any('profile', 'MasterController@profile');
    // Route::get('supplier-edit/{id}', 'MasterController@dataedit');
    // Route::post('supplier-edit/{id}', 'MasterController@datasave_customersupplier');
    // Route::get('customer-edit/{id}', 'MasterController@dataedit');
    // Route::get('account-edit/{id}', 'MasterController@dataedit');
    // Route::post('account-edit/{id}', 'MasterController@datasave_coa');
    // Route::get('bank-edit/{id}', 'MasterController@dataedit');
    // Route::post('bank-edit/{id}', 'MasterController@datasave_bank');

    //profile
    Route::get('profile', 'MasterController@profile');
    Route::post('profile', 'MasterController@profile_save');

    //master data
    $mdata = ['product', 'customer', 'supplier', 'account'];
    foreach($mdata as $jr) {
        Route::prefix($jr)->group(function () {
            Route::get('view/{id}', 'MasterController@dataview');
            Route::get('edit/{id}', 'MasterController@dataedit');
            Route::post('edit/{id}', 'MasterController@datasave'); //ini route save yg benar
        });
    }

    //edit trans
    Route::get('trans-edit/{jr}/{id}', 'TransController@transedit')->name('trans-edit');
    Route::post('trans-edit/{jr}/{id}', 'TransController@transsave');
    //Route::post('transsave', 'TransController@transsave');
    Route::get("trans-edit/pro/products/batch", 'TransController@testbatch');
    Route::post('transpaymentsave', 'TransController@transpaysave');

    //payment
    Route::prefix('payment')->group(function () {
        Route::get('view/{jr}/{id}', 'PaymentController@transedit');
        Route::get('edit/{jr}/{id}', 'PaymentController@transedit');
        Route::post('edit/{jr}/{id}', 'PaymentController@paymentsave');
    });

    //edit cash/bank
    Route::get('cash/edit/{id}', 'JournalBankController@dataedit');
    Route::post('cash/edit/{id}', 'JournalBankController@datasave');
    Route::get('bank/edit/{id}', 'MasterController@dataedit');
    Route::post('bank/edit/{id}', 'MasterController@datasave');

    //order
    Route::prefix('order')->group(function () {
        Route::get('createinvoice/{id}', 'TransController@createInvoice');
    });

    //report
    Route::prefix('report')->group(function () {
        Route::get('stockquery', 'ReportController@ReportStockQuery');
        Route::get('{id}', 'ReportController@makereport');
        // Route::get('report/{id}', 'ReportController@examplepdf');
    });

    //koolreport test di web
    Route::get('koolreport-translist/{jr}', 'TransController@koolreport_translist');

    //get data using ajax
    Route::get('getrow/{db}', 'AjaxController@getDBRow');
    Route::get('getdata/{db}', 'AjaxController@getDBData');
    Route::get('getbalanceproduct/{id}', 'AjaxController@getProductSumQty');
    Route::get('getbalanceacc/{id}', 'AjaxController@getAccSumAmount');

    //get data using select box ui
    Route::get('select/{jr}', 'MainController@selectData');

    //Router test for using new technology
    Route::prefix('test')->group(function () {
        Route::get('docraptorpdf', 'ReportController@test_docraptor');
    });

//});

/* 
    router tuk coba2
*/





