<?php 
namespace App\Services;

use App\User;
use App\Models\Image;
use App\Contracts\GuestsPageServiceInterface;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Friend_request;
use Auth;
use File;


class GuestsPageService implements GuestsPageServiceInterface {
	public function __construct(User $user,Image $image,Friend_request $friend_request) {
      $this->user = $user;
      $this->image = $image;
      $this->frend_request = $friend_request;
   }

   public function  GetSearchUserById($id){
   		$serchuser = $this->user->where('id',$id)->first();
   		return $serchuser;
   }

   public function addingToFrend($id){
   		return $this->frend_request->create(['auth_user_id' => Auth::user()->id , 'search_user_id' => $id, 'requests' => 1
   			]);
   }
}




