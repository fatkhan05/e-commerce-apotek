<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
      <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{ config('midtrans.client_key') }}"></script>
      <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

      <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&family=Poltawski+Nowy:wght@700&family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&family=Secular+One&display=swap&family=Roboto:ital,wght@1,700" rel="stylesheet">
    {{-- @include('partials.style') --}}

    <style>
      footer {
        
      }
    </style>
  </head>
  @livewireStyles
  <body style="margin-top: 4rem;">  
    {{-- <body> --}}
      
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

    @if (Auth::check())
    {{-- <footer>
      <div class="row text-center">
        <div class="col-4">
          <h1>test</h1>
        </div>
        <div class="col-4">
          <h1>test</h1>
        </div>
        <div class="col-4">
          <h1>test</h1>
        </div>
      </div>
      <h5 class="text-center "><b>created by fatkhanakbar&copy 2023</b></h5>
    </footer> --}}
    @endif
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
      feather.replace()
    </script>
  </body>
</html>