@extends('layouts.app')

@section('content')


<main>

<div class="container-fluid col-sm-12">
	
 	

 	<div class="jumbotron col-sm-12">
    <div class="col-sm-8">
         <h1> Hello, {{ $user->name }}</h1>
          <p>{{ Auth::user()->role->name}}</p>

           @if($user->blog->count() > 0 ) 

           <button class="btn btn-primary btn-xs">{{  $user->blog->count()  }} Blogs</button>

           @endif

    </div>
 		<div class="col-sm-4">
       <br>
       <img class="img-circle" height="150px" width="150px" src="/images/{{ $user->photo ? $user->photo->photo:'default.png' }}"> 
    </div>
 	</div>

</div>



<div class="col-sm-7">




  @if($user->blog->count() > 0 ) 

     <h1>Latest Blogs  By <small><a href="{{ route('users.show',$user->username)}}">{{ $user->name}}</a></small></h1>

     <hr>
      
           @foreach($user->blog as $blog)


            <h2><a href="{{ action('BlogController@show',[$blog->slug]) }}">{{ $blog->title }}</a></h2>


          {!! str_limit( $blog->body,200)!!} <a class="btn btn-primary btn-xs" href="{{ action('BlogController@show',[$blog->slug]) }}">Read More</a>


          <p> 



              Posted <strong>{{$blog->created_at->diffForHumans()}}</strong>

       @if($blog->category)

          @foreach($blog->category as $category ) <i class="fa fa-btn fa-cubes"></i>
                     <a href="{{ route('categories.show',$category->slug) }}"> {{$category->name}}</a>
          @endforeach
       @endif
          </p>


            @endforeach



  @endif



  
</div>

 <div class="col-sm-5">

@include('partials.user-sidebar');
     
 </div>




	
</main>






	


 @endsection