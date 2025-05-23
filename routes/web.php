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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// User
Route::get('user', 'UserController@index');
Route::post('store_user','UserController@store');
Route::post('update_user/{id}','UserController@update');
Route::post('deactivate_user/{id}','UserController@deactivate');
Route::post('activate_user/{id}','UserController@activate');

// Company
Route::get('company', 'CompanyController@index');
Route::post('store_company','CompanyController@store');
Route::post('update_company/{id}','CompanyController@update');
Route::post('deactivate_company/{id}','CompanyController@deactivate');
Route::post('activate_company/{id}','CompanyController@activate');

// Department
Route::get('department', 'DepartmentController@index');
Route::post('store_department','DepartmentController@store');
Route::post('update_department/{id}','DepartmentController@update');
Route::post('deactivate_department/{id}','DepartmentController@deactivate');
Route::post('activate_department/{id}','DepartmentController@activate');

// Project
Route::get('projects', 'ProjectController@index');
Route::get('show_project/{id}', 'ProjectController@show');
Route::post('store_project','ProjectController@store');
Route::post('update_project/{id}','ProjectController@update');

// Board
Route::post('add-column', 'BoardController@store');
Route::post('update-column/{id}', 'BoardController@update');
Route::post('delete-column/{id}','BoardController@destroy');

// Task
Route::post('store-project-task', 'ProjectTaskController@store');
Route::post('update-project-task/{id}','ProjectTaskController@update');
Route::get('show-project-task/{id}','ProjectTaskController@show');
Route::post('update-task-progress/{id}','ProjectTaskController@updateProgress');

// Comments
Route::post('comment', 'CommentController@store');
Route::post('update-comment/{id}', 'CommentController@update');
Route::post('delete-comment/{id}', 'CommentController@destroy');

// System Change Request
Route::get('system-change-request', 'SystemChangeRequestController@index');
Route::get('show-system-change-request/{id}', 'SystemChangeRequestController@show');
Route::get('create_scrf', 'SystemChangeRequestController@create');
Route::post('store-system-change-request','SystemChangeRequestController@store');
Route::post('update-system-change-request/{id}','SystemChangeRequestController@update');
Route::post('cancel-system-change-request/{id}','SystemChangeRequestController@cancel');
Route::get('print-system-change-request/{id}','SystemChangeRequestController@printScrf');

// For Approval SCRF
Route::get('for-approval', 'ForApprovalController@index');
Route::post('approve-scrf/{id}','ForApprovalController@approve');
Route::post('reject-scrf/{id}','ForApprovalController@reject');