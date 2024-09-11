<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return to_route('login');
});

//registering and signingin

// Route::get('/login',[RegisterController::class,'index'])->name('login');

// Route::post('/login',[RegisterController::class,'login'])->name('signin.login');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // // Routes that require authentication

    Route::get('/posts',[IndexController::class,'index'])->name('posts.index');

    Route::post('/posts/search',[IndexController::class,'index'])->name('posts.search');

    Route::post('/posts/filter',[IndexController::class,'index'])->name('posts.filter');

    Route::get('/posts/create',[PostsController::class, 'create'])->name('posts.create');

    Route::post('/posts',[PostsController::class,'store'])->name('posts.store');

    Route::get('/profile/{profile}',[ProfileController::class,'show'])->name('profile.show');
    
    Route::get('/profile/{profile}/Edit',[ProfileController::class,'edit'])->name('profile.edit');

    Route::post('/profile/{profile}/update',[ProfileController::class,'store'])->name('profile.store');
    
    Route::put('/posts/{post}',[PostsController::class,'update'])->name('posts.update');

    Route::delete('/posts/{post}/delete',[PostsController::class,'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/approve',[PostsController::class,'approval'])->name('posts.approve');

    Route::get('/posts/{post}/Edit',[PostsController::class,'edit'])->name('posts.edit');

    Route::get('/posts/{post}',[PostsController::class,'show'])->name('posts.show');
    
    Route::get('/posts/{post}/form',[FormsController::class,'create_application'])->name('form.create');

    Route::post('/posts/{post}/form',[FormsController::class,'store_form'])->name('form.store');

    Route::get('/candidtes/applies',[FormsController::class,'applies'])->name('applies.show');

    Route::delete('/applies/{post}/delete',[FormsController::class,'destroy'])->name('forms.destroy');

    Route::get('/superAdmin/CreateAdmin',[AdminsController::class,'create'])->name('admin.create');

    Route::post('/superAdmin/CreateAdmin',[AdminsController::class,'store'])->name('admin.store');

    Route::get('/superAdmin/dashboard',[AdminsController::class, 'dashboard_create'])->name('superAdmin.dashboard');

    // Route::get('/Admin/dashboard',)->name('Admin.dashboard');

    // Route::get('/profile/{profile}',function(){return view('pages.profile');})->name('profile.show');

});

require __DIR__.'/auth.php';
/**
<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

///////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////

// Route::middleware('auth')->group(function () {
    // Routes that require authentication

    Route::get('/posts',[PostsController::class,'index'])->name('posts.index');

    Route::get('/posts/create',function(){return view('pages.createpost');})->name('posts.create');

    Route::post('/posts',[PostsController::class,'store'])->name('posts.store');

    Route::get('/posts/{Employerid}/myposts',[PostsController::class,'show_myposts'])->name('myposts.show');
    
    Route::put('/posts/{post}',[PostsController::class,'update'])->name('posts.update');

    Route::get('/posts/{post}/Edit',[PostsController::class,'edit'])->name('posts.edit');

    Route::get('/posts/{post}',[PostsController::class,'show'])->name('posts.show');
    
    Route::get('/posts/{post}/form',function(){return view('pages.applicationform');})->name('form.create');

    Route::get('/profile/{profile}',function(){return view('pages.profile');})->name('profile.show');

// });

   
     */






