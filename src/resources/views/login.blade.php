@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="d-flex flex-column align-items-center vh-100">
  <div class="h-100 d-flex align-items-center">
    <div class="card px-2" style="width: 25rem; height: fit-content; background-color: #004E79; color: white">
      <div class="card-body">
        <h5 class="card-title fw-bold">Login</h5>
        <form action="" class="fw-semibold">
          <label for="" class="form-label mt-2">Email</label>
          <input type="email" class="form-control" placeholder="example@mail.com" required>
          <label for="" class="form-label mt-2">Password</label>
          <input type="password" class="form-control" placeholder="password" required>
        </form>
        <p class="mb-0 mt-1">
          Lupa Password? <a href="#" class="link-warning text-decoration-none">Klik di sini</a>
        </p>
        <p class="my-0">
          Belum Punya Akun? <a href="register" class="link-warning text-decoration-none">Daftar di sini</a>
        </p>
        <div class="d-grid mb-1">
          <button class="btn btn-warning mt-3">Login</button>
        </div>
      </div>
    </div>
  </div>
  <div class="w-100">
    @include('partials.footer')
  </div>
</div>
@endsection