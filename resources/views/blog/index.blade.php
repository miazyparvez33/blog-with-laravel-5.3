@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1>Latest Blog Post</h1>
 	</div>
<div class="col-sm-8 col-sm-offset-2 ">
 	@foreach ($blogs as $key => $blog)

 	<article>
		   <h1><a href="{{ action('BlogController@show',[$blog->id]) }}">{{ $blog->title }}</a></h1>
 			<p>{{ $blog->body }}</p>


 	</article>
    @endforeach
	
 </div>
</div>


	
</main>






	


 @endsection