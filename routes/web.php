<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/du-an', function () {
    return view('projects');
})->name('projects');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/blog/de-tai-nckh-eureka-2025', function () {
    return view('blog-article');
})->name('blog.article');

Route::get('/du-an/he-thong-nhan-dien-thiet-bi-iot', function () {
    return view('case-study');
})->name('case-study');
