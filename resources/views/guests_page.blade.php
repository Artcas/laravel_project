@extends('layouts.master')
@section('title', 'Login')


@section('header')
	<ul class="nav nav-tabs">
	  <li role="presentation" class="dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	      Menu <span class="caret"></span>
	    </a>
	    <ul class="dropdown-menu">
	      	<li>
				<form action="/logout" method="post">
					<button type="submit" name="logout" class="btn btn-default navbar-btn">Logout</button>	
				</form>
			</li>
			<li>
				<a href="/">Home</a>
			</li>
			<li>
				<a href="/setings">Setings</a>
			</li>
			<li>
				<a href="/image">Images</a>
			</li>
	    </ul>
	  </li>
	  <li role="presentation" class="search_area">
	  	<input type="text" class="search_type" id='{!! $user->id!!}'>
		<button type="button" class="btn btn-info search_button">
			<i class="fa fa-search" aria-hidden="true"></i>
		</button>
		<div class="search_data">
		</div>
	  </li>
	</ul>
@endsection
@section('content')
	<div class="container cont_area">
		<div class="row">
			<div class="col-lg-12 content_posts">
				<img src="/assets/images1/{!! $user_data->home_img !!}"  class="img-thumbnail">
				<span class="name_area">{{$user_data->name}}</span>
				<span class="name_area">{{$user_data->lastname}}</span>
			</div>
		</div>
		<div class="row">
			<button type="button" class="btn btn-info frendAdd" id="{!!$user_data->id!!}">Add Frend</button>
			<button type="button" class="btn btn-warning" id="{!!$user_data->id!!}">Write Massage</button>
		</div>
	</div>
@endsection