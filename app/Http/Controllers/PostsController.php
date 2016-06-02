<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Post;
use App\Contracts\UserPostsServiceInterface;

class PostsController extends Controller
{

    public function addPosts(Request $request, Post $post,UserPostsServiceInterface $UserPostsServiceInterfaces)
    {
        if($UserPostsServiceInterfaces->addPosts($request->all())){
            return redirect('/login');
        }
        return false;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //dd($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Post $post, UserPostsServiceInterface $UserPostsServiceInterfaces)
    {
        if($UserPostsServiceInterfaces->editPosts($request->edit_text,$id)){
         return redirect('/login');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Post $post,UserPostsServiceInterface $UserPostsServiceInterfaces)
    {
        if($UserPostsServiceInterfaces->deletePosts($id)){
            return redirect('/login');
        }
    }
}
