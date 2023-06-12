@if (Auth::check())
<navbar class="navbar navbar-expand-xl navbar-light fixed-top" style=" font-weight: 500; font-size:18px;">
  <div class="container-fluid ms-5 me-5">
      <a class="navbar-brand p-1" style="font-weight: 500; font-size: 25px; padding-left: 1rem;" href="#" ><img src="/img/logo.png" alt="logo"></a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse position-absolute start-50 translate-middle-x" id="navbarNav" style="color: black;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link ms-0 me-2" aria-current="page" href="/home">Home</a>
          </li>  

          <li class="nav-item">
            <a class="nav-link ms-3 me-2" aria-current="page" href="/Obat">Daftar Obat</a>
          </li>   
                 
          <li class="nav-item">
            <a class="nav-link ms-3 me-2" href="/Cart">Pemesanan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ms-3 me-2" href="/Transaksi">Transaksi Penjualan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link ms-3 me-0" href="/Distributor">Distributor</a>
          </li>
        </ul>        
      </div>
      
      <div class="navbar-nav">
        {{Auth::user()->name}}<i data-feather="user" class="dropdown-toggle rounded mx-auto d-block ms-2" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
        <div class="dropdown">
          <ul class="dropdown-menu dropdown-menu-lg-start dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
            <li><a class="dropdown-item" href="{{ url('Cart/cart') }}">Cart</a></li>
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <form method="POST" action="{{ route('logout') }}">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </form>
          </ul>
        </div>
        {{-- <div class="dropdown">
          <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="">
            <img src="{{ ('img/user.png') }}" style="width: 25px; height: 25px; text-decoration:none;" alt="">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
            <li><a class="dropdown-item" href="{{ url('Cart/cart') }}">Cart</a></li>
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <form method="POST" action="{{ route('logout') }}">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </form>
          </ul>
        </div>           --}}
      </div>
    </div>
  </navbar>
@endif