<?php 
namespace App\Contracts;

interface GuestsPageServiceInterface{


	/**
     * Search user by ID
     * @param  int  $id
     */

	public function  GetSearchUserById($id);



	/**
     * sending Frend Request
     * @param  int  $id
     */ 

	public function addingToFrend($id);
}