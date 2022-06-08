<nav class="navbar-dark sticky-top py-2" style="background-color: #006FAD">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a class="navbar-brand" href="/">
          <img src="/img/foto.jpg" alt="Logo EventIn" width="40" height="30" class="inline-text-top">
          EventIn
        </a>
      </div>
      <div class="col mx-auto my-2 my-lg-0" style="width: 300px">
        <form class="d-flex align-items-center" action="/eventlist">
          @if(request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          <input class="form-control form-control-sm" type="text" placeholder="Search" aria-label="Search" name="search"
            value="{{ request('search') }}">
        </form>
      </div>
      <div class="col">
        @auth
        <button class="float-end btn btn-sm dropdown-toggle p-0" type="button" id="dropdownMenuButton1"
          data-bs-toggle="dropdown" aria-expanded="false" style="border: 0px">
          <img src=" /img/foto.jpg" class="rounded-circle" alt="Profil" height="30">
        </button>
        <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="/profil">Profil</a></li>
          <li><a class="dropdown-item" href="profil/transaksi">Transaksi</a></li>
          <li><a class="dropdown-item" href="/profil/event">Event</a></li>
          @if(Auth::user()->role_id == '1')
          <li><a class="dropdown-item" href="/admin">Admin</a></li>
          @endif
          <li class="list-unstyled my-1" style="border-bottom: 1px solid #ACE2FF"></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item" href="#">Logout</button>
            </form>
          </li>
        </ul>
        @else
        <div class="float-end">
          <a href="/login">
            <button class="btn py-0 btn-outline-light">Masuk</button>
          </a>
          <a href="/register">
            <button class="btn py-0 btn-outline-light">Daftar</button>
          </a>
        </div>
        @endauth
      </div>
    </div>
  </div>
</nav>