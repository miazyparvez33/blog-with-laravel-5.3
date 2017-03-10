@extends('layouts.app')
@include('partials.meta-static');

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1>Latest Blog Post</h1>
 	</div>
<div class="col-sm-8 col-sm-offset-2 ">



 	<div class="search">
 		
       {!! Form::open(['action'=>'BlogController@index','method'=>'GET', 'role'=>'search']) !!}

              <div class="input-group">

   {!! Form::text('term', Request::get('term'), ['class'=>'form-control', 'placeholder'=>'Search Blogs','id'=>'term']) !!}
                <span class="input-group-btn">

                 <button class="btn btn-primary" type="submit">
                 
                 <span class="">Search</span>
                 	
                 </button>
                	
                </span>
              	
              </div> 

       {!! Form::close()   !!}

 	</div>
<!-- 
 	 @if(Session::has('flash_message'))
 	   <div class="alert alert-success">

 	      {{ Session::get('flash_message')}}

 	      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
 	   	
 	   </div>
 	 @endif -->
 	 
 	@foreach ($blogs as $blog)

 	<article>
             @if($blog->photo)
 					<div class="img-responsiver">
 					     <br>
<img height="200" class="text-cente" src="/images/{{ $blog->photo ? $blog->photo->photo : ''}}" alt="{{ str_limit( $blog->title, 5)}}">
 					</div>
             @endif

		   <h1><a href="{{ action('BlogController@show',[$blog->slug]) }}">{{ $blog->title }}</a></h1>
 					<p>{!! str_limit($blog->body,200) !!}</p>
 					<p> 

             @if($blog->user)
 					<i class="fa fa-btn fa-user"></i> Blog By <a href="{{ route('users.show',$blog->user->username) }}">{{ $blog->user->name }}</a> <i class="fa fa-btn fa-clock-o"></i> 
             @endif

              Posted <strong>{{$blog->created_at->diffForHumans()}}</strong>

 			 @if($blog->category)

 					@foreach($blog->category as $category ) <i class="fa fa-btn fa-cubes"></i>
                     <a href="{{ route('categories.show',$category->slug) }}"> {{$category->name}}</a>
 					@endforeach</p>
 			 @endif	


 	</article>
    @endforeach

    <div class="center">

        {!! $blogs->links() !!}
    	
    </div>
	
 </div>
</div>


	
</main>






	


 @endsection