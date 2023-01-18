<?php

use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\BranchController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DetailController;
use App\Http\Controllers\admin\FeatureController;
use App\Http\Controllers\admin\NoticeController;
use App\Http\Controllers\Frontend\AuthenticationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\SuggestionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\teacher\AttendanceController;
use App\Http\Controllers\teacher\AuthenticateController;
use App\Http\Controllers\teacher\CourseController;
use App\Http\Controllers\teacher\MarkController;
use App\Http\Controllers\teacher\StudentController;
use App\Http\Controllers\teacher\TeacherController;
use App\Http\Controllers\VisitorController;
use App\Models\Dashboard;
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
    return view('welcome');
});
Route::get('/register', [RegisterController::class, 'register'])->name('admin.register.view');
Route::post('/submit/register', [RegisterController::class, 'submitRegister'])->name('admin.register.submit');
Route::get('/login', [RegisterController::class, 'viewLogin'])->name('admin.login.view');
Route::post('/login/submit', [RegisterController::class, 'submitLogin'])->name('admin.login.submit');

Route::group(['middleware' => 'auth:user'], function () {
    //Dashboard Management
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/profile/edit', [DashboardController::class, 'editProfile'])->name('admin.edit.profile');
    Route::post('/profile/change/password', [DashboardController::class, 'changePassword'])->name('admin.change.password');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    //Blog Management
    Route::get('/CourseDetails/index', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/CourseDetails/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/CourseDetails/store', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/CourseDetails/slider/change/{id}/{show}', [BlogController::class, 'changeSlider'])->name('admin.blog.slider');
    Route::get('/CourseDetails/edit/{blog}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::patch('/CourseDetails/update/{blog}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/CourseDetails/delete/{blog}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
    //Category Management
    Route::get('/Branch/index', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/Branch/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/Branch/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/Branch/edit/{slug}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::patch('/Branch/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/Branch/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');
    //Student Management
    Route::get('/StudentRegistration', [VisitorController::class, 'create'])->name('admin.student.create');
    Route::post('/StudentRegistration/store', [VisitorController::class, 'store'])->name('admin.student.store');
    Route::get('/Student/details', [VisitorController::class, 'show'])->name('admin.student.view');
    Route::get('/Student/edit/{id}', [VisitorController::class, 'edit'])->name('admin.student.edit');
    Route::patch('/Student/update/{id}', [VisitorController::class, 'update'])->name('admin.student.update');
    Route::get('/Student/delete/{id}', [VisitorController::class, 'destroy'])->name('admin.student.delete');
    Route::get('/Student/Enrolled', [DashboardController::class, 'likes'])->name('student.enroll.index');
    //Teacher Management
    Route::get('/TeacherRegistration', [StaffController::class, 'create'])->name('admin.teacher.create');
    Route::post('/TeacherRegistration/store', [StaffController::class, 'store'])->name('admin.teacher.store');
    Route::get('/Teacher/details', [StaffController::class, 'show'])->name('admin.teacher.view');
    Route::get('/Teacher/edit/{id}', [StaffController::class, 'edit'])->name('admin.teacher.edit');
    Route::patch('/Teacher/update/{id}', [StaffController::class, 'update'])->name('admin.teacher.update');
    Route::get('/Teacher/delete/{id}', [StaffController::class, 'destroy'])->name('admin.teacher.delete');
    //About Organization
    Route::get('/Detail/index', [DetailController::class, 'index'])->name('admin.details.index');
    Route::get('/Detail/create', [DetailController::class, 'create'])->name('admin.details.create');
    Route::post('/Detail/store', [DetailController::class, 'store'])->name('admin.details.store');
    Route::get('/Detail/edit/{detail}', [DetailController::class, 'edit'])->name('admin.details.edit');
    Route::patch('/Detail/update/{detail}', [DetailController::class, 'update'])->name('admin.details.update');
    Route::get('/Detail/delete/{detail}', [DetailController::class, 'destroy'])->name('admin.details.delete');
    //Features
    Route::get('/Feature/index', [FeatureController::class, 'index'])->name('admin.features.index');
    Route::get('/Feature/create', [FeatureController::class, 'create'])->name('admin.features.create');
    Route::post('/Feature/store', [FeatureController::class, 'store'])->name('admin.features.store');
    Route::get('/Feature/edit/{feature}', [FeatureController::class, 'edit'])->name('admin.features.edit');
    Route::patch('/Feature/update/{feature}', [FeatureController::class, 'update'])->name('admin.features.update');
    Route::get('/Feature/delete/{feature}', [FeatureController::class, 'destroy'])->name('admin.features.delete');
    //Notices
    Route::get('/Notice/index', [NoticeController::class, 'index'])->name('admin.notices.index');
    Route::get('/Notice/create', [NoticeController::class, 'create'])->name('admin.notices.create');
    Route::post('/Notice/store', [NoticeController::class, 'store'])->name('admin.notices.store');
    Route::get('/Notice/edit/{notice}', [NoticeController::class, 'edit'])->name('admin.notices.edit');
    Route::patch('/Notice/update/{notice}', [NoticeController::class, 'update'])->name('admin.notices.update');
    Route::get('/Notice/delete/{notice}', [NoticeController::class, 'destroy'])->name('admin.notices.delete');
    //Enquiries
    Route::get('/Enquiry/index', [SuggestionController::class, 'index'])->name('admin.enquiries.index');
    // Route::resource('blog', BlogController::class);


});
//frontend register and login functions
Route::get('/visitor/register', [AuthenticationController::class, 'register'])->name('frontend.register.view');
Route::post('/visitor/submit/register', [AuthenticationController::class, 'submitRegister'])->name('frontend.register.submit');
Route::get('/verify/email/{token}', [AuthenticationController::class, 'verifyEmail'])->name('visitor.verify.email');
Route::get('/verify/email/resend/code', [AuthenticationController::class, 'resendCode'])->name('visitor.resend.code');
Route::post('/verify/email/resend/code/submit', [AuthenticationController::class, 'resendCodeSubmit'])->name('visitor.resend.code.submit');
Route::get('/visitor/login', [AuthenticationController::class, 'viewLogin'])->name('frontend.login.view');
Route::post('/visitor/login/submit', [AuthenticationController::class, 'submitLogin'])->name('frontend.login.submit');
Route::post('/visitor/login/modal/submit', [AuthenticationController::class, 'modalLogin'])->name('frontend.modal.login');
//frontend routes
Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/Courses', [FrontendController::class, 'categories'])->name('frontend.categories');
Route::get('/Category/{slug}', [FrontendController::class, 'category'])->name('frontend.category');
Route::get('/Course/{slug}', [FrontendController::class, 'singleBlog'])->name('frontend.single.blog');
Route::post('/Search/Course', [FrontendController::class, 'searchBlog'])->name('frontend.blog.search');
Route::get('/About/School', [FrontendController::class, 'about'])->name('frontend.about.school');
Route::get('/About/Teachers', [FrontendController::class, 'aboutTeachers'])->name('frontend.about.teacher');
Route::get('/Notice/All', [FrontendController::class, 'allNotice'])->name('frontend.notices');
Route::get('/Notice/Single/{id}', [FrontendController::class, 'singleNotice'])->name('frontend.single.notice');
Route::get('/Contact', [SuggestionController::class, 'create'])->name('frontend.contact');
Route::post('/Enquiry/store', [SuggestionController::class, 'store'])->name('frontend.enquiries.store');

Route::group(['middleware' => 'auth:visitor'], function () {
    Route::post('/blog/comment/post', [FrontendController::class, 'postComment'])->name('frontend.post.comment');
    Route::get('/blog/like/post/{id}', [FrontendController::class, 'like'])->name('frontend.post.like');
    Route::get('/visitor/profile', [FrontendController::class, 'profile'])->name('frontend.profile.view');
    Route::get('/visitor/profile/edit', [FrontendController::class, 'editProfile'])->name('frontend.profile.edit');
    Route::post('/visitor/profile/update', [FrontendController::class, 'updateProfile'])->name('frontend.profile.update');
    Route::get('/visitor/profile/password/change', [FrontendController::class, 'changePassword'])->name('frontend.profile.passchange');
    Route::post('/visitor/profile/password/update', [FrontendController::class, 'updatePassword'])->name('frontend.profile.updatepass');
    Route::get('/visitor/profile/Course/Enrolled', [FrontendController::class, 'likes'])->name('frontend.profile.enrollment');
    Route::get('/visitor/profile/Attendance', [FrontendController::class, 'attendances'])->name('frontend.profile.attendance');
    Route::get('/visitor/profile/Marks', [FrontendController::class, 'marks'])->name('frontend.profile.marks');
    Route::get('/visitor/logout', [AuthenticationController::class, 'logout'])->name('frontend.logout');
});


//Teacher register and login functions
Route::get('/teacher/register', [AuthenticateController::class, 'register'])->name('teacher.register.view');
Route::post('/teacher/submit/register', [AuthenticateController::class, 'submitRegister'])->name('teacher.register.submit');
Route::get('/teacher/login', [AuthenticateController::class, 'viewLogin'])->name('teacher.login.view');
Route::post('/teacher/login/submit', [AuthenticateController::class, 'submitLogin'])->name('teacher.login.submit');
//Teacher module routes
Route::group(['middleware' => 'auth:teacher'], function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::post('/teacher/profile/edit', [TeacherController::class, 'editProfile'])->name('teacher.edit.profile');
    Route::post('/teacher/profile/change/password', [TeacherController::class, 'changePassword'])->name('teacher.change.password');
    Route::get('teacher/logout', [TeacherController::class, 'logout'])->name('teacher.logout');
    //Student Management
    Route::get('Teacher/Student/Registration', [StudentController::class, 'create'])->name('teacher.student.create');
    Route::post('Teacher/Student/Registration/store', [StudentController::class, 'store'])->name('teacher.student.store');
    Route::get('Teacher/Student/details', [StudentController::class, 'show'])->name('teacher.student.view');
    Route::get('Teacher/Student/edit/{id}', [StudentController::class, 'edit'])->name('teacher.student.edit');
    Route::patch('Teacher/Student/update/{id}', [StudentController::class, 'update'])->name('teacher.student.update');
    Route::get('Teacher/Student/delete/{id}', [StudentController::class, 'destroy'])->name('teacher.student.delete');
    //Attendance
    Route::get('Teacher/Student/Attendance/Add', [AttendanceController::class, 'create'])->name('student.attendance.create');
    Route::post('Teacher/Student/Attendance/Store', [AttendanceController::class, 'store'])->name('student.attendance.store');
    Route::get('Teacher/Student/Attendance', [AttendanceController::class, 'show'])->name('student.attendance.view');
    Route::get('Teacher/Student/Attendance/edit/{id}', [AttendanceController::class, 'edit'])->name('student.attendance.edit');
    Route::patch('Teacher/Student/Attendance/update/{id}', [AttendanceController::class, 'update'])->name('student.attendance.update');
    //Marks
    Route::get('Teacher/Student/Marks/Add', [MarkController::class, 'create'])->name('student.marks.create');
    Route::post('Teacher/Student/Marks/Store', [MarkController::class, 'store'])->name('student.marks.store');
    Route::get('Teacher/Student/Marks', [MarkController::class, 'show'])->name('student.marks.view');
    Route::get('Teacher/Student/Marks/edit/{id}', [MarkController::class, 'edit'])->name('student.marks.edit');
    Route::patch('Teacher/Student/Marks/update/{id}', [MarkController::class, 'update'])->name('student.marks.update');
    //Course Details
    Route::get('/teacher/CourseDetails/index', [CourseController::class, 'index'])->name('teacher.course.index');
    Route::get('/teacher/CourseDetails/edit/{blog}', [CourseController::class, 'edit'])->name('teacher.course.edit');
    Route::patch('/teacher/CourseDetails/update/{blog}', [CourseController::class, 'update'])->name('teacher.course.update');
});
