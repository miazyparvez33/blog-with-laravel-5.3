@extends('layouts.app')

@section('content')



<div class="container-fluid">
	

 	<div class="jumbotron">
 		<h1>Create a  Category</h1>
 	</div>

 	<div class="col-sm-10 col-sm-offset-1">

 	 {!! Form::open([ 'method' => 'post' , 'action'=> 'CategoryController@store' ]) !!}
       
      <div class="form-group">
       {!! Form::label("name","Name:") !!}
       {!! Form::text("name",null,['class' => 'form-control']) !!}
      </div>
      


	     <div class="form-group">
	     
	       {!! Form::submit("Create A Category",['class' => 'btn btn-primary']) !!}
	     </div>
     {!! Form::close() !!}
 		
 	</div>

	
 </div>


 
	
</main>
 @endsection