@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="d-flex flex-column align-items-center vh-100">
  <div class="h-100 d-flex align-items-center">
    <div class="card px-2" style="width: 25rem; height: fit-content; background-color: #004E79; color: white">
      <div class="card-body">
        <h5 class="card-title fw-bold">Register</h5>
        <form method="POST" action="register" class="fw-semibold">
          @csrf
          <label for="" class="form-label mt-2">Nama</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2">Password</label>
          <input type="password" name="password" class="form-control @error('password') @enderror" placeholder="password">
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2">Konfirmasi Password</label>
          <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') @enderror" placeholder="password">
          <label for="" class="form-label mt-2">Nomor Handphone</label>
          <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') @enderror" placeholder="08xxxxxxxxxx">
          @error('phoneNumber')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2">Tanggal Lahir</label>
          <input type="date" name="birthDate" class="form-control" placeholder="password">
          <input type="date" class="form-control" placeholder="password" required>
          <p class="mb-0 mt-1">
            Lupa Password? <a href="#" class="link-warning text-decoration-none">Klik di sini</a>
          </p>
          <p class="my-0">
            Sudah Punya Akun? <a href="login" class="link-warning text-decoration-none">Masuk di sini</a>
          </p>
          <div class="d-grid mb-1">
            <button type="submit" class="btn btn-warning mt-3">Register</button>
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