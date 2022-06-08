@extends('layouts.main')

@section('contents')
@include('partials.navbar')
@if(session()->has('failed'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('failed') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="mx-5 my-3">
    <h1 style="font-size: 50px">Ubah Password</h1>
    <div class="mx-5">
        <form method="POST" action="/ubah-password">
            @csrf
            <label for="" class="form-label mt-2 fw-bold @error('password') is-invalid @enderror" style="font-size: 30px">Password Lama</label>
            <input type="password" name="katasandi" class="form-control" placeholder="password">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="" class="form-label mt-2 fw-bold @error('password') is-invalid @enderror" style="font-size: 30px">Password Baru</label>
            <input type="password" name="password" class="form-control" placeholder="password">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            <label for="" class="form-label mt-2 fw-bold @error('password') is-invalid @enderror" style="font-size: 30px">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="password">
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          <div class="d-flex flex-row justify-content-end my-3">
              <a href="/profil" class="btn border-dark fw-semibold mx-5">Batalkan</a>
              <button type="submit" class="btn btn-warning fw-semibold">simpan</button>
          </div>
        </form>
    </div>
</div>