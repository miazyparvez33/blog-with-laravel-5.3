@extends('layouts.app')

@section('content')



<div class="container-fluid">
	

 	<div class="jumbotron">
 		<h1>Create a  Blog Post</h1>
 	</div>

 	<div class="col-sm-10 col-sm-offset-1">

 	 {!! Form::open([ 'method' => 'post' , 'action'=> 'BlogController@store' ]) !!}
       
      <div class="form-group">
       {!! Form::label("title","Title:") !!}
       {!! Form::text("title",null,['class' => 'form-control']) !!}
      </div>
      
	     <div class="form-group">
	       {!! Form::label("body","Body:") !!}
	       {!! Form::textarea("body",null,['class' => 'form-control']) !!}
	     </div>

	     <div class="form-group">
	     
	       {!! Form::submit("Create A Blog",['class' => 'btn btn-primary']) !!}
	     </div>
     {!! Form::close() !!}
 		
 	</div>

	
 </div>


 
	
</main>
 @endsection