<?php

use App\Models\Listing;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

// TODO: Common Resource Routes
// index - Show all listings 
// show - Show single listing
// create - Show from to create new Listing
// store - Store new Listing
// edit - Show from to edit Listing
// update - Update listing
// destroy - Delete listing

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

// ~ Return the data from the web file
// Route::get('/', function () {
//     return view('listings', [
//         'heading' => 'Latest Listing',
//         'listings' => [
//             [
//             'id' => 1,
//             'title' => 'listing One',
//             'description' => 'But they are not helping me to format Laravel Blade Codes
//             [blade.php files]. I mean they are not auto indenting the codes as I expected.
//             But I have seen blade codes online which are well indented in visual studio Code IDE.',
//             ],
//             [
//             'id' => 2,
//             'title' => 'listing Two',
//             'description' => 'But they are not helping me to format Laravel Blade Codes
//             [blade.php files]. I mean they are not auto indenting the codes as I expected.
//             But I have seen blade codes online which are well indented in visual studio Code IDE.',
//             ]
//         ]
//     ]); 
// });


// ^ All Listings
// Route::get('/', function () {
//     return view('listings', [
//         // 'heading' => 'Latest Listing',
//         'listings' => Listing::all()
//     ]); 
// });

// ^ Single Listing But error in not page found
// Route::get('/listings/{id}', function($id) {
//     return view('listing', [
//         'listing' => Listing::find($id)
//     ]);
//  });

 // 1st method Single Listing
// Route::get('/listings/{id}', function($id) {
//     $listing = Listing::find($id);

//     if($listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }
//  });

 // ^ 2nd method Single Listing
//  Route::get('/listings/{listing}', function(Listing $listing) {
//         return view('listing', [
//             'listing' => $listing
//         ]);
//  });

// All Listings Route
Route::get('/', [ListingController::class, 'index']);
// Show Create From Route
Route::get('/listings/create', [ListingController::class, 'create']);
// Store Listing Data Route
Route::post('/listings', [ListingController::class, 'store']);
// Single Listing Route
Route::get('/listings/{listing}', [ListingController::class, 'show']);
