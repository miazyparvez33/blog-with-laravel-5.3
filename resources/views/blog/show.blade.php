@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 
<div class="col-sm-8 col-sm-offset-2 ">
 	

 	<article>
 		<div class="jumbotron">
 		<h1>{{ $blog->title }}</h1>
 	</div>

 			<p>{{ $blog->body }}</p>
 	</article>

	
 </div>
</div>

 
	
</main>






	


 @endsection