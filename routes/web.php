<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Classrooms\ClassroomController;

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

Auth::routes();

Route::group(['middleware'=>['guest']],function(){
    Route::get('/', function()
    {
        return View('auth.login');
    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){

//        Route::get('/', function()
//        {
//            return View('dashboard');
//        });

        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['namespace'=>'Grades'], function (){
            Route::resource('Grades', 'App\Http\Controllers\Grades\GradeController');
        });

        Route::group(['namespace'=>'Classrooms'], function (){
            Route::resource('Classroom', 'App\Http\Controllers\Classrooms\ClassroomController');
            Route::post('delete_all', 'App\Http\Controllers\Classrooms\ClassroomController@delete_all')->name('delete_all');
            Route::post('Filter_Classes', 'App\Http\Controllers\Classrooms\ClassroomController@Filter_Classes')->name('Filter_Classes');
        });

        Route::group(['namespace'=>'Sections'], function (){
            Route::resource('Sections', 'App\Http\Controllers\Sections\SectionController');
            Route::get('/classes/{id}', 'App\Http\Controllers\Sections\SectionController@getclasses');
        });

        Route::group(['namespace'=>'Students'],function (){
            Route::resource('Students', 'App\Http\Controllers\Students\StudentController');
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
            Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
            Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
            Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
        });

        Route::group(['namespace' => 'Students'], function () {
            Route::resource('Promotion', 'App\Http\Controllers\Students\PromotionController');
        });

        Route::group(['namespace'=>'Teachers'], function (){
            Route::resource('Teachers', 'App\Http\Controllers\Teachers\TeacherController');
        });

        //======================================Parents============================================================
        Route::view('add_parent', 'livewire.show_Form');
});
