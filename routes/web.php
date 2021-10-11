<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CategoriesServicesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\SourcesController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

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
    return view('fontend.index');
})->name('trang-chu');

//Route::get('/admin', function () {
//    return view('login');
//})->name('login');


Route::prefix('/admin')->group(function () {

    Route::get('/', function () {
        return view('home');
    })->name('Dashboad');

    /**
     * Route User
     */
    Route::prefix('/users')->group(function () {
        Route::get('/', [UsersController::class, 'index']
        )->name('users.index');
    });

    /**
     * Route Client
     */
    Route::prefix('/clients')->group(function () {
        Route::get(
            '/',
            [ClientsController::class, 'index']
        )->name('clients.index');
    });


    /**
     * Route Sources
     */
    Route::prefix('/sources')->group(function () {
        Route::get(
            '/',
            [SourcesController::class, 'index']
        )->name('sources.index');

        Route::get(
            '/create',
            [SourcesController::class, 'create']
        )->name('sources.create');

        Route::post(
            '/store',
            [SourcesController::class, 'store']
        )->name('sources.store');

        Route::get(
            '/edit/{id}',
            [SourcesController::class, 'edit']
        )->name('sources.edit');

        Route::post(
            '/update/{id}',
            [SourcesController::class, 'update']
        )->name('sources.update');

        Route::get(
            '/delete/{id}',
            [SourcesController::class, 'delete']
        )->name('sources.delete');
    });


    /**
     * Route Setting
     */
    Route::prefix('/settings')->group(function () {
        Route::get(
            '/',
            [SettingsController::class, 'index']
        )->name('settings.index');

        Route::get(
            '/create',
            [SettingsController::class, 'create']
        )->name('settings.create');

        Route::post(
            '/store',
            [SettingsController::class, 'store']
        )->name('settings.store');

        Route::get(
            '/edit/{id}',
            [SettingsController::class, 'edit']
        )->name('settings.edit');

        Route::post(
            '/update/{id}',
            [SettingsController::class, 'update']
        )->name('settings.update');

        Route::get(
            '/delete/{id}',
            [SettingsController::class, 'delete']
        )->name('settings.delete');
    });


    /**
     * Route Channels
     */
    Route::prefix('/channels')->group(function () {
        Route::get(
            '/',
            [ChannelsController::class, 'index']
        )->name('channels.index');

        Route::get(
            '/create',
            [ChannelsController::class, 'create']
        )->name('channels.create');

        Route::post(
            '/store',
            [ChannelsController::class, 'store']
        )->name('channels.store');

        Route::get(
            '/edit/{id}',
            [ChannelsController::class, 'edit']
        )->name('channels.edit');

        Route::post(
            '/update/{id}',
            [ChannelsController::class, 'update']
        )->name('channels.update');

        Route::get(
            '/delete/{id}',
            [ChannelsController::class, 'delete']
        )->name('channels.delete');
    });

    /**
     * Route Roles
     */
    Route::prefix('/roles')->group(function () {
        Route::get(
            '/',
            [RolesController::class, 'index']
        )->name('roles.index');

        Route::get(
            '/create',
            [RolesController::class, 'create']
        )->name('roles.create');

        Route::post(
            '/store',
            [RolesController::class, 'store']
        )->name('roles.store');

        Route::get(
            '/edit/{id}',
            [RolesController::class, 'edit']
        )->name('roles.edit');

        Route::post(
            '/update/{id}',
            [RolesController::class, 'update']
        )->name('roles.update');

        Route::get(
            '/delete/{id}',
            [RolesController::class, 'delete']
        )->name('roles.delete');
    });


    /**
     * Route Place
     */
    Route::prefix('/places')->group(function () {
        Route::get(
            '/',
            [PlacesController::class, 'index']
        )->name('places.index');

        Route::get(
            '/create',
            [PlacesController::class, 'create']
        )->name('places.create');

        Route::post(
            '/store',
            [PlacesController::class, 'store']
        )->name('places.store');

        Route::get(
            '/edit/{id}',
            [PlacesController::class, 'edit']
        )->name('places.edit');

        Route::post(
            '/update/{id}',
            [PlacesController::class, 'update']
        )->name('places.update');

        Route::get(
            '/delete/{id}',
            [PlacesController::class, 'delete']
        )->name('places.delete');
    });

    /**
     * Route Service
     */
    Route::prefix('/services')->group(function () {
        Route::get(
            '/',
            [ServicesController::class, 'index']
        )->name('services.index');
    });

    /**
     * Route Schedule
     */
    Route::prefix('/schedules')->group(function () {
        Route::get(
            '/',
            [SchedulesController::class, 'index']
        )->name('schedules.index');
    });

    /**
     * Route Tag
     */
    Route::prefix('/tags')->group(function () {
        Route::get(
            '/',
            [TagsController::class, 'index']
        )->name('tags.index');

        Route::get(
            '/create',
            [TagsController::class, 'create']
        )->name('tags.create');

        Route::post(
            '/store',
            [TagsController::class, 'store']
        )->name('tags.store');

        Route::get(
            '/edit/{id}',
            [TagsController::class, 'edit']
        )->name('tags.edit');

        Route::post(
            '/update/{id}',
            [TagsController::class, 'update']
        )->name('tags.update');

        Route::get(
            '/delete/{id}',
            [TagsController::class, 'delete']
        )->name('tags.delete');

    });

    /**
     * Route Categories Services
     */
    Route::prefix('/categoriesServices')->group(function () {
        Route::get(
            '/',
            [CategoriesServicesController::class, 'index']
        )->name('categoriesServices.index');

        Route::get(
            '/create',
            [CategoriesServicesController::class, 'create']
        )->name('categoriesServices.create');

        Route::post(
            '/store',
            [CategoriesServicesController::class, 'store']
        )->name('categoriesServices.store');

        Route::get(
            '/edit/{id}',
            [CategoriesServicesController::class, 'edit']
        )->name('categoriesServices.edit');

        Route::post(
            '/update/{id}',
            [CategoriesServicesController::class, 'update']
        )->name('categoriesServices.update');

        Route::get(
            '/delete/{id}',
            [CategoriesServicesController::class, 'delete']
        )->name('categoriesServices.delete');
    });

    /**
     * Route Menus
     */
    Route::prefix('/menus')->group(function () {
        Route::get(
            '/',
            [MenuController::class, 'index']
        )->name('menus.index');

        Route::get(
            '/create',
            [MenuController::class, 'create']
        )->name('menus.create');

        Route::post(
            '/store',
            [MenuController::class, 'store']
        )->name('menus.store');

        Route::get(
            '/edit/{id}',
            [MenuController::class, 'edit']
        )->name('menus.edit');

        Route::post(
            '/update/{id}',
            [MenuController::class, 'update']
        )->name('menus.update');

        Route::get(
            '/delete/{id}',
            [MenuController::class, 'delete']
        )->name('menus.delete');

        Route::get(
            '/recall/{id}',
            [MenuController::class, 'recall']
        )->name('menus.recall');

        Route::get(
            '/listReCall',
            [MenuController::class, 'listReCall']
        )->name('menus.listReCall');

        Route::get(
            '/unRecall/{id}',
            [MenuController::class, 'unRecall']
        )->name('menus.unRecall');
    });
});

