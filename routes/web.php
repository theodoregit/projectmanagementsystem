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
    return view('login');
});

Auth::routes();


//owner
Route::prefix('/project')->middleware(['project'])->group(function(){
    Route::get('/dashboard', 'ProjectController@index')->name('dashboard');
    Route::get('/add-project', 'ProjectController@addProject')->name('add-project');
    Route::get('/project-tasks', 'ProjectController@viewTasks')->name('project-tasks');
    Route::get('/all-projects', 'ProjectController@allProjects')->name('all-projects');
    Route::post('/add-project', 'ProjectController@store')->name('add-project.submit');
    Route::post('/create-tasks', 'ProjectController@createTask')->name('create-tasks');
    Route::post('/mark-flag', 'ProjectController@markFlag')->name('mark-flag');
});

//member
Route::prefix('/member')->middleware(['member'])->group(function(){
    Route::get('/dashboard', 'MemberController@index')->name('member.dashboard');
    Route::get('/my-projects', 'MemberController@myProjects')->name('member.my-projects');
    Route::get('/my-tasks/{id}', 'MemberController@myTasks')->name('member.my-tasks');
    Route::get('/update-status/{id}/{projecttitle}', 'MemberController@edit')->name('member.update-status');
    Route::post('/update-status/{id}/{projecttitle}', 'MemberController@updateTask')->name('member.update-status.submit');
});

//leader
Route::prefix('/leader')->middleware(['leader'])->group(function(){
    Route::get('/dashboard', 'LeaderController@index')->name('leader.dashboard');
    Route::get('/my-projects', 'LeaderController@myProjects')->name('leader.my-projects');
    Route::get('/project/{id}', 'LeaderController@openProject')->name('leader.project');
    Route::post('/create-tasks', 'LeaderController@createTask')->name('leader.create-tasks');
    Route::get('/my-tasks/{id}', 'LeaderController@myTasks')->name('leader.my-tasks');
    Route::get('/update-status/{id}/{projecttitle}', 'LeaderController@edit')->name('leader.update-status');
    Route::post('/update-status/{id}/{projecttitle}', 'LeaderController@updateTask')->name('leader.update-status.submit');
    Route::get('/edit-task/{id}', 'LeaderController@editTask')->name('leader.edit-task');
    Route::post('/edit-task', 'LeaderController@updateTask')->name('leader.edit-task.submit');
    Route::post('/mark-task', 'LeaderController@markTask')->name('leader.mark-task.submit');
});

// Route::get('/home', 'HomeController@index')->name('home');
