@extends('layouts.main')

@section('contents')
@include('partials.navbar')

@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if(session()->has('failed'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('failed') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="d-flex flex-column align-items-center vh-100">
  <div class="h-100 d-flex align-items-center">
    <div class="card px-2" style="width: 25rem; height: fit-content; background-color: #004E79; color: white">
      <div class="card-body">
        <h5 class="card-title fw-bold">Login</h5>
        <form action="/login" method="post" class="fw-semibold">
          @csrf
          <label for="" class="form-label mt-2">Email</label>
          <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com" required value={{ old('email') }} >
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2">Password</label>
          <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" required>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <p class="mb-0 mt-1">
            Lupa Password? <a href="#" class="link-warning text-decoration-none">Klik di sini</a>
          </p>
          <p class="my-0">
            Belum Punya Akun? <a href="register" class="link-warning text-decoration-none">Daftar di sini</a>
          </p>
          <div class="d-grid mb-1">
            <button class="btn btn-warning mt-3">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="w-100">
    @include('partials.footer')
  </div>
</div>
@endsection