<?php

use App\Models\Exam;
use App\Models\User;
use App\Models\Enroll;
use App\Models\payment;
use App\Models\ept_score;
use App\Models\toeic_score;
use App\Http\Controllers\eptFilter;
use App\Http\Controllers\toeicFilter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EptScoreController;
use App\Http\Controllers\EPT_StoryController;
use App\Http\Controllers\EptAnswerController;
use App\Http\Controllers\Exam_OpenController;
use App\Http\Controllers\GenerateCertificate;
use App\Http\Controllers\ToeicScoreController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TOEIC_StoryController;
use App\Http\Controllers\ToeicAnswerController;
use App\Http\Controllers\EPT_QuestionController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\EPT_DirectionController;
use App\Http\Controllers\TOEIC_QuestionController;
use App\Http\Controllers\TOEIC_DirectionController;

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

// User Area
Route::middleware(['auth', 'verified', 'check.busy'])->group(function () {
    Route::resource('/dashboard/update-profile', ProfileController::class)->middleware('block.update.profile');

    Route::get('/dashboard', function () {
        return view('user.dashboard', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Dashboard',
        ]);
    });

    Route::get('/dashboard/payment/exam/ept', [PaymentController::class, 'eptPayment']);

    Route::post('/dashboard/payment/exam/ept', [PaymentController::class, 'postEptPayment']);

    Route::get('/dashboard/payment/exam/toeic', [PaymentController::class, 'toeicPayment']);

    Route::post('/dashboard/payment/exam/toeic', [PaymentController::class, 'postToeicPayment']);

    Route::resource('/profile', ProfileController::class);

    Route::get('/dashboard/profile', function () {
        return view('user/profile', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Profile',
        ]);
    });

    Route::get('/dashboard/contact-us', function () {
        return view('user/contactUs', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Contact Us',
        ]);
    });

    Route::get('/dashboard/purchase', function () {
        return view('user/purchase', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'payments' => payment::where('user_id', auth()->user()->id)->get(),
            'title' => 'Purchase',
        ]);
    });

    Route::get('/dashboard/test-history-ept', function () {
        return view('user/testHistoryEPT', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'eptHistories' => ept_score::where('user_id', auth()->user()->id)->get(),
            'title' => 'EPT History',
        ]);
    });

    Route::get('/dashboard/test-history-toeic', function () {
        return view('user/testHistoryTOEIC', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'toeicHistories' => toeic_score::where('user_id', auth()->user()->id)->get(),
            'title' => 'TOEIC History',
        ]);
    });

    Route::get('/dashboard/test-guide', function () {
        return view('user/testGuide', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Guide',
        ]);
    });

    Route::get('/dashboard/ept/waiting-area/schedule', function () {
        return view('user/exam/examSchedule', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::where('category', 'ept')->where('activated', 'yes')->first(),
            'warningCard' => true,
            'title' => 'EPT Schedule',
        ]);
    })->middleware('check.payment:ept', 'set.schedule:ept');
    
    Route::get('/dashboard/toeic/waiting-area/schedule', function () {
        return view('user/exam/examSchedule', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::where('category', 'toeic')->where('activated', 'yes')->first(),
            'warningCard' => true,
            'title' => 'TOEIC Schedule',
        ]);
    })->middleware('check.payment:toeic', 'set.schedule:toeic');

    Route::resource('/dashboard/waiting-area/schedule', EnrollController::class);

    Route::get('/fetch/enroll/start', [EnrollController::class, 'getButton']);

    Route::get('/dashboard/ept/waiting-area/enroll', function () {
        return view('user/exam/examEnroll', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::where('activated', 'yes')->where('category', 'ept')->first(),
            'enrolls' => Enroll::where('user_id', auth()->user()->id)->where('for', 'ept')->latest()->first(),
            'warningCard' => true,
            'title' => 'EPT Enrollment',
        ]);
    })->middleware('check.payment:ept', 'check.set.schedule:ept');

    Route::get('/dashboard/toeic/waiting-area/enroll', function () {
        return view('user/exam/examEnroll', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::where('activated', 'yes')->where('category', 'toeic')->first(),
            'enrolls' => Enroll::where('user_id', auth()->user()->id)->where('for', 'toeic')->latest()->first(),
            'warningCard' => true,
            'title' => 'TOEIC Enrollment',
        ]);
    })->middleware('check.payment:toeic', 'check.set.schedule:toeic',);

    // Generate Certificate
    route::post('/dashboard/generate/certificate', [GenerateCertificate::class, 'generate']);
});

// View Certificate
Route::get('/certificate/ept/{score_code}', [CertificateController::class, 'eptShow']);

Route::get('/certificate/toeic/{score_code}', [CertificateController::class, 'toeicShow']);

// User Exam Result
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('exam/ept/result', EptScoreController::class);

    Route::resource('exam/toeic/result', ToeicScoreController::class);
});

// User EPT Exam Starting
Route::middleware(['auth', 'verified', 'check.payment:ept', 'check.set.schedule:ept', 'check.exam.starting:ept'])->group(function () {
    Route::resource('exam/ept/start', EptAnswerController::class);

    Route::get('/fetch/exam/ept/answer', [EptAnswerController::class, 'fetchAnswer']);

    Route::post('/post/exam/ept/answer', [EptAnswerController::class, 'postAnswer']);

    Route::get('/fetch/exam/ept/question/audio', [EptAnswerController::class, 'fetchQuestionPlayButton']);

    Route::post('/post/exam/ept/question/audio', [EptAnswerController::class, 'postQuestionPlayButton']);

    Route::get('/fetch/exam/ept/story/audio', [EptAnswerController::class, 'fetchStoryPlayButton']);

    Route::post('/post/exam/ept/story/audio', [EptAnswerController::class, 'postStoryPlayButton']);
});

// EPT Exam Check Status
Route::get('/fetch/exam/ept/status', [EptAnswerController::class, 'fetchStatus']);

// User TOEIC Exam Starting
Route::middleware(['auth', 'verified', 'check.payment:toeic', 'check.set.schedule:toeic', 'check.exam.starting:toeic'])->group(function () {
    Route::resource('exam/toeic/start', ToeicAnswerController::class);

    Route::get('/fetch/exam/toeic/answer', [ToeicAnswerController::class, 'fetchAnswer']);

    Route::post('/post/exam/toeic/answer', [ToeicAnswerController::class, 'postAnswer']);

    Route::get('/fetch/exam/toeic/question/audio', [ToeicAnswerController::class, 'fetchQuestionPlayButton']);

    Route::post('/post/exam/toeic/question/audio', [ToeicAnswerController::class, 'postQuestionPlayButton']);

    Route::get('/fetch/exam/toeic/story/audio', [ToeicAnswerController::class, 'fetchStoryPlayButton']);

    Route::post('/post/exam/toeic/story/audio', [ToeicAnswerController::class, 'postStoryPlayButton']);
});

// TOEIC Exam Check Status
Route::get('/fetch/exam/toeic/status', [ToeicAnswerController::class, 'fetchStatus']);

// Fetch Timer
Route::get('/fetch/timer',[Exam_OpenController::class, 'timer']);

// Admin Area
Route::middleware(['auth', 'verified', 'admin.role'])->group(function () {
    // Admin Dashboard
    Route::get('admin/dashboard', function () {
        return view('admin/dashboard', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::get(),
            'title' => 'Admin Dashboard',
        ]);
    });

    // Reporting
    Route::get('admin/dashboard/ept/reporting', function () {
        return view('admin/reporting/eptReporting', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'eptScores' => ept_score::get(),
            'title' => 'EPT Reporting',
        ]);
    });

    Route::get('admin/dashboard/toeic/reporting', function () {
        return view('admin/reporting/toeicReporting', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'toeicScores' => toeic_score::get(),
            'title' => 'TOEIC Reporting',
        ]);
    });

    Route::post('admin/dashboard/ept/reporting/filter', [eptFilter::class, 'index']);

    Route::post('admin/dashboard/toeic/reporting/filter', [toeicFilter::class, 'index']);

    // Manage Users
    Route::get('admin/dashboard/manage-users', function () {
        return view('admin/manageUser', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'getUsers' => User::whereIn('role', ['test taker', 'guest'])->get(),
            'title' => 'Manage User',
        ]);
    });

    Route::get('admin/dashboard/manage-users/edit/{id}', [UserController::class, 'edit']);

    Route::put('admin/dashboard/manage-users/update/{id}',  [UserController::class, 'update']);

    Route::delete('admin/dashboard/manage-users/delete/{id}', [UserController::class, 'destroy']);

    // Start Timer
    Route::post('/post/timer',[Exam_OpenController::class, 'startExam']);
    
    // Manage Exams
    Route::get('admin/dashboard/exam/ept', function () {
        return view('admin/exam/ept/manageExam', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::where('category', 'ept')->get(),
            'title' => 'Manage EPT',
        ]);
    });

    Route::get('admin/dashboard/exam/toeic', function () {
        return view('admin/exam/toeic/manageExam', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'exams' => Exam::where('category', 'toeic')->get(),
            'title' => 'Manage TOEIC',
        ]);
    });

    // Manage EPT/TOEIC Question, Story, Direction
    Route::resource('admin/dashboard/exam/ept/direction', EPT_DirectionController::class);

    Route::resource('admin/dashboard/exam/ept/story', EPT_StoryController::class);

    Route::resource('admin/dashboard/exam/ept/question', EPT_QuestionController::class);

    Route::get('/fetch/ept/story/{section}', [EPT_QuestionController::class, 'getStory']);

    Route::resource('admin/dashboard/exam/toeic/direction', TOEIC_DirectionController::class);

    Route::resource('admin/dashboard/exam/toeic/story', TOEIC_StoryController::class);

    Route::resource('admin/dashboard/exam/toeic/question', TOEIC_QuestionController::class);

    Route::get('/fetch/toeic/story/{section}', [TOEIC_QuestionController::class, 'getStory']);

    Route::post('/post/toeic/story',[TOEIC_StoryController::class, 'upload'])->name('ckeditor.upload');

    Route::post('/post/exam/update-activated/{exam}', [ExamController::class, 'updateActivated']);

    Route::get('/fetch/exam/activated', [ExamController::class, 'fetchActivated']);

    Route::resource('admin/dashboard/exam', ExamController::class);

    // Manage Practice
    Route::get('admin/dashboard/ept/practice', function () {
        return view('admin/managePractice', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'EPT Practice',
        ]);
    });

    Route::get('admin/dashboard/toeic/practice', function () {
        return view('admin/managePractice', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'TOEIC Practice',
        ]);
    });

    // Exam Control
    Route::resource('admin/dashboard/exam/control', Exam_OpenController::class);

    // Certification
    Route::resource('admin/dashboard/certification', CertificationController::class);
});