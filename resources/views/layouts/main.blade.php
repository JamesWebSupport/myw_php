<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyWservice</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <!-- Awesome icon -->
        <script src="https://kit.fontawesome.com/cb07202a5d.js" crossorigin="anonymous"></script>



    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                 <a class="navbar-brand" href="/"><img src="{{URL :: asset ('images/logo.jpg')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">AboutMe</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('list_post')}}">Blog</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('dashboard')}}">Dashboard <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      MyWorks
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    @if (auth()->user())
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{auth()->user()->name}}</a>
                        </li>
                        <li class="nav-item">
                            {{-- <form action="{{ route('logout')}}" method="post">
                                <button class='btn' method='submit'>Logout</button>
                            </form> --}}
                            <a class="nav-link" href="{{ route('logout')}}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register')}}">Register</a>
                    @endif



                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </nav>
        </header>


        <div class="container">
          @yield('content')
        </div>


        <footer>
  <!--       <h4 class="text-center"> Copyright by MyWservice</h4> -->
        </footer>



    </body>


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script type="text/javascript">
      CKEDITOR.replace('wysiwyg-editor', {
          filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
    </script>
</html>
