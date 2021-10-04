<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    Config::set('database.connections.pgsql.schema', 'educo');
    Config::set('database.migrations', 'educo');
    DB::unprepared("
        CREATE SCHEMA educo;
        SET search_path to educo;
    ");
    Artisan::call('migrate');
    $schema = Config::get('database.connections.pgsql.schema');
    dd($schema);
//    DB::table('posts')->where('name', 'xxx')->groupBy()->sum();
});


Route::get('user', [TestController::class, 'index'])->middleware('schema_company')->name('test.schema');
