<?php 
namespace App\Contracts;

interface UserImagesServiceInterface{


	
	/**
     * Adding images 
     * @param  array  $id
     * @param  array  $inputs
     */


	public function addProfileImage($files,$inputs);

	/**
     * seting Home image 
     * @param  string  $name
     */

	public function setHomeImage($name);

	
	/**
     * Delete Images
     * @param  int  $id
     * @param  string  $name
     */

	public function deleteImages($id,$name);
} 