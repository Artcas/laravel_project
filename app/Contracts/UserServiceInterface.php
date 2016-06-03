<?php 
namespace App\Contracts;

interface UserServiceInterface {


  /**
     * Login User with post 
     * @param  array  $inputs
  */

   public function loginUser($inputs);
  

    /**
     * User Registration
     * @param  array  $inputs
     * @param  array  $files
     */


   public function UserRegistration($inputs, $files);


    /**
     * Update user information
     * @param  array  $inputs
     * @param  int  $id
     */

   public function updateInformation($inputs,$id);

     /**
     * Images Work
     * @param  array  $filse
     */


   public function getImagesNames($files);

   /**
     * Search users
     * @param  array  $inputs
     * @param  int  $id
     */

   public function searchingUsers($inputs,$id);
}

?>