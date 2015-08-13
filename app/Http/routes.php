<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



use Intervention\Image\Facades\Image;



// группа ajax
Route::group(['as' => 'ajax::'], function () {
    Route::get('getBanksAutoCompleteArray', ['as' => 'getBanksAutoCompleteArray', 'uses' => 'AjaxController@getBanksAutoCompleteArray']);

    Route::post('ajax/admin/article/article', ['as' => 'addArticle', 'uses' => 'AjaxController@addArticle']);
    Route::get('ajax/admin/article/del', ['as' => 'delArticle', 'uses' => 'AjaxController@delArticle']);
    Route::post('ajax/admin/article/edit', ['as' => 'editArticle', 'uses' => 'AjaxController@editArticle']);

    Route::post('ajax/admin/new/new', ['as' => 'addNew', 'uses' => 'AjaxController@addNew']);
    Route::get('ajax/admin/new/del', ['as' => 'delNew', 'uses' => 'AjaxController@delNew']);
    Route::post('ajax/admin/new/edit', ['as' => 'editNew', 'uses' => 'AjaxController@editNew']);

    Route::post('ajax/admin/category/add', ['as' => 'addCategory', 'uses' => 'AjaxController@addCategory']);
});


// главаня
Route::get('/', [
    'as' => 'index', 'uses' => 'IndexController@index'
]);
// калькулятор
Route::get('kreditnyi_kalkulyator', [
    'as' => 'calc', 'uses' => 'IndexController@calc'
]);
// скоринг-тест
Route::get('solvency', [
    'as' => 'solvency', 'uses' => 'IndexController@solvency'
]);
// вопросы по кредитам
Route::get('question', [
    'as' => 'question', 'uses' => 'IndexController@question'
]);
// группа dictionary
Route::group(['as' => 'dictionary::'], function () {
    Route::get('dictionary', ['as' => 'index', 'uses' => 'DictionaryController@index']);
    Route::get('dictionary/{let}', ['as' => 'letter', 'uses' => 'DictionaryController@letter']);

});
// группа banks
Route::group(['as' => 'banks::'], function () {
    Route::get('banks', ['as' => 'index', 'uses' => 'BanksController@index']);
    Route::get('banks/{id}', ['as' => 'getOnId', 'uses' => 'BanksController@getOnId'])->where(['id' => '[\w-_]{1,255}']);
    Route::get('banks/{bankId}/{category}', ['as' => 'listBankCategoryOffer', 'uses' => 'OffersController@listBankCategoryOffer'])->where(['bankId' => '[a-z-_]+', 'category' => '[a-z-_]+']);

});
// группа offers
Route::group(['as' => 'offers::'], function () {
    Route::get('credit_offers', ['as' => 'index', 'uses' => 'OffersController@index']);
    Route::get('credit_offers/type/{category}', ['as' => 'category', 'uses' => 'OffersController@category'])->where(['category' => '[\w-_]{1,255}']);
    Route::get('credit_offers/{url}', ['as' => 'getOnUrl', 'uses' => 'OffersController@getOnUrl'])->where(['url' => '[\w-_]{1,255}']); // спорно
});
// группа promo
Route::group(['as' => 'promo::'], function () {
    // редирект go to
    Route::get('go/to/{id}/type/{type}', ['as' => 'go', 'uses' => 'PromoController@go'])->where(['id' => '^[0-9]{1,3}$', 'type' => '^[a-z]{1}$']);
    Route::get('oformit_zajavku_na_potrebitelskij_kredit_onlajn', ['as' => 'nal', 'uses' => 'PromoController@nal']);
    Route::get('zajavka_na_mikrozajm_onlajn', ['as' => 'micro', 'uses' => 'PromoController@micro']);
    Route::get('oformit_zajavku_na_kreditnuju_kartu_onlajn', ['as' => 'card', 'uses' => 'PromoController@card']);
    Route::get('oformit_zajavku_na_ipoteku_onlajn', ['as' => 'mort', 'uses' => 'PromoController@mort']);
    Route::get('oformit_zajavku_na_avtokredit_onlajn', ['as' => 'auto', 'uses' => 'PromoController@auto']);
    Route::get('vklad_v_bank_pod_procenty_onlajn', ['as' => 'hold', 'uses' => 'PromoController@hold']);
    Route::get('business_credit', ['as' => 'business', 'uses' => 'PromoController@business']);
});
// группа article
Route::group(['as' => 'article::'], function () {
    Route::get('info', ['as' => 'index', 'uses' => 'ArticleController@index']);
    Route::get('info/cat/{id}', ['as' => 'categoryId', 'uses' => 'ArticleController@categoryId'])->where(['id' => '^[0-9]{1,3}$']);
    Route::get('info/{url}', ['as' => 'article', 'uses' => 'ArticleController@article'])->where(['url' => '[\w-_]{1,255}']); // спорно
});
// группа new
Route::group(['as' => 'new::'], function () {
    Route::get('news', ['as' => 'index', 'uses' => 'NewController@index']);
    Route::get('news/cat/{id}', ['as' => 'categoryId', 'uses' => 'NewController@categoryId'])->where(['id' => '^[0-9]{1,3}$']);
    Route::get('news/{url}', ['as' => 'new', 'uses' => 'NewController@_new'])->where(['url' => '[\w-_]{1,255}']); // спорно
});
// группа admin | на все роуты группы - только залогиненные юзеры
Route::group(['as' => 'admin::', 'middleware' => 'auth'], function () {
    Route::get('admin', ['as' => 'index', 'uses' => 'AdminController@index']);
    Route::get('admin/article/add', ['as' => 'addArticle', 'uses' => 'AdminController@addArticle']);
    Route::get('admin/article/list', ['as' => 'listArticle', 'uses' => 'AdminController@listArticle']);
    Route::get('admin/article/edit/{id}', ['as' => 'editArticle', 'uses' => 'AdminController@editArticle']);

    Route::get('admin/new/add', ['as' => 'addNew', 'uses' => 'AdminController@addNew']);
    Route::get('admin/new/list', ['as' => 'listNew', 'uses' => 'AdminController@listNew']);
    Route::get('admin/new/edit/{id}', ['as' => 'editNew', 'uses' => 'AdminController@editNew']);

    Route::get('admin/category', ['as' => 'category', 'uses' => 'AdminController@category']);    



});

// Authentication routes...
Route::get('login', ['as' => 'login', 'uses' => 'AdminController@getLogin']);
Route::post('login',['as' => 'loginPost', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Роуты регистрации. Раскомментировать, если нужно добавить нового юзера
//Route::get('register', ['as' => 'registerGet', 'uses' => 'AdminController@getRegister']);
//Route::post('auth/register',['as' => 'registerPost', 'uses' => 'Auth\AuthController@postRegister']);
