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
use App\student;
use App\User;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/add_user', function(){
	$user = new User;
	$user->id = '123123';
	$user->l_name = 'Yusaff';
	$user->f_name = 'Celine';
	$user->m_name = 'Makafefe';
	$user->gender  = 'Female';
	$user->address = 'Quezon city, idk';
	$user->email  = 'staff@yahoo.com';
	$user->password = bcrypt('admin');
	$user->role_id = 1;
	$user->save();
});

Route::post('/loginVerify', ['as'=> 'loginVerify', 'uses'=> 'authController@loginVerify']);

Route::get('/admin-panel', ['as'=> 'admin', 'uses'=> 'admin@index']);
Route::get('/logout', ['as'=> 'logout', 'uses'=> 'authController@logout']);

Route::get('/admin-student', ['as'=> 'admin-student', 'uses'=> 'admin@student']);
Route::get('/admin-pc', ['as'=> 'admin-pc', 'uses'=> 'admin@pc']);
Route::get('/admin-staff', ['as'=> 'admin_staff', 'uses'=> 'admin@admin_staff']);
Route::post('/admin-add-studentCheck', ['as'=> 'studentCheck', 'uses'=> 'admin@studentCheck']);
Route::post('/admin-add-pc', ['as'=> 'addPc', 'uses'=> 'admin@addPc']);
Route::post('/admin-add-staff', ['as'=> 'add_staff', 'uses'=> 'admin@add_staff']);
Route::get('/admin-student-info/{student_id}', ['as'=> 'student_info', 'uses'=> 'admin@student_info']);
Route::get('/admin-pc-info/{pc_id}', ['as'=> 'pc_info', 'uses'=> 'admin@pc_info']);


Route::get('/staff-panel', ['as'=> 'staff', 'uses'=> 'staff@index']);
Route::get('/staff-login', ['as'=> 'staff_login', 'uses'=> 'staff@staff_login']);
Route::get('/staff-change-password', ['as'=> 'change_password', 'uses'=> 'staff@change_password']);
Route::get('/staff-check-balance', ['as'=> 'check_balance', 'uses'=> 'staff@check_balance']);
Route::get('/staff-report', ['as'=> 'staff_report', 'uses'=> 'staff@staff_report']);
Route::get('/staff-logout', ['as'=> 'staff_logout', 'uses'=> 'staff@staff_logout']);

Route::post('/staff-student-check', function(Illuminate\Http\Request $request){
	
	$student = Student::where('barcode', $request['barcode'])->first();
	if(!$student){
		return response()->json(['profile_path'=>'404.jpg', 'lname'=> '', 'fname'=> '', 'mname'=> '']);
	}
	return response()->json($student);
})->name('student_check');

Route::post('staff-login-student', [
	'as'=> 'login_student',
	'uses'=> 'staff@login_student'
]);
Route::post('staff-logout-student', [
	'as'=> 'logout_student',
	'uses'=> 'staff@logout_student'
]);

Route::post('/staff-student-balance', function(Illuminate\Http\Request $request){
	$student = Student::where('barcode', $request['barcode'])->first();
	if(!$student){
		return response()->json(false);
	}
	$balance = $student->time->time;
	return response()->json($balance);
})->name('student_balance');

Route::get('/admin-report', [
	'as'=> 'admin_report',
	'uses'=> 'admin@admin_report'
]);

Route::get('/admin-pc/{room_id}', [
	'as'=> 'room_delete',
	'uses'=> 'admin@room_delete'
]);
Route::get('/admin-student/{student_id}', [
	'as'=> 'student_delete',
	'uses'=> 'admin@student_delete'
]);
Route::get('/admin-staff/{staff_id}', [
	'as'=> 'staff_delete',
	'uses'=> 'admin@staff_delete'
]);