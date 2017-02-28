@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1>Admin Dashboard</h1>
 	</div>
<div class="col-sm-8 col-sm-offset-2 admin-buttons">

<button class="btn btn-primary link"><a style="color:#fff" href="{{ url('/blog/create') }}">Create Blog</a></button>
<button class="btn btn-danger link"><a style="color:#fff" href="{{ url('/blog/bin') }}">Trashed Blog</a></button>
<button class="btn btn-success link"><a style="color:#fff" href="{{ url('/media') }}">Featured Image</a></button>
<button class="btn btn-success link"><a style="color:#fff" href="{{ url('/userslist') }}">Userslist</a></button>
<button class="btn btn-success link"><a style="color:#fff" href="{{ url('/categories/create') }}">Categories</a></button>

 </div>
</div>

<div class="col-sm-12">

  <h1 class="page-header">Recent Blogs</h1>
  
  <div class="table-responsive">
  	  <table class="table table-striped">
  	    <thead>
  	    	<tr>
  	    		<th>Blog Title</th>
  	    		<th>Blog Content</th>
  	    		<th>Status</th>
  	
  	    	</tr>
  	    </thead>
  	    <tbody>
  	         

  	       @foreach ($blog as  $blog)
                  {!! Form::model($blog,[ 'method' => 'PATCH' , 'action'=> ['BlogController@publish',$blog->id ]]) !!}
                  @include('partials.error-message');  <!--for show error message-->
                 
                <tr>
                       
                     <td>{!! Form::text("title",null,['class' => 'form-control']) !!}
<a class="btn btn-danger btn-xs" style="float: right" href="{{ action('BlogController@edit',$blog->id)}}">Edit</a>
                     </td>
                     

                     <td>{!! Form::textarea("body",null,['class' => 'form-control']) !!}</td>
                     <td>
          				      {!! Form::select("status",['0'=>'Draft','1'=>'Published'],null,['class'=>'btn btn-warning btn-xs']) !!}
          					    {!! Form::submit("Submit",['class' => 'btn btn-success btn-xs']) !!}
          				
                    </td>
  	              	
  	           </tr>
                    {!! Form::close() !!}
  	       @endforeach
  	    </tbody>

  	  	
  	  </table>
  </div>
	
</div>


	
</main>






	


 @endsection