@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	  <div class="jumbotron col-sm-12">
    <div class="col-sm-8">
         <h1> Hello, {{ Auth::user()->name }}</h1>
         <p>{{ Auth::user()->role->name}}</p>

        @if(Auth::user()->role->id == 2)
         <button class="btn btn-primary info btn-xs"><a style="color:#fff" href="{{ url('/blog/create') }}">Create Blog</a></button>
         @endif
         <button class="btn btn-success info btn-xs"><a style="color:#fff" href="{{ action('UserController@edit',[Auth::user()->username])}}">Profile Settings</a></button>
    </div>
    <div class="col-sm-4">
       <br>
       <img class="img-circle" height="150px" width="150px" src="/images/{{ Auth::user()->photo ? Auth::user()->photo->photo:'default.png' }}"> 
    </div>
  </div>

<div class="col-sm-8 col-sm-offset-2 admin-buttons">


<button class="btn btn-success link"><a style="color:#fff" href="{{ url('/categories/create') }}">Categories</a></button>

</div>

</div>

<div class="col-sm-12">

  <h1>Latest Blogs</h1>

  @if($user = Auth::user())

     @if($user->blog)

       <ul> 
           @foreach($blog as $blog)

           @if($blog->user_id== $user->id)

             <li style="list-style-type: none">
               <button class="btn btn-success btn-xs">{{ $blog->status==0 ? 'Draft' : 'Published' }}</button>
       	   <a href="{{ action('BlogController@show',[$blog->slug]) }}">{{ $blog->title }}	</a>
       	   </li>
           @endif

       	    @endforeach

       </ul>

     

       		
       	
      
     @endif

  @endif

	
</div>


	
</main>






	


 @endsection