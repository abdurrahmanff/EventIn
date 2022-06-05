@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="mx-5 my-3">
    <h1 style="font-size: 50px">Ubah Profil</h1>
    <div class="mx-5">
    @csrf
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Nama</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Nomor Handphone</label>
          <input type="text" name="phoneNumber" class="form-control @error('phoneNumber') @enderror" placeholder="08xxxxxxxxxx">
          @error('phoneNumber')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Tanggal Lahir</label>
          <input type="date" name="birthDate" class="form-control" placeholder="password">
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Password</label>
          <input type="password" name="password" class="form-control @error('password') @enderror" placeholder="password">
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        <div class="d-flex flex-row justify-content-end my-3">
            <button class="btn border-dark fw-semibold mx-5">Batalkan</button>
            <button class="btn btn-warning fw-semibold">simpan</button>
        </div>
    </div>
</div>