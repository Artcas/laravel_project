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
				<img src="/assets/images1/{!! $user->home_img !!}"  class="img-thumbnail">
				<span class="name_area">{{$user->name}}</span>
				<span class="name_area">{{$user->lastname}}</span>
				<h2>
					Add Posts
				</h2>	
				<form method="post" action="/addPosts">
					<input type="hidden" name="user_id" value="{!! $user->id !!}">
					<textarea class="form-control" name="posts">
					</textarea>
					<input type="submit" name="add_posts" class="btn btn-success add_posts">
				</form>
			</div>
			<div class="posts_area col-lg-12">
			
				<table class="table">
					<tr>
						<th>
							Posts
						</th>
						<th>
							data
						</th>
						<th>
							edit/delete
						</th>
					</tr>
				@foreach($posts as $post)
					<tr>
						<td>
							<span class="posts_text">{{$post->posts}}</span>
						</td>
						<td>
							<h5>{{$post->created_at}}</h5>
						</td>
						<td>
							<button class="btn btn-warning slide">Edit</button>
						</td>
						<td class="visible">
							<form action="/posts/{!! $post->id!!}" method="post">
								<input name="_method" type="hidden" value="PUT">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="text" name="edit_text">
								<button class="btn btn-success">Save</button>
							</form>
						</td>
						<td>
							<form action="/posts/{!! $post->id!!}" method="post">
								<input name="_method" type="hidden" value="DELETE">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button class="btn btn-danger">delete</button>
							</form>
						</td>
					</tr>
				@endforeach
				</table>
			</div>	
		</div>

	</div>
@endsection

