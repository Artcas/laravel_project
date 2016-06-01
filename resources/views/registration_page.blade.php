

@extends('layouts.master')
@section('title', 'Registration')


@section('content')
   <div class="row">
   		<div class="col-lg-12">
	   		<div class="container">
	   			<div class="row">
	   				<div class="reg_area">
	   					<h2>Registration Form</h2>	
	   					<form method="post" action="/users" enctype="multipart/form-data">
	   						<input type="hidden" name="_token" value="{{ csrf_token() }}">
			   				<input class="form-control" type="text" name="username" placeholder="Username" required>	
			   				<input class="form-control" type="text" name="name" placeholder="Name">	
			   				<input class="form-control" type="text" name="lastname" placeholder="Lastname">	
			   				<input class="form-control" type="email" name="email" placeholder="Email" required>	
			   				<input type="file" name="home_img" class="form-control">
			   				<input class="form-control" type="password" name="password" placeholder="Password" required>
			   				<input class="form-control" type="password" name="repassword" placeholder="Repassword" required>
			   				<input type="submit"  class="btn btn-success aceptit">
	   					</form>
	   				</div>
	   			</div>
	   		</div>
   		</div>
   </div>
@endsection

