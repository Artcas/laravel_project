<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\User;
use App\Models\Post;
use App\Models\Image;
use File;
use Auth;

class UsersController extends Controller
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home_page');
    }

    public function registr()
    {
        return view('registration_page');
    }

     public function getLogin()
     {
        if(Auth::check()){
            $posts = $this->auth->user()->posts->reverse();
            return view('personal_page', ['user' => Auth::user(),'posts' => $posts]);
        }
        return view('login_page');
    }

    public function postlogout(){
        Auth::logout();
        return redirect('/');
    }

    public function postLogin(Request $request)
    {
     	$username = $request->input('username');
     	$password = $request->input('password');
     	 if (Auth::attempt(['username' => $username, 'password' => $password])) {
            $posts = $this->auth->user()->posts->reverse();
            return view('personal_page', ['user' => $this->auth->user(), 'posts' => $posts]);
        }
         dd('Error');
    }

    public function addPosts(Request $request, Post $post)
    {
       $success =  $post->create($request->all());
       if($success){
            return redirect('/login');
       }
    }

    public function image()
    {
          if(Auth::check()){
            $image = $this->auth->user()->images;
            return view('users_image', ['images' => $image]);
        }
    }

    public function image_add(Request $request, Image $image){
        $img = $this->getImagesName($request->file());
        $inputs = $request->all();
        $inputs['images'] = $img[0]['images'];
        $inputs['user_id'] = Auth::user()->id;
        $success =  $image->create($inputs);
        if($success){
            return redirect('/image');
        }
        else{
            dd('Oops somthing goes wrong');
        }
    }

    public function setHomeImage(Request $request,Image $image, User $User){
        $ids = $request->ids;
        $images = $image->where('id',$ids)->first();
        $userId = $images->user_id;
        $imgLink = $images->images;
        $result = $User->where('id', $userId)->update(['home_img' => $imgLink]);
        if($result){
            echo "1";
        }
        else{
            echo "0";
        }
    }

    public function deleteImage(Request $request,Image $image){
        $ids = $request->ids;
        $name = $request->names;
        $image->where('id',$ids)->delete();
        if($image){
            File::delete(public_path().'/images/'.$name);
            echo "1";
        }
        else{
            echo "0";
        }
    }


    public function setings(Request $request,User $User){
        $user = $this->auth->user();
        return view('setings',['data' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,User $User)
    {
        $password = $request->get('password');
        $repassword = $request->get('repassword');
        if($password == $repassword){
            $img = $this->getImagesNames($request->file());
        	$inputs = $request->all();
        	$inputs['password'] = bcrypt($inputs['password']);
            if(!isset($inputs['home_img'])){
                unset($inputs['home_img']);
            }
            else{
                $inputs['home_img'] = $img[0]['home_img'];
            }
        	$password = $request->input('password');
        	$result = $User->create($inputs);
            if($result != null){
                return view('login_page',['name' => 'Registration complate please use login form']);
            }
            else{
                return view('login_page');
            }
        }
              
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,User $User)
    {
        $ids =   $User->find($id);
        return view('personal_page');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,User $User)
    {
        $password = $request->get('password');
        $repassword = $request->get('repassword');
        if($password == $repassword){
            $inputs = $request->all();
            unset($inputs['_method']);
            unset($inputs['_token']);
            $result =  $User->where('id', $id)->update($inputs);
            if($result){
                return redirect('/setings');
            }
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getImagesNames($files)
    {
        $file_names = [];
        if($files) {
            foreach ($files as $file) {
                $filename = str_random(20).".".$file->getClientOriginalExtension();
                $filenames[]['home_img'] = $filename;
                $file->move(public_path().'/images', $filename);
            }
            return $filenames;
        }
        return '';
    }

    public function getImagesName($files)
    {
        $file_names = [];
        if($files) {
            foreach ($files as $file) {

                $filename = str_random(20).".".$file->getClientOriginalExtension();
                $filenames[]['images'] = $filename;
                $file->move(public_path().'/images', $filename);
            }
            return $filenames;
        }
        return '';
    }
 }
