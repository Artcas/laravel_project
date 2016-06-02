<?php 
namespace App\Contracts;

interface UserImagesServiceInterface{


	// Adding images 


	public function addProfileImage($files,$inputs);

	// seting Home image

	public function setHomeImage($name);

	// Delete Images

	public function deleteImages($id,$name);
} 