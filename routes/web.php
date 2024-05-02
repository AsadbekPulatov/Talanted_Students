<?php

use App\Http\Controllers\UserController;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpWord\Element\Row;

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

require __DIR__.'/auth.php';


Route::get('/home',[\App\Http\Controllers\HomeController::class,'Home'])->name('home');

Route::get('/statutes',[\App\Http\Controllers\HomeController::class,'Statutes'])->name('statutes');

Route::get('/about',[\App\Http\Controllers\HomeController::class,'About'])->name('about');

Route::get('/services',[\App\Http\Controllers\HomeController::class,'Services'])->name('services');

Route::get('/portfolio',[\App\Http\Controllers\HomeController::class,'Portfolio'])->name('portfolio');

Route::get('/teams',[\App\Http\Controllers\HomeController::class,'Team'])->name('team');

Route::get('/blog',[\App\Http\Controllers\HomeController::class,'Blog'])->name('blog');

Route::get('/',[\App\Http\Controllers\HomeController::class,'Home'])->name('Home');

Route::resource('/Profile',\App\Http\Controllers\ProfileController::class);

Route::get('/Admin/dashboard',[\App\Http\Controllers\AdminController::class,'AdminDashboard'])->name('AdminDashboard')->middleware(['auth']);

Route::post('/user/task', [UserController::class, 'user_task'])->name('user_task');

Route::get('Leaderboard', [UserController::class, 'leaderboard'])->name('leaderboard');
Route::get('download/{id}', [UserController::class, 'download_choice_users'])->name('download.choice_users');

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/Admin/profile',[\App\Http\Controllers\AdminController::class,'AdminProfile'])->name('AdminProfile')->middleware(['auth']);
    
    Route::get('/Admin/users',[\App\Http\Controllers\AdminController::class,'AdminUsers'])->name('AdminUsers')->middleware(['auth']);
    
    Route::get('/Admin/students',[\App\Http\Controllers\AdminController::class,'AdminStudents'])->name('AdminStudents')->middleware(['auth']);
    
    Route::get('/Admin/news',[\App\Http\Controllers\AdminController::class,'AdminNews'])->name('AdminNews')->middleware(['auth']);
    
    Route::get('/Admin/posts',[\App\Http\Controllers\AdminController::class,'AdminPosts'])->name('AdminPosts')->middleware(['auth']);
    
    Route::get('/Admin/choices',[\App\Http\Controllers\AdminController::class,'AdminChoices'])->name('AdminChoices')->middleware(['auth']);
    
    Route::get('/Admin/statutes',[\App\Http\Controllers\AdminController::class,'AdminStatutes'])->name('AdminStatutes')->middleware(['auth']);
    
    Route::get('/Admin/privileges',[\App\Http\Controllers\AdminController::class,'AdminPrivileges'])->name('AdminPrivileges')->middleware(['auth']);
    
    Route::get('/RePassword',[\App\Http\Controllers\AdminController::class,'RePassword'])->name('RePassword')->middleware(['auth']);

    Route::resource('/Users',\App\Http\Controllers\UserController::class)->middleware(['auth'])->withoutMiddleware('admin');

    Route::resource('/Post',\App\Http\Controllers\PostController::class)->middleware(['auth']);

    Route::resource('/Info',\App\Http\Controllers\InfosController::class)->middleware(['auth']);

    Route::resource('/News',\App\Http\Controllers\NewsController::class)->middleware(['auth']);

    Route::resource('/Choices',\App\Http\Controllers\ChoicesController::class)->middleware(['auth']);

    Route::resource('/Statutes',\App\Http\Controllers\StatutesController::class)->middleware(['auth']);

    Route::resource('/Reference',\App\Http\Controllers\ReferenceController::class)->middleware(['auth']);

    Route::post("/morenews",[\App\Http\Controllers\AdminController::class,'morenews'])->middleware(['auth'])->name('morenews');

    Route::post("/morechoices",[\App\Http\Controllers\AdminController::class,'morechoices'])->middleware(['auth'])->name('morechoices');

    Route::post("/morestatutes",[\App\Http\Controllers\AdminController::class,'morestatutes'])->middleware(['auth'])->name('morestatutes');

    Route::post("/moreposts",[\App\Http\Controllers\AdminController::class,'moreposts'])->middleware(['auth'])->name('moreposts');
});



Route::get('/view',[\App\Http\Controllers\HomeController::class,'view'])->name('view');

Route::resource('/recreator',\App\Http\Controllers\RecreatorController::class);

Route::resource('/user',\App\Http\Controllers\UserPostController::class);

Route::resource('/ReferenceDocument',\App\Http\Controllers\ReferenceWordController::class)->middleware(['auth']);

Route::post("/Setting",[\App\Http\Controllers\AdminController::class,'Setting'])->middleware(['auth']);

Route::post("/searchnews",[\App\Http\Controllers\HomeController::class,'searchnews']);

Route::post("/newsdata",[\App\Http\Controllers\HomeController::class,'newsdata']);


