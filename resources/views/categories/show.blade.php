@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1>{{ $category->name }}</h1><a style="float:right" href="{{ action('CategoryController@edit',$category->id)}}">Edit</a>
 	</div>


 	<h2 class="text-center">
 	<strong>
 		Recent Blog on {{ $category->name }}
 	</strong>
 		
 	</h2>
 	<hr>
<div class="col-sm-8 col-sm-offset-2 ">
 	@foreach ($category->blog as  $blog)

 
		   
 		
   <li><a href="{{ action('BlogController@show',[$blog->slug])}}">{{ $blog->title }}</a></li>



    @endforeach
	
 </div>
</div>


	
</main>






	


 @endsection