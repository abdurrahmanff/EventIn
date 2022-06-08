@extends('layouts.main')

@section('contents')
@include('partials.navbar')
@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="mx-5 my-3">
    <h1 style="font-size: 50px">Profil Saya</h1>
    <div class="mx-5">
        <div class="fw-bold" style="font-size: 30px">Nama</div>
        <div style="font-size: 20px">{{Auth::user()->name}}</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="fw-bold" style="font-size: 30px">E-Mail</div>
        <div style="font-size: 20px">{{Auth::user()->email}}</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="fw-bold" style="font-size: 30px">No. Handphone</div>
        <div style="font-size: 20px">{{Auth::user()->phone_num}}</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="fw-bold" style="font-size: 30px">Tanggal Lahir</div>
        <div style="font-size: 20px">{{Auth::user()->birth}}</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="d-flex flex-row justify-content-end">
            <a href="/ubah-password" class="btn btn-warning fw-semibold mx-5">Ubah Password</a>
            <a href="/ubah-profil" class="btn btn-warning fw-semibold">Ubah Profil</a>
        </div>
    </div>
</div>