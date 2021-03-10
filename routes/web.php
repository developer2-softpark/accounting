<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
    return view('welcome');
});


Route::get('clear', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('storage:link');
    return 'DONE'; //Return anything
});



Auth::routes();

/////////////////Backend Route////////////////////
Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    /// setting
    Route::group(['prefix' => 'setting'], function () {
        Route::get('index', 'SettingController@index')->name('setting.index');
        Route::get('create', 'SettingController@create')->name('setting.create');
        Route::post('store', 'SettingController@store')->name('setting.store');
        Route::get('edit/{id}', 'SettingController@edit')->name('setting.edit');
        Route::post('update/{id}', 'SettingController@update')->name('setting.update');
        Route::get('destroy/{id}', 'SettingController@destroy')->name('setting.destroy');
    });

    // Business Type
    Route::group(['prefix' => 'businesstype'], function () {
        Route::get('index', 'BusinessTypeController@index')->name('businesstype.index');
        Route::get('create', 'BusinessTypeController@create')->name('businesstype.create');
        Route::post('store', 'BusinessTypeController@store')->name('businesstype.store');
        Route::get('edit/{id}', 'BusinessTypeController@edit')->name('businesstype.edit');
        Route::post('update/{id}', 'BusinessTypeController@update')->name('businesstype.update');
        Route::get('destroy/{id}', 'BusinessTypeController@destroy')->name('businesstype.destroy');
    });


    /// Brunch
    Route::group(['prefix' => 'brunch'], function () {
        Route::get('index', 'BrunchController@index')->name('brunch.index');
        Route::get('create', 'BrunchController@create')->name('brunch.create');
        Route::post('store', 'BrunchController@store')->name('brunch.store');
        Route::get('edit/{id}', 'BrunchController@edit')->name('brunch.edit');
        Route::post('update/{id}', 'BrunchController@update')->name('brunch.update');
        Route::get('destroy/{id}', 'BrunchController@destroy')->name('brunch.destroy');
    });


    /// Brand
    Route::group(['prefix' => 'brand'], function () {
        Route::get('index', 'BrandController@index')->name('brand.index');
        Route::get('create', 'BrandController@create')->name('brand.create');
        Route::post('store', 'BrandController@store')->name('brand.store');
        Route::get('edit/{id}', 'BrandController@edit')->name('brand.edit');
        Route::post('update/{id}', 'BrandController@update')->name('brand.update');
        Route::get('destroy/{id}', 'BrandController@destroy')->name('brand.destroy');
    });


    // category
    Route::group(['prefix' => 'category'], function () {
        Route::get('index', 'CategoryController@index')->name('category.index');
        Route::get('create', 'CategoryController@create')->name('category.create');
        Route::post('store', 'CategoryController@store')->name('category.store');
        Route::get('edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::post('update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('destroy/{id}', 'CategoryController@destroy')->name('category.destroy');
    });


    /// Color
    Route::group(['prefix' => 'color'], function () {
        Route::get('index', 'ColorController@index')->name('color.index');
        Route::get('create', 'ColorController@create')->name('color.create');
        Route::post('store', 'ColorController@store')->name('color.store');
        Route::get('edit/{id}', 'ColorController@edit')->name('color.edit');
        Route::post('update/{id}', 'ColorController@update')->name('color.update');
        Route::get('destroy/{id}', 'ColorController@destroy')->name('color.destroy');
    });


    /// setting
    Route::group(['prefix' => 'weight'], function () {
        Route::get('index', 'WeightController@index')->name('weight.index');
        Route::get('create', 'WeightController@create')->name('weight.create');
        Route::post('store', 'WeightController@store')->name('weight.store');
        Route::get('edit/{id}', 'WeightController@edit')->name('weight.edit');
        Route::post('update/{id}', 'WeightController@update')->name('weight.update');
        Route::get('destroy/{id}', 'WeightController@destroy')->name('weight.destroy');
    });


    //size
    Route::group(['prefix' => 'size'], function () {
        Route::get('index', 'SizeController@index')->name('size.index');
        Route::get('create', 'SizeController@create')->name('size.create');
        Route::post('store', 'SizeController@store')->name('size.store');
        Route::get('edit/{id}', 'SizeController@edit')->name('size.edit');
        Route::post('update/{id}', 'SizeController@update')->name('size.update');
        Route::get('destroy/{id}', 'SizeController@destroy')->name('size.destroy');
    });

    // unit
    Route::group(['prefix' => 'unit'], function () {
        Route::get('index', 'UnitController@index')->name('unit.index');
        Route::get('create', 'UnitController@create')->name('unit.create');
        Route::post('store', 'UnitController@store')->name('unit.store');
        Route::get('edit/{id}', 'UnitController@edit')->name('unit.edit');
        Route::post('update/{id}', 'UnitController@update')->name('unit.update');
        Route::get('destroy/{id}', 'UnitController@destroy')->name('unit.destroy');
    });

    // Proudcts
    Route::group(['prefix' => 'product'], function () {
        Route::get('index', 'ProductController@index')->name('product.index');
        Route::get('create', 'ProductController@create')->name('product.create');
        Route::post('store', 'ProductController@store')->name('product.store');
        Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('update/{id}', 'ProductController@update')->name('product.update');
        Route::get('destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    });

    // Proudcts/Ajax
    Route::group(['prefix' => 'product', 'namespace' => 'Product'], function () {
        Route::post('create/supplier', 'AjaxController@supplierCreateByAjax')->name('supplierCreateByAjax');
        Route::post('create/category', 'AjaxController@categoryCreateByAjax')->name('categoryCreateByAjax');
        Route::post('create/brand', 'AjaxController@breandCreateByAjax')->name('breandCreateByAjax');
        Route::post('create/unit', 'AjaxController@unitCreateByAjax')->name('unitCreateByAjax');
    });


    // ProudctImage
    Route::group(['prefix' => 'product'], function () {
        Route::get('index', 'ProductController@index')->name('product.index');
        Route::get('create', 'ProductController@create')->name('product.create');
        Route::post('store', 'ProductController@store')->name('product.store');
        Route::get('edit/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('update/{id}', 'ProductController@update')->name('product.update');
        Route::get('destroy/{id}', 'ProductController@destroy')->name('product.destroy');
    });


    /*Customer & Supplier*/
    Route::group(['as' => 'customer.supplier.', 'prefix' => 'customerSupplier'], function () {
        Route::get('/view', 'CustomerSupplierController@index')->name('index');
        Route::get('/create', 'CustomerSupplierController@create')->name('create');
        Route::post('/store', 'CustomerSupplierController@store')->name('store');
        Route::get('/edit/{id}', 'CustomerSupplierController@edit')->name('edit');
        Route::post('/update/{id}', 'CustomerSupplierController@update')->name('update');
        Route::get('/destroy/{id}', 'CustomerSupplierController@destroy')->name('destroy');
    });


    /*Sales*/
    Route::group(['as' => 'sale.', 'prefix' => 'sale', 'namespace' => 'Sale'], function () {
        Route::get('/view/sale', 'SaleController@index')->name('index');
        Route::get('/create', 'SaleController@create')->name('create');

        //ajax route
        Route::get('/show/product/detail/for/adding/cart/by/modal', 'Ajax\AjaxController@showProductDetailsByModalForAddingCart')->name('showProductDetailsByModalForAddingCart');
        Route::post('/add/to/cart/from/modal', 'Ajax\AjaxController@addToCartFromModal')->name('addToCartFromModal');
        Route::get('show/cart/if/existing', 'Ajax\AjaxController@showCartIfExisting')->name('showCartIfExisting');
        Route::get('remove/single/cart', 'Ajax\AjaxController@removeSingleCart')->name('removeSingleCart');
        Route::get('remove/all/data/from/cart', 'Ajax\AjaxController@removeAllDataFromCart')->name('removeAllDataFromCart');
        Route::get('change/quantity/from/cart', 'Ajax\AjaxController@changeQuantityFromCart')->name('changeQuantityFromCart');

        // Edit
        Route::get('/show/product/detail/for/editing/cart/by/modal', 'Ajax\AjaxController@showProductDetailsByModalForEditingCart')->name('showProductDetailsByModalForEditingCart');
        Route::post('edit/add/to/cart/from/modal', 'Ajax\AjaxController@editAddToCartFromModal')->name('editAddToCartFromModal');
        //payment
        Route::get('/show/payment/modal/for/submiting/cart', 'Ajax\AjaxController@showPaymentModalForSubmitingCart')->name('showPaymentModalForSubmitingCart');

        Route::post('store/add/to/cart/with/payment', 'Ajax\AjaxController@storeAddToCartWithPayment')->name('storeAddToCartWithPayment');
    });



    /**Sale Pos */
    Route::group(['as' => 'sale.', 'prefix' => 'sale', 'namespace' => 'Backend\Sale'], function () {
        //19.02.2021
        Route::get('/create/pos', 'SaleController@createPos')->name('createPos');
        Route::post('store/from/add/to/cart/with/payment', 'SaleController@storeFromAddToCartWithPayment')->name('storeFromAddToCartWithPayment');

        Route::get('/create/show/modal', 'AddToCartController@createShowModal')->name('createShowModal');
        Route::get('/check/qty/available/or/not', 'AddToCartController@checkQtyAvailableByStockIdPvId')->name('checkQtyAvailableByStockIdPvId');

        /* Add To cart */
        Route::post('/add/to/cart/from/modal', 'AddToCartController@addToCartWhenSubmitingFromModal')->name('addToCartWhenSubmitingFromModal');
        Route::get('when/cart/is/exist', 'AddToCartController@whenCartIsExist')->name('whenCartIsExist');
        Route::get('change/quantity/from/cart/list', 'AddToCartController@changeQuantityFromCartList')->name('changeQuantityFromCartList');

        Route::get('remove/single/data/from/cart', 'AddToCartController@removeSingleDataFromCart')->name('removeSingleDataFromCart');
        Route::get('remove/all/data/from/create/cart', 'AddToCartController@removeAllDataFromCreateCart')->name('removeAllDataFromCreateCart');
        //payment
        Route::get('/popup/payment/modal/before/submiting/from/cart', 'AddToCartController@popupPaymentModalBeforeSubmitingFromCart')->name('popupPaymentModalBeforeSubmitingFromCart');

        /* Route::post('store/from/add/to/cart/with/payment','AddToCartController@storeFromAddToCartWithPayment')->name('storeFromAddToCartWithPayment'); */
        /* Add To cart */
    });




    /*Purchae Product*/
    Route::group(['as' => 'admin.', 'prefix' => 'purchase', 'namespace' => 'Backend\Purchase'], function () {
        Route::resource('purchase', 'PurchaseController');
        //get stock by stock type id
        Route::get('get/stock/by/stock/id', 'PurchaseController@getStockByStockId')->name('purchase.product.getStockByStockId');

        //add to cart controller
        Route::get('card/if/exist', 'AddToCartController@purchaseCartIfExist')->name('purchase.product.purchaseCartIfExist');

        Route::get('search/for/add/to/cart', 'AddToCartController@searchingProductByAjax')->name('purchase.product.searchingProductByAjax');
        Route::get('add/to/cart/search/result/for/single', 'AddToCartController@addToCartSingleProductByResultOfSearchingByAjax')->name('purchase.product.addToCartSingleProductByResultOfSearchingByAjax');

        Route::get('pull/for/add/to/cart', 'AddToCartController@pullingProductByAjax')->name('purchase.product.pullingProductByAjax');
        Route::get('update/single/cart/', 'AddToCartController@updateSinglePurchaseCartByAjax')->name('purchase.product.updateSinglePurchaseCartByAjax');


        // remove cart
        Route::get('remove/single/purchase/cart', 'AddToCartController@removeSinglePurchaseCart')->name('purchase.product.removeSinglePurchaseCart');
        Route::get('remove/all/purchase/cart', 'AddToCartController@removeAllPurchaseCart')->name('purchase.product.removeAllPurchaseCart');
    });

    /*Received Purchae Product*/
    Route::group(['as' => 'admin.purchase.product.', 'prefix' => 'purchase/product', 'namespace' => 'Backend\ReceivedPurchaseProduct'], function () {
        Route::resource('receive', 'ReceivedPurchaseProductController');

        //add to cart controller
        Route::get('receive/card/if/exist', 'AddToCartController@purchaseProductReceiveCartIfExist')->name('receive.purchaseProductReceiveCartIfExist');
        Route::get('receive/search/for/add/to/cart', 'AddToCartController@searchAndAddToCart')->name('receive.searchAndAddToCart');
        Route::get('receive/search/for/update/add/to/cart', 'AddToCartController@updatePurchaseReceiveAddToCart')->name('receive.updatePurchaseReceiveAddToCart');

        // remove cart
        Route::get('receive/remove/single/purchase/cart', 'AddToCartController@removeSinglepurchaseProductReceiveCart')->name('receive.removeSinglepurchaseProductReceiveCart');
        Route::get('receive/remove/all/purchase/cart', 'AddToCartController@removeAllpurchaseProductReceiveCart')->name('receive.removeAllpurchaseProductReceiveCart');
    });


    /*Stock Manage*/
    Route::group(['as' => 'admin.', 'prefix' => 'admin/stock', 'namespace' => 'Backend\Stock'], function () {
        Route::resource('main-stock', 'MainStockController');
        Route::resource('primary-stock', 'PrimaryStockController');
        Route::resource('secondary-stock', 'SecondaryStockController');
    });


    /* Payment Method */
    Route::group(['as' => 'admin.', 'prefix' => 'admin/payment', 'namespace' => 'Backend\Payment'], function () {
        Route::resource('paymentMethod', 'PaymentMethodController');
    });
    /* Account */
    Route::group(['as' => 'admin.', 'prefix' => 'admin/payment', 'namespace' => 'Backend\Payment'], function () {
        Route::resource('account', 'AccountController');
    });

    /* Bank */
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Payment'], function () {
        Route::resource('bank', 'BankController');
    });

    /* Payment History */
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Payment'], function () {
        Route::resource('payment', 'PaymentHistoryController');
    });

    /* Expense Category */
    Route::group(['as' => 'admin.', 'prefix' => 'admin/expense', 'namespace' => 'Backend\Expense'], function () {
        Route::resource('category', 'ExpenseCategoryController');
    });

    /* Expense Final */
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Expense'], function () {
        Route::resource('expense-final', 'ExpenseFinalController');
    });

    /* Expense Detail */
    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Expense'], function () {
        Route::resource('expense-detail', 'ExpenseDetailController');
    });



    /**
     * Developer: Bappi Saha
     * Transaction  Start
     */

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Backend\Transaction'], function () {
        Route::resource('transaction-type', 'TransactionTypeController');
        Route::resource('transaction-category', 'TransactionCategoryController');
        Route::resource('transaction-detail', 'TransactionDetailController');
        Route::get("transaction-detail/transaction-categories/{transactionType}", "TransactionDetailController@getTransactionCategory")->name("transaction-categories");
    });

    Route::group(['as' => "admin.", "prefix" => "admin", "namespace" => "Backend\Stock"], function () {
        Route::get("transfer-stock/{primaryStock}", "StockTransferController@getStock")->name('transfer-stock');
        Route::get("transfer-stock-secondary/{secondaryStock}", "StockTransferController@getStockSecondary")->name('transfer-stock-secondary');
        Route::post("transfer-stock", "StockTransferController@transfer")->name('transfer-stock');
        Route::get("transfer-stock/stocks/{stock_type}", "StockTransferController@getStocks")->name('stocks');
        // admin/transfer-stock/stock_type
    });


    /**
     * Developer: Bappi Saha
     * Transaction  End
     */
});
