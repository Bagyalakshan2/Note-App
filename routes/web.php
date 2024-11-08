<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');



Route::get('/notes', function () {
    return view('index');});
