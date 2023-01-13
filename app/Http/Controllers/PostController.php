<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storePostRequest;
use App\Http\Requests\updatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth()->user()->posts;

        return response()->json([
            'status' =>'true',
            'message' =>'the posts are',
            'post' => $posts
        ],200);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePostRequest $request)
    {
        $validated = $request->validated();
        $posts = Post::create($validated->all());

        return response()->json([
            'status' =>'true',
            'message' =>'the posts are created successfully',
            'post' => $posts
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Auth()->user()->posts;
        $viewPost = $posts->findOrFail($id);
        return response()->json([
            'status' =>'true',
            'message' =>'the posts are created successfully',
            'post' => $viewPost
        ],200);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updatePostRequest $request, $id)
    {
        $validated = $request->validated();

        $posts = Post::findOrFail($id);
        $posts->update($validated->all());
        return response()->json([
            'status' =>'true',
            'message' =>'the posts are updated successfully',
            'post' => $posts
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::destroy($id);
    }
    public function trashed(){
        $post = Post::onlyTrashed()->get();
        return response()->json([
            'status' =>'true',
            'message' =>'the posts trashed are',
            'post' => $post
        ],200);

    }
    public function trashedRestore($id){
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return response()->json([
            'status' =>'true',
            'message' =>'the post trashed are restored',
            'post' => $post
        ],200);

    }
}
