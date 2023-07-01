@if (Auth::check())
<navbar class="navbar navbar-expand-xl navbar-light fixed-top" style=" font-weight: 400; font-size:18px; color: white;">
  <div class="container-fluid ms-5 me-5" >
      <a class="navbar-brand p-1" style="font-weight: 500; font-size: 25px; padding-left: 1rem;" href="#" ><img src="/img/logo.png" alt="logo"></a>
      <div class="nav">
        <a href="/home">Home</a>
        <a href="/Obat">Daftar Obat</a>
        <a href="/Cart">Pemesanan</a>
        <a href="/Transaksi">Transaksi Penjualan</a>
        <a href="/Distributor">Distributor</a>
      </div>
      
      <div class="navbar-nav">
        {{Auth::user()->name}}<i data-feather="user" class="dropdown-toggle rounded mx-auto d-block ms-2" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"></i>
        <div class="dropdown">
          <ul class="dropdown-menu dropdown-menu-lg-start dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">{{Auth::user()->name}}</a></li>
            <li><a class="dropdown-item" href="{{ url('Cart/cart') }}">Cart</a></li>
            <li><a class="dropdown-item" href="/dashboard/index">Dashboard</a></li>
            <form method="POST" action="{{ route('logout') }}">
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </form>
          </ul>
        </div>
      </div>
    </div>
  </navbar>
@endif