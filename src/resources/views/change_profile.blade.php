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
    <h1 style="font-size: 50px">Ubah Profil</h1>
    <div class="mx-5">
      <form method="POST" action="/ubah-profil">
        @csrf
              <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Nama</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{Auth::user()->name}}">
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Email</label>
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{Auth::user()->email}}">
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Nomor Handphone</label>
              <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') @enderror" value="{{Auth::user()->phone_num}}">
              @error('phoneNumber')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Tanggal Lahir</label>
              <input type="date" name="birthDate" class="form-control" value="{{Auth::user()->birth}}">
              <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Password</label>
              <input type="password" name="password" class="form-control @error('password') @enderror" placeholder="********">
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