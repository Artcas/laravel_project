<?php 
namespace App\Services;

use App\User;
use App\Models\Image;
use App\Contracts\UserImagesServiceInterface;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use File;


class UserImagesService implements UserImagesServiceInterface {

	public function __construct(Guard $auth,Image $image) {
      $this->auth = $auth;
      $this->image = $image;
   }

   public function addProfileImage($files, $inputs){

   		$img = $this->getImagesName($files);
   		$inputs['images'] = $img[0]['images'];
   		$inputs['user_id'] = $this->auth->user()->id;
   		$success =  $this->image->create($inputs);
        if($success){
        	return true;
        }
        else{
        	return false;
        }

   }

   public function setHomeImage($name){
        $userId  = $this->auth->user()->id;
        $imgLink = $name;
        $result  = $this->auth->user()->where('id', $userId)->update(['home_img' => $imgLink]);
        if($result){
        	return true;
        }
        return false;
   }

   public function deleteImages($id,$name){
        $image = $this->image->where('id',$id)->delete();
        if($image){
            File::delete(public_path().'/assets/images1/'.$name);
            return true;
        }
        else{
        	return false;
        }
   }

    public function getImagesName($files)
    {
        $file_names = [];
        if($files) {
            foreach ($files as $file) {
                
                $filename = str_random(20).".".$file->getClientOriginalExtension();
                $file_names[]['images'] = $filename;
                $file->move(public_path().'/assets/images1', $filename);
            }
            return $file_names;
        }
        return '';
    }
}