<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])->paginate(6);

        foreach($posts as $post) {
            if ($post->img_path) {
                $post->img_path = asset('storage/' . $post->img_path);
            }
        }

        return response()->json([
            'success' => true,
            'result' => $posts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
        ->with(['category', 'tags'])
        ->first();
        if ($post->img_path) {
            $post->img_path = asset('storage/' . $post->img_path);
        }

        if ($post) {
            return response()->json([
                'success' => true,
                'result' => $post
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Post non esistente'
            ]);
        }
    }
}
