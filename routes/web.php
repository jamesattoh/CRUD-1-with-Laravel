<?php

use App\Mail\JobPosted;
use App\Jobs\TranslateJob;
use function Pest\Laravel\get;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Models\Job;

Route::view('/','home');
Route::view('/contact', 'contact');

Route::get('test', function() {
    $job = Job::first();

    TranslateJob::dispatch($job);
    return 'Done';
});


Route::get('/jobs',[JobController::class, 'index']);
Route::get('/jobs/create',[JobController::class, 'create']);
Route::post('/jobs',[JobController::class, 'store']);
Route::get('/jobs/{job}',[JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit','job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
        ->middleware('auth')
        ->can('edit','job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])
        ->middleware('auth')
        ->can('edit','job');



//Auth
Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login',[SessionController::class,'create'])->name('login');

Route::post('/login',[SessionController::class,'store']);

Route::post('/logout', [SessionController::class,'destroy']);




// Route::controller(JobController::class)->group(function(){

//     Route::get('/jobs', 'index');
//     Route::get('/jobs/create','create');
//     Route::get('/jobs/{job}', 'show');  // $job = Job::find($id); //ce qui a ete remplace par /jobs/{job} et function(Job $job)
//     Route::post('/jobs','store');
//     Route::get('/jobs/{job}/edit','edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}','destroy');

// });



