@if (Auth::check())
<navbar class="navbar navbar-expand-xl navbar-dark" style=" font-weight: 500; font-size:15px;">
  <div class="container">
      <a class="navbar-brand me-5 ms-5 p-1"   style="font-weight: 500; font-size: 23px; padding-left: 1rem;" href="#" ><img src="/img/logo.png" alt="logo">APOTEK</a>
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ms-5" id="navbarNav">
        <ul class="navbar-nav ms-5">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/Home">Home</a>
          </li>  

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/Obat">Daftar Obat</a>
          </li>   
                 
          <li class="nav-item">
            <a class="nav-link" href="/Cart">Pemesanan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/Transaksi">Transaksi Penjualan</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/Distributor">Distributor</a>
          </li>
        </ul>        
      </div>
      <div class="navbar-nav">
        <div class="dropdown">
          <a class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="">
            <img src="{{ ('img/user.png') }}" style="width: 25px; height: 25px; text-decoration:none;" alt="">
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <form method="POST" action="{{ route('logout') }}">
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </form>
          </ul>
        </div>          
      </div>
    </div>
</navbar>
@endif