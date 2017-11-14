<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/add', function () {
    return view('add');
});

/*
 * View routes
 */

// Return home page
Route::get('/', 'MaterialController@index'); // 'MaterialController@home');

// Return page with specific material type or all materials.
Route::get('/materials/{type}', 'MaterialController@materials');

// Return page with material info based on id.
Route::get('/material/id/{id}', 'MaterialController@id');

Route::get('/materialsearch', 'MaterialController@materialsearch');

/*
// Return index (news) page
Route::get('/index', 'MaterialController@index'); 
*/

// Return info page
Route::get('/info', 'MaterialController@info');

// Return material page view
Route::get('/material', 'MaterialController@material');

/*
 * API Routes
 */

// Get all materials
Route::get('/api/materials/all', 'MaterialController@api_all');

// Get material based on name
Route::get('/api/materials/name/{name}', 'MaterialController@api_name');

// Get material based on id
Route::get('/api/materials/id/{id}', 'MaterialController@api_id');

// Get materials based on type
Route::get('/api/materials/type/{type}', 'MaterialController@api_type');

// Add new material
Route::post('/api/materials/add', 'MaterialController@api_add');

// Delete material
Route::delete('/api/materials/delete/{id}', 'MaterialController@api_delete');

// Update material
Route::put('/api/materials/update/{id}', 'MaterialController@api_update');