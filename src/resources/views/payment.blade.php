@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card my-3">
        <div class="d-flex">
          <img class="rounded m-3" src="/img/foto.jpg" alt="foto" height="300px" width="500px">
          <div class="text-justify mt-3 ms-3">
            <h5>Judul Event</h5>
            <img src="/icon/tanggal.svg" class="mb-1">
            <p class="d-inline">dd/mm/yyyy</p></br>
            <img src="/icon/jam.svg" class="mb-1">
            <p class="d-inline">hh:mm - hh:mm</p></br>
            <img src="/icon/lokasi.svg" class="mb-1">
            <p class="d-inline">Lokasi</p></br>
          </div>
        </div>
        <li class="list-unstyled my-0" style="border-bottom: 1px solid #ACE2FF"></li>
        <table class="table" style="border-color: #ACE2FF">
          <thead>
            <tr>
              <th scope="col">Jenis Tiket</th>
              <th scope="col" class="text-center">Harga</th>
              <th scope="col" class="text-center">Jumlah</th>
              <th scope="col" class="text-end">Total Harga</th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < 5; $i++) <tr>
              <td><img src="/icon/tiket.svg" alt="" class="mb-1">
                <p class="d-inline">Tiket {{ $i+1 }}</p>
              </td>
              <td class="text-center">Rp. 45.000</td>
              <td class="text-center">x2</td>
              <td class="text-end">Rp. 90.000</td>
              </tr>
              @endfor
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-3 sticky-top" style="height: 50px; top: 63px">
      <div class="card">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Diselenggarakan Pada</h5>
          <img src="/icon/tanggal.svg" class="mb-1">
          <p class="d-inline">dd/mm/yyyy</p></br>
          <img src="/icon/jam.svg" class="mb-1">
          <p class="d-inline">hh:mm - hh:mm</p></br>
          <img src="/icon/lokasi.svg" class="mb-1">
          <p class="d-inline">Lokasi</p></br>
          <li class="list-unstyled my-3" style="border-bottom: 1px solid #ACE2FF"></li>
          <h5 class="fw-bold mb-3">Pesan Sekarang</h5>
        </div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #ACE2FF"></li>
        <div class="row fw-semibold mx-1">
          <div class="col">
            <p>Total Harga</p>
          </div>
          <div class="col text-end" id="total-price">Rp 0</div>
        </div>
        <div class="d-grid m-2">
          <button class="btn btn-warning fw-semibold">Beli Sekarang</button>
        </div>
      </div>
    </div>
  </div>
</div>
@include('partials.footer')
@endsection