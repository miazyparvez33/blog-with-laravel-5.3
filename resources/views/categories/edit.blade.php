@extends('layouts.app')

@section('content')



<div class="container-fluid">
	

 	<div class="jumbotron">
 		<h1>Edit Category</h1>
 	</div>

 	<div class="col-sm-10 col-sm-offset-1">

 		 	 {!! Form::model($category,['method' => 'PATCH' , 'action'=> ['CategoryController@update',$category->id ]]) !!}

 	
       
      <div class="form-group">
       {!! Form::label("name","Category Name:") !!}
       {!! Form::text("name",null,['class' => 'form-control']) !!}
      </div>
      


	     <div class="form-group">
	     
	       {!! Form::submit("Update Blog",['class' => 'btn btn-primary']) !!}
	     </div>
     {!! Form::close() !!}

         {!! Form::open([ 'method' => 'DELETE' , 'action'=> ['CategoryController@destroy',$category->id ]]) !!}

		          <div class="form-group">
			     
	               {!! Form::submit("Delete Category",['class' => 'btn btn-danger']) !!}
			     </div>

             {!! Form::close() !!}

 		
 	</div>

	
 </div>


 
	
</main>
 @endsection