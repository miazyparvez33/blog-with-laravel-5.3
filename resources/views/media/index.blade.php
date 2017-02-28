@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid img-container">
	
 	

 	<div class="jumbotron">
 		<h1>Featured Images</h1>
 	</div>
<div class="col-sm-8 col-sm-offset-2 ">
 	@foreach ($photos as  $photo)

     <li>
     <img style="height:300px;width: 800px; padding-bottom: 15px;" src="/images/{{ $photo->photo }}">

         {!! Form::open([ 'method' => 'DELETE' , 'action'=> ['PhotosController@destroy',$photo->id ]]) !!}

		          <div class="form-group">
			     
	               {!! Form::submit("Delete Photo",['class' => 'btn btn-danger']) !!}
			     </div>

             {!! Form::close() !!}


     </li>

    @endforeach
	
 </div>
</div>


	
</main>






	


 @endsection