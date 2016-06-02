<?php 
namespace App\Contracts;

interface UserPostsServiceInterface{



	// Adding posts 


	public function addPosts($inputs);

	// editing posts
	
	public function editPosts($inputs,$id);

	//delteing posts

	public function deletePosts($id);
}