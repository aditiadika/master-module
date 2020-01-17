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

Route::middleware(['auth', 'impersonate'])->prefix('master')->group(function () {
    Route::get('/', 'MasterController@index');

    Route::namespace('Religion')->group(function () {
        Route::resource('/religion', 'ReligionController');
        Route::post('/religion-datatable', 'ReligionDatatableController@datatable')->name('religion.datatable');
    });

    Route::namespace('WorkingLocation')->group(function () {
        Route::resource('/working-location', 'WorkingLocationController');
        Route::post('/working-location-datatable', 'WorkingLocationDatatableController@datatable')->name('working-location.datatable');
    });

    Route::namespace('JobDivision')->group(function () {
        Route::resource('/job-division', 'JobDivisionController');
        Route::post('/job-division-datatable', 'JobDivisionDatatableController@datatable')->name('job-division.datatable');
    });

    Route::namespace('JobDepartment')->group(function () {
        Route::resource('/job-department', 'JobDepartmentController');
        Route::post('/job-department-datatable', 'JobDepartmentDatatableController@datatable')->name('job-department.datatable');
    });

    Route::namespace('JobLevel')->group(function () {
        Route::resource('/job-level', 'JobLevelController');
        Route::post('/job-level-datatable', 'JobLevelDatatableController@datatable')->name('job-level.datatable');
    });

    Route::namespace('JobPosition')->group(function () {
        Route::resource('/job-position', 'JobPositionController');
        Route::post('/job-position-datatable', 'JobPositionDatatableController@datatable')->name('job-position.datatable');
    });

    Route::namespace('Golongan')->group(function () {
        Route::resource('/golongan', 'GolonganController');
        Route::post('/golongan-datatable', 'GolonganDatatableController@datatable')->name('golongan.datatable');
    });

    Route::namespace('LeaveType')->group(function () {
        Route::resource('/leave-type', 'LeaveTypeController');
        Route::post('/leave-type-datatable', 'LeaveTypeDatatableController@datatable')->name('leave-type.datatable');
    });

    Route::namespace('EmployeeType')->group(function () {
        Route::resource('/employee-type', 'EmployeeTypeController');
        Route::post('/employee-type-datatable', 'EmployeeTypeDatatableController@datatable')->name('employee-type.datatable');
    });

    Route::namespace('WorkingShift')->group(function () {
        Route::resource('/working-shift', 'WorkingShiftController');
        Route::post('/working-shift-datatable', 'WorkingShiftDatatableController@datatable')->name('working-shift.datatable');
    });

    Route::namespace('MaritalStatus')->group(function () {
        Route::resource('marital-status', 'MaritalStatusController');
        Route::post('marital-status-datatable', 'MaritalStatusDatatableController@datatable')->name('marital-status.datatable');
    });
});
