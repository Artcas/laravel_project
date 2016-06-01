@extends('layouts.master')

@section('title', 'personal')
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
				<a href="/login">Home</a>
			</li>
			<li>
				<a href="/setings">Setings</a>
			</li>
			<li>
				<a href="/image">Images</a>
			</li>
	    </ul>
	  </li>
	</ul>
@endsection
@section('content')
	<div class="row">
		<div class="reg_area">
			<h2>Change your personal information</h2>	
			<form method="post" action="/users/setings/{!! $data->id!!}" enctype="multipart/form-data">
				<input name="_method" type="hidden" value="PUT">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
   				<input class="form-control" type="text" name="username" placeholder="Username" value="{!! $data->username!!}" required>	
   				<input class="form-control" type="text" name="name" placeholder="Name" value="{!! $data->name!!}">	
   				<input class="form-control" type="text" name="lastname" placeholder="Lastname" value="{!! $data->lastname!!}">	
   				<input class="form-control" type="email" name="email" placeholder="Email" value="{!! $data->email!!}" required>	
   				<input class="form-control" type="password" name="password" placeholder="Password" value="{!! $data->password!!}" required>
   				<input class="form-control" type="password" name="repassword" placeholder="Repassword" value="{!! $data->password!!}" required>
   				<input type="submit"  class="btn btn-success aceptit" value="Change">
			</form>
		</div>
	</div>
@endsection