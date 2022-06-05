@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="mx-5 my-3">
    <h1 style="font-size: 50px">Ubah Password</h1>
    <div class="mx-5">
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Password Lama</label>
          <input type="password" name="old-password" class="form-control" placeholder="password">
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Password Baru</label>
          <input type="password" name="new-password" class="form-control" placeholder="password">
          <label for="" class="form-label mt-2 fw-bold" style="font-size: 30px">Konfirmasi Password Baru</label>
          <input type="password" name="new-password" class="form-control" placeholder="password">
        <div class="d-flex flex-row justify-content-end my-3">
            <button class="btn border-dark fw-semibold mx-5">Batalkan</button>
            <button class="btn btn-warning fw-semibold">simpan</button>
        </div>
    </div>
</div>