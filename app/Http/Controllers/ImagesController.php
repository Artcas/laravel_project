<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Image;
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
