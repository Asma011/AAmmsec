<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubpageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SurveyController;

use Illuminate\Support\Facades\Auth;

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

//Guest Routes
Route::get('/', [GuestController::class,'index']);
Route::get('/general-pages/{subPageId}/{slug}', [PageController::class,'getPageDetail'])->name('showSubPage');
Route::get('/service-pages/{PageId}/{slug}', [PageController::class,'getMainPageDetail'])->name('showPage');

/**It Services */
Route::get('/get-quiz',[UserController::class,'getQuizQuestion'])->name('getQuiz');

Route::get('/it-services', function () {
    return view('it_services');
});
Route::get('/remote-support', function () {
    return view('remote_support');
});
Route::get('/project-management', function () {
    return view('project_management');
});
Route::get('/infrastructure-management', function () {
    return view('infrastructure_management');
});
Route::get('/it-strategy', function () {
    return view('it_strategy');
});



/*******Cyber Security */

Route::get('/managed-security-services', function () {
    return view('managed_security_services');
});
Route::get('/cyber-incident-recovery', function () {
    return view('cyber_incident_recovery');
});
Route::get('/it-dos-donts', function () {
    return view('it_dos_donts');
});
Route::get('/admin-dashbosrd', function () {
    return view('it_dos_donts');
});


/*********Admin Routes*********** */
Route::get('/admin-dashbaord', function () {
    return view('admin.dashboard');
});

Route::get('/admin-banners', function () {
    return view('admin.banners');
});
Route::get('/admin-add-banner', function () {
    return view('admin.add_banner');
});
Route::get('/admin-view-users', function () {
    return view('admin.admin_viewUsers');
});
Route::get('/admin-users', function () {
    return view('admin.users');
});
Route::get('/admin-home-decs', function () {
    return view('admin.home_desc');
});
Route::get('/admin-add_home_desc', function () {
    return view('admin.add_home_desc');
});
Route::get('/admin-it-services', function () {
    return view('admin.it-services');
});
Route::get('/admin-edit-it-services/$id', function () {
    return view('admin.edit_it_services');
});
Route::get('/admin-cyber-security', function () {
    return view('admin.cyber_secutiry');
});
Route::get('/admin-edit-cyber-security', function () {
    return view('admin.cyber-security');
});
Route::get('/admin-cloud-services', function () {
    return view('admin.cloud_services');
});
Route::get('/admin-edit-cloud-services', function () {
    return view('admin.edit_cloud_services');
});


Route::get('/admin-support-categories', function () {
    return view('admin.categories');
});
Route::get('/admin-add-support-categories', function () {
    return view('admin.add_categories');
});


Route::get('/admin-support-subcategories', function () {
    return view('admin.subcategories');
});
Route::get('/admin-add-support-subcategories', function () {
    return view('admin.add_subcategories');
});


Route::get('/admin-links-management', function () {
    return view('admin.links_management');
});
Route::get('/admin-add-links', function () {
    return view('admin.add_links');
});
Route::post('/save-survey-detail', [SurveyController::class,'store'])->name('storeSurveyDetail');
Route::get('/survey/{id}/general-surve/result', [SurveyController::class,'surveyResult']);




Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //////////////Menu Links//////////////////////////
    Route::get('/menu-link-list', [MenuController::class, 'index'])->name('admin.showMenuLinks');
    Route::get('/add-menu-link', [MenuController::class, 'show'])->name('admin.showMenuLinksForm');
    Route::Post('/add-menu-link', [MenuController::class, 'store'])->name('admin.storeMenuLinksForm');
    Route::get('/edit-menu-link/{id}', [MenuController::class, 'edit'])->name('admin.showEditMenuLinksForm');
    Route::Post('/edit-menu-link', [MenuController::class, 'update'])->name('admin.showUpdateMenuLinksForm');

    //////////////Sub Menu Links//////////////////////////
    Route::get('/sub-menu-link-list', [SubMenuController::class, 'index'])->name('admin.showSubMenuLinks');
    Route::get('/add-sub-menu-link', [SubMenuController::class, 'show'])->name('admin.showSubMenuLinksForm');
    Route::post('/add-sub-menu-link', [SubMenuController::class, 'store'])->name('admin.storeSubStoreMenuLinksForm');
    Route::get('/edit-submenu-list/{id}', [SubMenuController::class, 'edit'])->name('admin.showEditSubMenuForm');
    Route::post('/edit-submenu-list', [SubMenuController::class, 'update'])->name('admin.storeEditSubMenuForm');

    /////////////Page Routes/////////////////////////
    Route::get('/pages-list', [AdminController::class, 'ShowPagesList'])->name('admin.showPageList');
    Route::get('/add-new-pages', [AdminController::class, 'ShowAddNewPage'])->name('admin.showaddNewPages');
    Route::post('/add-new-pages',[AdminController::class,'AddNewPage'])->name('admin.storePages');
    Route::get('/edit-new-pages/{pid}',[AdminController::class,'ShowEditPageForm'])->name('admin.showeditPagesForm');
    Route::post('/edit-new-pages',[AdminController::class,'updatePage'])->name('admin.updatePagesContent');
    

    ////////////Mange sub-pages////////////////////////////////////
    Route::get('/sub-pages-list', [SubpageController::class, 'index'])->name('admin.showSubPageList');
    Route::get('/add-sub-pages', [SubpageController::class, 'create'])->name('admin.createSubPage');
    Route::post('/add-sub-pages', [SubpageController::class, 'store'])->name('admin.storeSubPage');
    Route::get('/edit-sub-page/{spid}',[SubpageController::class,'edit'])->name('admin.editSubPage');
    Route::post('/edit-sub-page',[SubpageController::class,'update'])->name('admin.updateSubPage');

    ////////////Mange Quiz////////////////////////////////////
    Route::get('/quiz-list', [QuizController::class, 'index'])->name('admin.showQuizList');
    Route::get('/add-quiz', [QuizController::class, 'show'])->name('admin.showCreateQuizFrm');
    Route::Post('/add-quiz', [QuizController::class, 'create'])->name('admin.storeNewQuiz');
    Route::get('/edit-quiz/{qid}', [QuizController::class, 'edit'])->name('admin.editQuiz');
    Route::post('/edit-quiz', [QuizController::class, 'update'])->name('admin.updateQuiz');


    ///////////////////Quiz details///////////////////////////////////////////
    Route::get('/quiz-detail-list/{qdid}', [QuizController::class, 'QdIndex'])->name('admin.showQuizDetailList');
    Route::get('/quiz-question-edit/{queId}', [QuizController::class, 'editQuestion'])->name('admin.editQuestionQuiz');
    Route::post('/quiz-question-edit', [QuizController::class, 'updateQuestion'])->name('admin.UpdateQuestionQuiz');
    Route::get('/add-quiz-question', [QuizController::class, 'createQuizQuestion'])->name('admin.CreateQuestionQuiz');
    Route::post('/add-quiz-question', [QuizController::class, 'storeQuizQuestion'])->name('admin.storeQuestionQuiz');



    ////////////Mange Users////////////////////////////////////
    Route::get('/users-list', [UserController::class, 'index'])->name('admin.showuserList');
    Route::get('/survey-list', [SurveyController::class, 'indexsurveyList'])->name('admin.showsurveyList');
});
Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function () {
    Route::get('/dashboard', [UserController::class, 'ShowUserDasboard'])->name('user.dashboard');
});
