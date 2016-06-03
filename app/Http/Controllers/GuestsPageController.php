<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\GuestsPageServiceInterface;
use App\Models\Image;
use App\User;
use App\Http\Requests;
use Auth;
use App\Models\Friend_request;

class GuestsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,GuestsPageServiceInterface $guestsPageServiceInterface)
    {
        if($guestsPageServiceInterface->addingToFrend($request->id)){
        	return ['status' => 'success'];
        }
        return ['status' => 'error'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,GuestsPageServiceInterface $guestsPageServiceInterface)
    {
        if(null !== $user = $guestsPageServiceInterface->GetSearchUserById($id)){

        	return view('/guests_page', ['user_data' => $user, 'user' => Auth::user()]);
        }
        return redirect()->back()->withErrors(['massage' => 'Couldnt find that user']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , GuestsPageServiceInterface $guestsPageServiceInterface,Friend_request $friend_request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
