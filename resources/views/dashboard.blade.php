@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<!-- <title>Homepage</title> -->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link
	  rel="stylesheet"
	  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
	/>
</head>
<body>
<link rel="stylesheet" type="text/css" href="{{asset('CSS/style.css')}}" >
	<section id="section">
	<div class="container">
		<br><br>
		<div class="row">
		
			<div class="main-container">
		@foreach($post as $post)
				<div class="container1">
          <img src="{{ asset(Voyager::image( $post->image )) }}"/>

          <h5 class="text">{{ $post->title }}</h5>
          <p class="text">Description:</p>
          <p class="disc">{{ $post->short_description }}</p>
          <a href="{{ $post->trailer_url }}">Trailer Video</a>
          <form method="POST" action="votecontroller" class="vote">
             @csrf
         <input type="hidden" name="user_id" id="user_id" value= "{{auth()->user()->id}}">
         <input type="hidden" name="movie_id" id="movie_id" value= "{{ $post->title }}">
         <input type="hidden" name="user_api_token" id="user_api_token" value= "{{auth()->user()->api_token}}">
         <input type="hidden" name="votes" id="votes" value= "yes">
         <button id= "vote" class="btn btn-success">Vote<i class="fa fa-thumbs-up"></i></button>
          </form>
		 </div>
		@endforeach
	</div>		
		</div>
	</div>
</section>
</body>
</html>
@endsection

