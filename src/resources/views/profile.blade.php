@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="mx-5 my-3">
    <h1 style="font-size: 50px">Profil Saya</h1>
    <div class="mx-5">
        <div class="fw-bold" style="font-size: 30px">Nama</div>
        <div style="font-size: 20px">Nama Yang Bersangkutan</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="fw-bold" style="font-size: 30px">E-Mail</div>
        <div style="font-size: 20px">yangbersangkutan@example.com</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="fw-bold" style="font-size: 30px">No. Handphone</div>
        <div style="font-size: 20px">081234567890</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="fw-bold" style="font-size: 30px">Tanggal Lahir</div>
        <div style="font-size: 20px">XX Bulan XXXX</div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #000000"></li>
        <div class="d-flex flex-row justify-content-end">
            <button class="btn btn-warning fw-semibold mx-5">Ubah Password</button>
            <button class="btn btn-warning fw-semibold">Ubah Profil</button>
        </div>
    </div>
</div>