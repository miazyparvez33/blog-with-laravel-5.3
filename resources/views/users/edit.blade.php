@extends('layouts.app')

@section('content')


<main class="container-fluid">

<div class="container-fluid">
	
 	

 	<div class="jumbotron">
 		<h1> Hello,{{ $user->name }}</h1>
    <p>Please make changes to make your profile awesome</p>
 	</div>

</div>



<div class="col-sm-8 col-sm-offset-2">

    {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->username],'files'=>true]) !!}

        <div class="form-group">
        @include('partials.error-message');  <!--for show error message-->

           {!! Form::label("name","Name")   !!}
           {!! Form::text("name",null,['class'=>'form-control','placeholder'=>'Your Name'])   !!}
          
        </div>



          <div class="form-group">

           {!! Form::label("website","Website Name")   !!}
           {!! Form::text("website",null,['class'=>'form-control','placeholder'=>'Paste Your Website Url'])   !!}
          
        </div>
                <div class="form-group">

           {!! Form::label("facebook","Facebook")   !!}
           {!! Form::text("facebook",null,['class'=>'form-control','placeholder'=>'Paste Your Facebook Url'])   !!}
          
        </div>
                <div class="form-group">

           {!! Form::label("twitter","Twitter")   !!}
           {!! Form::text("twitter",null,['class'=>'form-control','placeholder'=>'Paste Your Twitter Url'])   !!}
          
        </div>
                <div class="form-group">

           {!! Form::label("github","Github")   !!}
           {!! Form::text("github",null,['class'=>'form-control','placeholder'=>'Paste Your Github Url'])   !!}
          
        </div>

        <div class="form-group">

           {!! Form::label("about","About")   !!}
           {!! Form::textarea("about",null,['class'=>'form-control','placeholder'=>'About Yourself'])   !!}
          
        </div>

        <div class="form-group">

           {!! Form::label("photo_id","Profile Picture")   !!}
           {!! Form::file("photo_id",null,['class'=>'form-control','placeholder'=>'Your Photo'])   !!}
          
        </div>

               <div class="form-group">
       
         {!! Form::submit("Update User",['class' => 'btn btn-primary']) !!}
       </div>
    {!! Form::close() !!}



  
</div>




	
</main>






	


 @endsection