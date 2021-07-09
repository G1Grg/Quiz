<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth routes


// end of Auth Routes
// Route::get('/login', 
//     [App\Http\Controllers\PageController::class,'loginPage'])->name('get.login');
// Route::get('/register', 
//     [App\Http\Controllers\PageController::class,'registerPage'])->name('get.register');

// // Route::post('/login', 
// //     [App\Http\Controllers\Auth\LoginController::class,'login'])->name('post.login');
// // Route::post('/register', 
// //     [App\Http\Controllers\Auth\LoginController::class,'register'])->name('post.register');

// Route::get('/logout', 
//     [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Auth::Routes();
// Page Routes
Route::get('/', 
[PageController::class,'homePage'])->name('home');
Route::get('/pages/about-us',
     [PageController::class,'aboutUs'])->name('aboutUs');	
Route::get('/pages/contact-us',
     [PageController::class,'contactUs'])->name('contactUs');
Route::post('/pages/contact-us/save', 
     [PageController::class,'saveContactUs'])->name('saveContactUs');
Route::get('/pages/success', 
    [PageController::class,'success'])->name('success');
// End of page routes


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
	

		
    Route::get('/categories', 
        [PageController::class,'categoriesPage'])->name('categoriesPage');
    // Route::get('/categories', 
    //     [PageController::class,'addCategory'])->name('addCategory');
    Route::get('/play/{category}',
        [PageController::class,'insideCategory'])->name('insideCategory');
    Route::get('/play/{category}/{subcategory}', 
        [PageController::class,'insideSubCategory'])->name('startQuiz');
    Route::get('/play/get-question/{subcategoryId}', 
        [PageController::class,'getQuestion'])->name('getQuestion');
    Route::post('/play/submit/submitQuiz', 
        [PageController::class,'submitQuiz'])->name('submitQuiz');
    Route::get('/view/my-quizes', 
        [PageController::class,'myQuizes'])->name('myQuizes');

    Route::get('/view/create-quiz-question', 
        [PageController::class,'createQuizQuestion'])->name('createQuizQuestion');
    Route::post('/view/create-quiz-question', 
        [PageController::class,'createQuizQuestionSave'])->name('createQuizQuestionSave');
    Route::get('/view/create-quiz-question/{unique_id}', 
        [PageController::class,'createQuizQuestionOptions'])->name('createQuizQuestionOptions');
    Route::get('/view/create-quiz-question/{unique_id}/save-option', 
        [PageController::class,'saveQuestionOption'])->name('saveQuestionOption');

    Route::get('/invite/quizes-i-created', 
        [PageController::class,'showQuizesICreated'])->name('showQuizesICreated');
    Route::get('/play-game/play-custom-quiz', 
        [PageController::class,'playCustomQuizGet'])->name('playCustomQuizGet');
    Route::post('/play-game/play-custom-quiz', 
        [PageController::class,'playCustomQuizPost'])->name('playCustomQuizPost');

	
	
});
