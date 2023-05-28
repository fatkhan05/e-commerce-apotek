<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&family=Poltawski+Nowy:wght@700&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&family=Secular+One&display=swap" rel="stylesheet">
    {{-- @include('partials.style') --}}
  </head>
  @livewireStyles
  {{-- <body style="background-color: aliceblue">   --}}
    <body>
      
      @include ('partials.navbar')
        <div class="" >
          @if (Session::has('success'))
            <div class="pt-3">
              <div class="alert alert-success">
                  {{ Session::get('success')}}
                </div>  
            </div>          
          @endif
            @yield('container')
        </div>

    @livewireScripts
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>