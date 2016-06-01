@extends('layouts.master')
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
	</ul>
@endsection
@section('content')
	<div class="container">
		<form method="post" action="/image_add" enctype="multipart/form-data">
			<input type="file" name="images">
			<button type="submit" class="bnt btn-warning">Add</button>
		</form>
	</div>
	<div class="imgs_area">
		<div class="head_name">
			Images
		</div>
		@foreach ($images as  $image)
			<div class="imgs">
				<img src="/images/{!! $image->images !!}" class="images img-thumbnail">
				<div class="shadow">
					<span class="set" id="{!! $image->id !!}">
						<i class="fa fa-check-square fonts" aria-hidden="true"></i>
					</span>
					<span class="delete" id="{!! $image->id !!}" name="{!! $image->images !!}">
						<i class="fa fa-trash fonts" aria-hidden="true"></i>
					</span>
				</div>
			</div>
		@endforeach
	</div>
@endsection