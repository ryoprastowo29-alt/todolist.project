<?php

use App\Http\Controllers\Todocontroller;
use Illuminate\Support\Facades\Route;

Route::resource('todos', Todocontroller::class);

Route::redirect('/', '/todos');
