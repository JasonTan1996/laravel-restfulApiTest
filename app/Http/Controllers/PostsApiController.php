<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    public function index() {
        return post::all();
    }

    public function store(){   
    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    return post::create([
        'title'=> request('title'),
        'content'=> request('content'),
    ]);
    
    }

    public function update($id) {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        $post = post::findOrfail($id);
        $post->update(['title'=> request('title'), 'content'=>request('content')]);
    
        return [
            'success' =>$post
        ];
    }

    public function delete($post){
        $success = $post->delete();

        return [
            'success'=> $success  
        ];
    }
}
