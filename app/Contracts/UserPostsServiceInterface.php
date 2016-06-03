<?php 
namespace App\Contracts;

interface UserPostsServiceInterface{

	/**
     * Adding posts  
     * @param  array  $inputs
     */


	public function addPosts($inputs);

	/**
     * editing posts 
     * @param  array  $inputs
     * @param  int  $id
     */
	
	public function editPosts($inputs,$id);

	/**
     * delteing posts
     * @param  int  $id
     */

	public function deletePosts($id);
}