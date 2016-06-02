<?php 
namespace App\Contracts;

interface UserServiceInterface {

	// Login User with post 

   public function loginUser($inputs);
  

  // User Registration

   public function UserRegistration($inputs, $files);

   // Update user information

   public function updateInformation($inputs,$id);

   
   // Images Work


   public function getImagesNames($files);


   // Search users

   public function searchingUsers($inputs,$id);
}

?>