@extends('layouts.app')

@section('content')



<div class="container-fluid">
	

 	<div class="jumbotron">
 		<h1>Create a  Category</h1>
 	</div>

 	<div class="col-sm-8">

 	 {!! Form::open([ 'method' => 'post' , 'action'=> 'CategoryController@store' ]) !!}
       
      <div class="form-group">
        @include('partials.error-message');  <!--for show error message-->


       {!! Form::label("name","Name:") !!}
       {!! Form::text("name",null,['class' => 'form-control']) !!}
      </div>

      


	     <div class="form-group">
	     
	       {!! Form::submit("Create A Category",['class' => 'btn btn-primary']) !!}
	     </div>
     {!! Form::close() !!}
 		
 	</div>

<div class="col-sm-4">

  <h1 class="page-header">Recent Categories</h1>
  
  <div class="table-responsive">
  	  <table class="table table-striped">
  	    <thead>
  	    	<tr>
            <th>Name</th>
  	    		<th>Action</th>
  	    		
  	
  	    	</tr>
  	    </thead>
  	    <tbody>
  	         
  	               @foreach ($categories as  $category)
                <tr>
                     <th><a href="{{ route('categories.show',$category->slug) }}">{{ $category->name }}</a></th>
                     <th>
                            {!! Form::open([ 'method' => 'DELETE' , 'action'=> ['CategoryController@destroy',$category->id ]]) !!}

              <div class="form-group">
           
                 {!! Form::submit("Delete",['class' => 'btn btn-danger btn-xs']) !!}
           </div>

             {!! Form::close() !!}
                     </th>

  	              	
  	           </tr>
  	              @endforeach
  	    </tbody>

  	  	
  	  </table>
  </div>
	
</div>

	
 </div>


 
	
</main>
 @endsection