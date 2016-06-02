<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreRegistrationRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Contracts\UserImagesServiceInterface;
use App\Models\Image;
use App\User;
use Auth;
use File;

class ImagesController extends Controller
{
	 public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function image()
    {
        if(Auth::check()){
            $image = $this->auth->user()->images;
            return view('users_image', ['images' => $image]);
        }
        return redirect('/');
    }

    public function image_add(Request $request,UserImagesServiceInterface $userimagesService){
        if($userimagesService->addProfileImage($request->file(), $request->all())){
            return redirect('/image');      
        }
        else{
            dd('Oops somthing goes wrong');
        }
    }

    public function setHomeImage(Request $request,Image $image, User $User, UserImagesServiceInterface $userimagesService){
        if($userimagesService->setHomeImage($request->names)){
            echo "1";
        }
        else{
            echo "0";
        }
    }

    public function deleteImage(Request $request,Image $image,UserImagesServiceInterface $userimagesService){
        if($userimagesService->deleteImages($request->ids, $request->names)){
            echo "1";
        }
        
        else{
            echo "0";
        }
    }

   
}
