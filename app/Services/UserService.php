<?php 
namespace App\Services;

use App\User;
use App\Models\Post;
use App\Models\Image;
use App\Contracts\UserServiceInterface;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use File;

class UserService implements UserServiceInterface {

   

  public function __construct(User $user) {
      $this->user = $user;
   }

  public function loginUser($inputs){
    $username = $inputs['username'];
    $password = $inputs['password'];
     if (Auth::attempt(['username' => $username, 'password' => $password])) {
        return true;
    }
    return false;
   }

  public function UserRegistration($inputs, $files){
    $password = $inputs['password'];
    $repassword = $inputs['repassword'];
    if($password == $repassword){
      $img = $this->getImagesNames($files);
      $input = $inputs;
      $input['password'] = bcrypt($inputs['password']);
      if(!isset($input['home_img'])){
          unset($input['home_img']);
      }
      else{
          $input['home_img'] = $img[0]['home_img'];
      }
      $password = $inputs['password'];
      $result = $this->user->create($input);  
      return true; 
      }
    return false;
    }

    public function updateInformation($inputs, $id){
        $password = $inputs['password'];
        $repassword = $inputs['repassword'];
        if($password == $repassword){
            unset($inputs['_method']);
            unset($inputs['_token']);
            $result =  $this->user->where('id', $id)->update($inputs);
            return true;
       } 
       return false;    
    }

     public function getImagesNames($files)
    {
        $file_names = [];
        if($files) {
            foreach ($files as $file) {
                $filename = str_random(20).".".$file->getClientOriginalExtension();
                $file_names[]['home_img'] = $filename;
                $file->move(public_path().'/images', $filename);
            }
            return $file_names;
        }
        return '';
    }
}