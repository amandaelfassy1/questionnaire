<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\QuestionAdminController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionnaireAdminController;
use App\Http\Controllers\Admin\ResponseAdminController;
use App\Http\Controllers\Admin\UserAdminController;

Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('events', EventController::class);
    Route::resource('users', UserAdminController::class);
    Route::get('/questionnaires', [QuestionnaireAdminController::class, 'index'])->name('admin.questionnaires.index');
    Route::get('/questionnaires/create', [QuestionnaireAdminController::class, 'create'])->name('admin.questionnaires.create');
    Route::post('/questionnaires', [QuestionnaireAdminController::class, 'store'])->name('admin.questionnaires.store');
    Route::get('/questionnaires/{id}/edit', [QuestionnaireAdminController::class, 'edit'])->name('admin.questionnaires.edit');
    Route::put('/questionnaires/{id}', [QuestionnaireAdminController::class, 'update'])->name('admin.questionnaires.update');
    Route::delete('/questionnaires/{id}', [QuestionnaireAdminController::class, 'destroy'])->name('admin.questionnaires.destroy');
    
    Route::get('/questions', [QuestionAdminController::class, 'index'])->name('admin.questions.index');
    Route::get('/questions/create', [QuestionAdminController::class, 'create'])->name('admin.questions.create');
    Route::post('/questions', [QuestionAdminController::class, 'store'])->name('admin.questions.store');
    Route::get('/questions/{id}/edit', [QuestionAdminController::class, 'edit'])->name('admin.questions.edit');
    Route::put('/questions/{id}', [QuestionAdminController::class, 'update'])->name('admin.questions.update');
    Route::delete('/questions/{id}', [QuestionAdminController::class, 'destroy'])->name('admin.questions.destroy');

    Route::get('/responses', [ResponseAdminController::class, 'index'])->name('admin.responses.index');
    Route::get('/responses/create', [ResponseAdminController::class, 'create'])->name('admin.responses.create');
    Route::post('/responses', [ResponseAdminController::class, 'store'])->name('admin.responses.store');
    Route::get('/responses/{response}/edit', [ResponseAdminController::class, 'edit'])->name('admin.responses.edit');
    Route::put('/responses/{response}', [ResponseAdminController::class, 'update'])->name('admin.responses.update');
    Route::delete('/responses/{response}', [ResponseAdminController::class, 'destroy'])->name('admin.responses.destroy');
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/', [QuestionnaireController::class, 'index'])->name('questionnaires.index');
    Route::get('/questionnaires/{id}/fill', [ResponseController::class, 'fill'])->name('questionnaires.fill');
    Route::post('/questionnaires/{id}/submit', [ResponseController::class, 'submit'])->name('questionnaires.submit');
    Route::get('/questionnaires/{id}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
