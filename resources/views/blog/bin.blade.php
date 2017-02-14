@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1>Deleted Blog Post</h1>
 	</div>
<div class="col-sm-8 col-sm-offset-2 ">
 	@foreach ($deletedblog as $key => $blog)

 	<article>
		   <h1>{{ $blog->title }}</h1>
 			<p>{{ $blog->body }}</p>
 	</article>
    @endforeach
	
 </div>
</div>

 
	
</main>






	


 @endsection