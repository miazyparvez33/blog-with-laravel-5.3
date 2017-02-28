@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@include('partials.tinymce');




	
<div class="container-fluid">
	

 	<div class="jumbotron">
 		<h1>Create a  Blog Post</h1>
 	</div>



 	<div class="col-sm-10 col-sm-offset-1">



 	 {!! Form::open([ 'method' => 'post' , 'action'=> 'BlogController@store', 'files'=>true ]) !!}

         @include('partials.error-message');  <!--for show error message-->
 	       <div class="form-group">
       {!! Form::label("category_id","Category:") !!}
       {!! Form::select("category_id[]",$category,null,['id'=>'tag_list','class' => 'form-control','multiple']) !!}

      </div>
       
      <div class="form-group">
       {!! Form::label("title","Title:") !!}
       {!! Form::text("title",null,['class' => 'form-control']) !!}
      </div>
      
	     <div class="form-group">
	       {!! Form::label("body","Body:") !!}
	       {!! Form::textarea("body",null,['class' => 'form-control']) !!}
	     </div>

	     <div class="form-group">
	       {!! Form::label("photo_id","Featured Image:") !!}
	       {!! Form::file("photo_id",null,['class' => 'form-control']) !!}
	     </div>
	        <div class="form-group">
	       {!! Form::label("meta_desc","Meta Description:") !!}
	       {!! Form::text("meta_desc",null,['class' => 'form-control']) !!}
	     </div>

	     <div class="form-group">
	     
	       {!! Form::submit("Save Draft",['class' => 'btn btn-primary']) !!}
	     </div>
     {!! Form::close() !!}
 		
 	</div>
 	

	
 </div>
@include('partials.select-2-script');
</main>

	

 @endsection