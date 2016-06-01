<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Contracts\UserServiceInterface;
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
        if(Auth::check()) {
            $posts = $this->auth->user()->posts->reverse();
            return view('personal_page', ['user' => $this->auth->user(), 'posts' => $posts]);
        }
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

    public function postLogin(Request $request, UserServiceInterface $userService)
    {
       if($userService->loginUser($request->all())){
            return redirect('/');
       }
       return redirect()->back()->withErrors(['massage' => 'wrong username or password']);
    }

    
    public function setings(Request $request,User $User){
        if(Auth::check()){
            $user = $this->auth->user();
            return view('setings',['data' => $user]);
        }
         return redirect('/');
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
    public function store(Request $request , UserServiceInterface $userService)
    {
        if($userService->UserRegistration($request->all(),$request->file())){
            return view('login_page',['name' => 'Registration complate please use login form']); 
        } 
        return redirect()->back()->withErrors(['massage' => 'Somthing Goes Wrong']);
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
    public function update(Request $request, $id,UserServiceInterface $userService)
    {
         if($userService->updateInformation($request->all(), $id)){
            return redirect('/setings');
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

   

   
 }
