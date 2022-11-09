<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/hello', function () {
    return response('<h1>Hello World</h1>', 200)
    ->header('Content-Type', 'text/plain')
    ->header('foo', 'bar');
});

Route::get('/posts/{id}', function ($id) {
    // dd stand for Dump and Die
    // dd($id);
    // ddd stand for Dump, Die, Debug
    // ddd($id);
    return response('Post '. $id);
})->where('id', '[0-9]+');

Route::get('/search', function (Request $request) {
    return $request->name . ' ' . $request->city;
    // return view('welcome');
});

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listing',
        'listings' => [
            [
            'id' => 1,
            'title' => 'listing One',
            'description' => 'But they are not helping me to format Laravel Blade Codes
            [blade.php files]. I mean they are not auto indenting the codes as I expected.
            But I have seen blade codes online which are well indented in visual studio Code IDE.',
            ],
            [
            'id' => 2,
            'title' => 'listing Two',
            'description' => 'But they are not helping me to format Laravel Blade Codes
            [blade.php files]. I mean they are not auto indenting the codes as I expected.
            But I have seen blade codes online which are well indented in visual studio Code IDE.',
            ]
        ]
    ]); 
});
