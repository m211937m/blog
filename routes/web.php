<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Article_adminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
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



Route::group([
    'controller' => UserController::class,
],
    function(){
        //انشاء حساب
        Route::get('rejecter',                                  'rejecter')                     ->name('rejecter');
        Route::post('rejecter/account',                         'create')                       ->name('rejecter_account');

        //تسجيل دخول لجميع المستخدمين
        Route::get('/',                                         'login')                        ->name('login');
        Route::post('check',                                    'check_email')                  ->name('check_email');

        // عرض الصفحة الرئيسية للمستخدم
        Route::get('home/{id}',                                 'home')                         ->name('home');
        Route::get('home/artical/show/{id}/{artical_id}',       'artical_show')                 ->name('home_artical_show');
        Route::get('home/categore/{id}/{categore_id}',          'categoress')                   ->name('categore');
        Route::get('home/flow/{id}/{artical_id}',               'create_flow')                  ->name('create_flow');
        Route::get('home/unflow/{id}/{artical_id}',             'unflow')                       ->name('unflow');

        //عرض المستخدمين
        Route::get('users',                                     'index')                        ->name('users');
        Route::get('users/credit/{id}',                         'credit')                       ->name('users_credit');
        Route::get('users/delete',                              'delete')                       ->name('users_delete');
    });

//عرض وانشاء وتعديل وحذف ناشر
Route::group([
    'prefix' => 'admin/publisher',
    'controller' => PublisherController::class,
    ],
    function(){
        Route::get('/',                'index')    ->name('publisher_view');
        Route::get('/add',            'add')      ->name('publisher_add');
        Route::get('/delete/{id}',    'delete')   ->name('publisher_delete');
        Route::post('/create',        'create')   ->name('publisher_create');
        Route::get('/edit/{id}',      'edit')     ->name('publisher_edit');
        Route::post('/update',        'update')   ->name('publisher_update');
    });

//الفئات
Route::group([
    'prefix' => 'admin/category',
    'controller' => CategoryController::class,
    ],
    function(){
        Route::get('/',                'index')    ->name('category_view');
        Route::get('/add',             'add')      ->name('category_add');
        Route::get('/edit/{id}',       'edit')     ->name('category_edit');
        Route::get('/delete/{id}',     'delete')   ->name('category_delete');
        Route::post('/update',         'update')   ->name('category_update');
        Route::post('/create',         'create')   ->name('category_create');
});

Route::group([
    'prefix' => 'publisher/article',
    'controller' => ArticleController::class,
],
function(){
        //المقالات لناشر
        Route::get('/{id}',                     'index')            ->name('article');
        Route::get('/add/{id}',                 'add')              ->name('article_add');
        Route::get('/show/{id}',                'show')             ->name('article_show');
        Route::get('/delete/{id}',              'delete')           ->name('article_delete');
        Route::get('/edit/{id}',                'edit')             ->name('article_edit');
        Route::post('/update',                  'update')           ->name('article_update');
        Route::post('/create',                  'create')           ->name('article_create');

        //عرض طلبات لناشر
        Route::get('/request/{id}',            'request')           ->name('article_request');
        Route::get('/request/delete/{id}',     'request_delete')    ->name('article_request_delete');
});


// المقالات للمدير

Route::group([
    'prefix' => 'admin',
    'controller' => Article_adminController::class,
    ],
    function(){
        Route::get('/article/show/{id}',                'article_show')             ->name('admin_article_show');
        Route::get('/article/delete/{id}',              'article_delete')           ->name('admin_article_delete');
        Route::get('/control',                          'control')                  ->name('admin_control');
        Route::get('/article',                          'index')                    ->name('admin_article');
        Route::get('/artical/request',                  'show_request_artical')     ->name('show_request');
        Route::get('/show/artical/{id}',                'show_artical')             ->name('show_artical');
        Route::get('/restrict',                         'show_restrict')            ->name('admin_show_restrict');
        Route::get('/restrict/{id}',                    'restrict')                 ->name('admin_restrict');
        Route::get('/Lifting_a_restriction/{id}',       'Lifting_a_restriction')    ->name('admin_Lifting_a_restriction');
        Route::get('/approve_on_artical/{id}',          'approve_on_artical')       ->name('admin_approve_on_artical');
        Route::get('/reject_artical/{id}',              'reject_artical')           ->name('admin_reject_artical');
        Route::get('/approve_deletion/{id}',            'approve_deletion')         ->name('admin_approve_deletion');
        Route::get('/refusal_to_delete/{id}',           'refusal_to_delete')        ->name('admin_refusal_to_delete');
        Route::get('/approval_of_an_amendment/{id}',    'approval_of_an_amendment') ->name('admin_approval_of_an_amendment');
        Route::get('/refusal_Amendment/{id}',           'refusal_Amendment')        ->name('admin_refusal_Amendment');

});


