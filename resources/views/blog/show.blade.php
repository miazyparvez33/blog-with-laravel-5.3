@extends('layouts.app')
@include('partials.meta-dynamic');
@section('content')


<main class="container-fluid">

	<div class="container-fluid">
		
		
		<article>

		<div class="col-sm-12 text-center">
			@if($blog->photo)

			
			 	<img style="margin: 0 auto;padding-bottom: 20px;" class="img-responsive featured-image" src="/images/{{ $blog->photo ? $blog->photo->photo: '' }}" alt="{{ str_limit($blog->title,50) }}">
		

			@endif
		</div>
			<div class="jumbotron">
				<h1>{{ $blog->title }}</h1> @if (Auth::user() ? Auth::user()->role_id == 1 || Auth::user()->id == $blog->user_id: '' )
				<a style="float: right" href="{{ action('BlogController@edit',$blog->id)}}">Edit</a>@endif
			</div>
			<div class="col-sm-8 col-sm-offset-2 ">
				

				
				<p>{!! $blog->body !!}</p>

				@foreach ($blog->category as $category)
				<p><a href="{{ route('categories.show',$category->slug) }}">{{ $category->name }}</a></p>
					
				@endforeach
				
				
				
			</div>

			<div>
				<div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					/*
					var disqus_config = function () {
					this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					*/
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = 'https://larablog-com.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

					<script id="dsq-count-scr" src="//larablog-com.disqus.com/count.js" async></script>
					                                
			</div>
		</article>
	</div>


	
</main>









@endsection