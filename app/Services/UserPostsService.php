<?php 
namespace App\Services;

use App\Contracts\UserPostsServiceInterface;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Post;
use Auth;


class UserPostsService implements UserPostsServiceInterface {

	public function __construct(Guard $auth,Post $post) {
      $this->auth = $auth;
      $this->post = $post;
   }

	public function addPosts($inputs){
		$success =  $this->post->create($inputs);
      	if($success){
      		return true;
      	}
      	else{
      		return false;
      	}
	}

	public function editPosts($inputs, $id){
		$new_text = $inputs;
        $result =  $this->post->where('id', $id)->update(['posts' => $new_text]);
        if($result){
        	return true;
        }
        else{
        	return false;
        }
	}

	public function deletePosts($id){
		$result = $this->post->where('id',$id)->delete();
		if($result){
        	return true;
        }
        else{
        	return false;
        }
	}
}
