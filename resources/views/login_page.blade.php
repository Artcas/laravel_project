
@extends('layouts.master')
@section('title', 'Login')



@section('content')
	<h2>{{ isset($name) ? $name : ''}}</h2>
   <div class="row">
   		<div class="col-lg-12">
	   		<div class="container">
	   			<div class="row">
	   				<div class="reg_area">
	   					<h2>Login Form</h2>	
	   					<form method="post" action="/login">
			   				<input class="form-control" type="text" name="username" placeholder="Username" required>	
			   				<input class="form-control" type="password" name="password" placeholder="Password" required>
			   				<input type="submit"  class="btn btn-success aceptit">
	   					</form>
	   				</div>
	   			</div>
	   		</div>
   		</div>
   </div>
@endsection