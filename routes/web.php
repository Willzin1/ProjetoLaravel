<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('login.destroy');
});

Route::controller(UserController::class)->group(function() {
    Route::get('/register/create','create')->name('users.create');
    Route::post('/register', 'store')->name('users.store');
});

Route::controller(AlunoController::class)->group(function() {
    Route::get('/alunos', 'index')->name('alunos.index');
    Route::get('/alunos/create', 'create')->name('alunos.create');
    Route::post('/alunos', 'store')->name('alunos.store');
    Route::get('/alunos/{aluno}/edit', 'edit')->name('alunos.edit');
    Route::get('/alunos/{aluno}', 'show')->name('alunos.show');
    Route::put('/alunos/{aluno}', 'update')->name('alunos.update');
    Route::delete('/alunos/{aluno}', 'destroy')->name('alunos.destroy');
});

Route::controller(ProfessorController::class)->group(function() {
    Route::get('/professores', 'index')->name('professores.index');
    Route::get('/professores/create', 'create')->name('professores.create');
    Route::post('/professores', 'store')->name('professores.store');
    Route::get('/professores/{professor}/edit', 'edit')->name('professores.edit');
    Route::get('/professores/{professor}', 'show')->name('professores.show');
    Route::put('/professores/{professor}', 'update')->name('professores.update');
    Route::delete('/professores/{professor}', 'destroy')->name('professores.destroy');
});

Route::controller(CursoController::class)->group(function() {
    Route::get('cursos', 'index')->name('cursos.index');
    Route::get('/cursos/create', 'create')->name('cursos.create');
    Route::post('/cursos', 'store')->name('cursos.store');
});
