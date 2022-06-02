<?php

use App\Http\Controllers\PostsApiController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [PostsApiController::class, 'index']);
Route::post('/posts', [PostsApiController::class, 'store']);
Route::put('/posts/{post}', [PostsApiController::class, 'update']);


/*Route::post('/posts',function(){
    //return post::insert(array('title'=>request('title'), 'content'=>request('content')));
});
Route::put('/posts/{id}', function($id){
    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post = post::findOrfail($id);
    $post->update(['title'=> request('title'), 'content'=>request('content')]);

    return [
        'success' =>$post
    ];
});*/

Route::delete('/posts/{post}', function(post $post){
    $success = $post->delete();

    return [
        'success'=> $success  
    ];
});