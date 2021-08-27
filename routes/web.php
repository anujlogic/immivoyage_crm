<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ManagementTeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IeltsController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\CallLeadsController;
use App\Http\Controllers\CaipsController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\IeltsTestController;
use App\Http\Controllers\RegisterViaLinkController;
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

// COMMON ROUTES //
	Route::get('client', [ClientController::class, 'index'])->middleware(['role']);
	Route::get('client/create', [ClientController::class, 'create'])->name('client.create');
	Route::post('store', [ClientController::class, 'store'])->middleware(['role']);
	Route::get('client/edit/{id}', [ClientController::class, 'edit'])->middleware(['role'])->name('client.edit');
	Route::post('client/update', [ClientController::class, 'update'])->middleware(['role'])->name('client.update');
	Route::get('client/delete/{id}', [ClientController::class, 'delete'])->middleware(['role'])->name('client.delete');
	Route::get('client/doc/{id}', [ClientController::class, 'view_document_detail'])->name('client.doc');
	Route::get('management/list', [ManagementTeamController::class, 'index'])->middleware(['role'])->name('management.list');
	Route::get('management/create', [ManagementTeamController::class, 'create'])->middleware(['role'])->name('management.create');
	Route::post('management/store', [ManagementTeamController::class, 'store'])->middleware(['role'])->name('management.store');
	Route::get('management/edit/{id}', [ManagementTeamController::class, 'edit'])->middleware(['role'])->name('management.edit');
	Route::post('management/update', [ManagementTeamController::class, 'update'])->middleware(['role'])->name('management.update');
	Route::get('management/delete/{id}', [ManagementTeamController::class, 'delete'])->middleware(['role'])->name('management.delete');
	Route::get('/profile', [AdminController::class, 'profile'])->middleware(['role'])->name('login.profile');
	Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['role'])->name('admin.dashboard');
	Route::post('/update_status', [AdminController::class, 'update_status'])->middleware(['role'])->name('update.status');

//  USER ROUTES  //
	Route::get('/register', [ClientController::class, 'client_register_view'])->name('user.register');
	Route::post('/register/store', [ClientController::class, 'Clint_register_store'])->name('register.store');
	Route::post('/user/index', [ClientController::class, 'user_index'])->name('user.index');
	Route::get('/user/create', [UserController::class, 'user_create'])->name('user.create');
	Route::get('/user/edit/{id}', [UserController::class, 'user_edit'])->name('user.edit');
	Route::post('/user/update', [UserController::class, 'user_update'])->name('user.update');
	Route::get('user/doc/{id}', [UserController::class, 'view_user_detail'])->name('user.doc');
	Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');
	Route::post('/forget-password', [UserController::class, 'forget_password'])->name('user.forget-pswd');

// IELTS ROUTES  //
	Route::get('/ielts/list',[IeltsController::class, 'index'])->name('ilets.list');
	Route::get('/ielts/create',[IeltsController::class, 'create'])->name('ilets.create');
	Route::post('/ielts/store',[IeltsController::class, 'store'])->name('ilets.store');
	Route::get('/ielts/edit/{id}',[IeltsController::class, 'edit'])->name('ielts.edit');
	Route::post('/ielts/update',[IeltsController::class, 'update'])->name('ielts.update');
	Route::get('/ielts/delete/{id}',[IeltsController::class, 'delete'])->name('ielts.delete');

// APPLICANT ROUTES  //
	Route::get('/applicant/list',[ApplicantController::class, 'index'])->name('applicant.list');
	Route::get('/applicant/create',[ApplicantController::class, 'create'])->name('applicant.create');
	Route::get('/applicant/edit/{id}',[ApplicantController::class, 'edit'])->name('applicant.edit');
	Route::post('/applicant/update',[ApplicantController::class, 'update'])->name('applicant.update');
	Route::get('/applicant/delete/{id}',[ApplicantController::class, 'delete'])->name('applicant.delete');
	Route::post('/get-university-by-country',[ApplicantController::class, 'getUniversity'])->name('country.university');
	Route::post('/get-coursetype-by-university',[ApplicantController::class, 'getCourseType'])->name('university.coursetype');
	Route::post('/get-courses-by-coursetype',[ApplicantController::class, 'getCourses'])->name('coursetype.courses');
	Route::post('/store/application',[ApplicantController::class, 'store_application'])->name('store.application');
	Route::get('/apply/university/{id}',[ApplicantController::class, 'apply_university'])->name('applicant.university');

//  INTAKE ROUTES  //
	Route::get('/apply/intake/{id}',[ApplicantController::class, 'apply_intake'])->name('apply.intake');
	Route::post('/get-campus-by-intake',[ApplicantController::class, 'getCampus'])->name('course.campus');
	Route::post('/intake/update',[ApplicantController::class, 'intake_update'])->name('intake.update');
	Route::get('/selected/application/{id}',[ApplicantController::class, 'selected_application'])->name('selected.application');
	Route::get('/application/checkout/{id}',[ApplicantController::class, 'application_checkout'])->name('application.checkout');
	Route::post('/student_detail/update',[ApplicantController::class, 'student_detail_update'])->name('student_detail.update');

//  APPLICANT GALLERY ROUTES  //
	Route::post('gallery',[ApplicantController::class, 'fileStore'])->name('gallery');
	Route::post('image/delete',[ApplicantController::class, 'fileDestroy'])->name('delete.url');

//  CALL LEADS ROUTS  //
	Route::get('/call/list',[CallLeadsController::class, 'index'])->name('call.list');
	Route::get('/call/create',[CallLeadsController::class, 'create'])->name('call.create');
	Route::post('/call/store',[CallLeadsController::class, 'store'])->name('call.store');
	Route::get('/call/edit/{id}',[CallLeadsController::class, 'edit'])->name('call.edit');
	Route::post('/call/update',[CallLeadsController::class, 'update'])->name('call.update');
	Route::get('/call/delete/{id}',[CallLeadsController::class, 'delete'])->name('call.delete');
	Route::get('/call/detail/{id}',[CallLeadsController::class, 'call_detail'])->name('call.detail');
	Route::post('/update/enroll',[CallLeadsController::class, 'enroll_update'])->name('enroll.update');

// 	CAIPS NOTES  //
	Route::get('/caips/list',[CaipsController::class, 'index'])->name('caips.list');
	Route::get('/caips/create',[CaipsController::class, 'create'])->name('caips.create');
	Route::post('/caips/store',[CaipsController::class, 'store'])->name('caips.store');
	Route::get('/caips/edit/{id}',[CaipsController::class, 'edit'])->name('caips.edit');
	Route::post('/caips/update',[CaipsController::class, 'update'])->name('caips.update');
	Route::get('/caips/delete/{id}',[CaipsController::class, 'delete'])->name('caips.delete');

//  TUTOR ROUTES //
	Route::get('/tutor/list',[TutorController::class, 'index'])->name('tutor.list');
	Route::get('/tutor/create',[TutorController::class, 'create'])->name('tutor.create');
	Route::post('/tutor/store',[TutorController::class, 'store'])->name('tutor.store');
	Route::get('/tutor/edit/{id}',[TutorController::class, 'edit'])->name('tutor.edit');
	Route::post('/tutor/update',[TutorController::class, 'update'])->name('tutor.update');
	Route::get('/tutor/delete/{id}',[TutorController::class, 'delete'])->name('tutor.delete');
	Route::get('/edit/test/remarks/{id}',[TutorController::class, 'edit_test_remarks'])->name('edit.test.remarks');
	Route::post('/tutor/update/remarks',[TutorController::class, 'tutor_update_marks'])->name('tutor.update.marks');

// IELTS TEST ROUTE //
	Route::get('/ielts/test/list',[IeltsTestController::class, 'index'])->name('ielts.test.list');
	Route::get('/ielts/test/create',[IeltsTestController::class, 'create'])->name('ielts.test.create');
	Route::post('/ielts/test/store',[IeltsTestController::class, 'store'])->name('ielts.test.store');
	Route::get('/ielts/test/edit/{id}',[IeltsTestController::class, 'edit'])->name('ielts.test.edit');
	Route::post('/ielts/test/update',[IeltsTestController::class, 'update'])->name('ielts.test.update');
	Route::get('/ielts/test/delete/{id}',[IeltsTestController::class, 'delete'])->name('ielts.test.delete');
	Route::get('/ielts/test/assign/{id}',[IeltsTestController::class, 'assign_test'])->name('ielts.test.assign');
	Route::get('/ielts/test/answer/{id}',[IeltsTestController::class, 'assign_test_answer'])->name('ielts.test.answer');
	Route::post('/ielts/test/update',[IeltsTestController::class, 'update'])->name('ielts.test.update');
	Route::post('/update/test/answer',[IeltsTestController::class, 'update_test_answer'])->name('update.test.answer');
	Route::get('/test/upload/view',[IeltsTestController::class, 'test_upload_page'])->name('test.upload.view');
	Route::post('/student/test/upload',[IeltsTestController::class, 'student_test_upload'])->name('student.test.upload');
	Route::get('/test/sheet/{id}',[IeltsTestController::class, 'test_sheet'])->name('test.sheet');
	Route::post('/examinee/result/store',[IeltsTestController::class, 'examinee_result_store'])->name('examinee.result.store');	
	Route::get('/examinee/result/thanku',[IeltsTestController::class, 'thankyou'])->name('examinee.result.thanku');
	Route::get('/answer/sheet/{id}',[IeltsTestController::class, 'answer_sheet'])->name('answer.sheet');

// Send link to remote Guest user
	Route::get('/link/guest/registration', [RegisterViaLinkController::class, 'send_link'])->name('link.guest.registration');	
	Route::post('/guest/registration', [RegisterViaLinkController::class, 'guest_registration'])->name('guest.registration');	
