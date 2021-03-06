@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1>Users on New Larablog</h1>
 	</div>

</div>

<div class="col-sm-12">

  <h1 class="page-header">Recent Users</h1>
  
  <div class="table-responsive">
  	  <table class="table table-striped">
  	    <thead>
  	    	<tr>
  	    		<th>Name</th>
  	    		<th>Email</th>
            <th>Joined</th>
            <th>Role</th>
  	    		<th>Action</th>
  	
  	    	</tr>
  	    </thead>
  	    <tbody>
  	         
  	               @foreach ($users as  $user)
                <tr>
                     <th><a href="{{ route('users.show',$user->username) }}">{{$user->name }}</a></th>
                     <th>{{$user->email}}</th>
                     <th>{{$user->created_at->diffForHumans()}}</th>
                     <th>
                    
                    
              {!! Form::model($user,[ 'method' => 'PATCH' , 'action'=> ['UserController@update',$user->id ]]) !!}

				      {!! Form::select("role_id",['1'=>'Administrator','2'=>'Subscriber','3'=>'Author'],null,['class'=>'btn btn-primary btn-xs']) !!}
					     </th>
                    <th>
			              {!! Form::submit("Update",['class' => 'btn btn-success btn-xs']) !!} 
                     {!! Form::close() !!}
                   
                      


         {!! Form::open([ 'method' => 'DELETE' , 'action'=> ['UserController@destroy',$user->id ]]) !!}

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


	
</main>






	


 @endsection