<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta_title')</title>
    <meta name="description" content="@yield('meta_desc')">
    <meta name="author" content="@yield('meta_author')">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/sweetalert.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                           <span class="icon-bar"></span>
                           <span class="sr-only">Toggle Navigation</span>
                                   <span class="icon-bar"></span>
                               <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      LaraBlog
                      <!--   {{ config('app.name', 'LaraBlog') }} -->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left">
                       <li class="dropdown"> 
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Categories <span class="caret"></span></a>

         @if($categories)
                  <ul class="dropdown-menu" role="menu">
                   @foreach($categories as $category)
                          @if($category->blog->count() > 0)
                          <li><a href="{{ route('categories.show',$category->slug) }}">{{$category->name}}</a></li>
                          @endif
                   @endforeach
                   </ul>

           @endif

                       </li>
                       @if(Auth::user())
                       <li><a href="{{ url('/users') }}">Profile</a></li>
                      @endif
                      @if(Auth::user() ? Auth::user()->role->id ===1 : '')
                       <li><a href="{{ url('/admin') }}">Admin</a></li>
                      @endif

                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>

    <script type="text/javascript">

        @if(notify()->ready())

            swal({
              title: "{!! notify()->message() !!}",
              type: "{!! notify()->type() !!}",
               
               @if(notify()->option('timer'))

                  timer:"{!! notify()->option('timer') !!}",

                  ShowConfirmButton:false,

               @endif

               html:true
            });

        @endif
        
      
    </script>
</body>
</html>
