@extends('layouts.app')

@section('content')


<main>

<div class="container-fluid col-sm-12">
	
 	

 	<div class="jumbotron col-sm-12">
    <div class="col-sm-8">
         <h1> Hello, {{ $user->name }}</h1>
          <p>{{ Auth::user()->role->name}}</p>
    </div>
 		<div class="col-sm-4">
       <br>
       <img class="img-circle" height="150px" width="150px" src="/images/{{ $user->photo ? $user->photo->photo:'default.png' }}"> 
    </div>
 	</div>

</div>



<div class="col-sm-6">

  <h1>Latest Blogs</h1>



     @if($user->blog)

       <ul> 
           @foreach($blog as $blog)



             <li style="list-style-type: none">
               <button class="btn btn-success btn-xs">{{ $blog->status==0 ? 'Draft' : 'Published' }}</button>
           <a href="{{ action('BlogController@show',[$blog->slug]) }}">{{ $blog->title }} </a>
           </li>
    

            @endforeach

            <br>

       </ul>

     

          
        
      
     @endif



  
</div>

 <div class="col-sm-6">

     @if($user->about)

       <div >
            <h2>About</h2>
            <hr>
            <p>{{ $user->about }}</p>
       </div>

     @endif


        <div>
            <h2>URL</h2>
            <hr>
           <a href=" http://{{ $user->username }}">larablog.com/ {{ $user->username }}</a>
       </div>


          @if($user->website)

       <div>
            <h2>Website</h2>
            <hr>
           <a href=" {{ $user->website }}"> {{ $user->website }}</a>
       </div>

     @endif


          @if($user->facebook || $user->twitter || $user->github )

       <div>
            <h2>Get Social</h2>
             <hr>
            
                <ol class="list-unstyled">
                    @if($user->facebook) 
                    <li><a href="{{ $user->facebook}}">{{ $user->facebook}}</a></li>
                    @endif
                </ol>

                <ol class="list-unstyled">
                    @if($user->twitter) 
                    <li><a href="{{ $user->twitter}}">{{ $user->twitter}}</a></li>
                    @endif
                </ol>
                  
                <ol class="list-unstyled">
                    @if($user->github) 
                    <li><a href="{{ $user->github}}">{{ $user->github}}</a></li>
                    @endif
                </ol>
           

            
       </div>

     @endif
     
 </div>




	
</main>






	


 @endsection