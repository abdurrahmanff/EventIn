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
            <h3>{{ $event->name }}</h3>
            <img src="/icon/tanggal.svg" class="mb-1">
            <p class="d-inline">{{ $event->name }}</p></br>
            <img src="/icon/jam.svg" class="mb-1">
            <p class="d-inline">{{ date('d-m-Y', strtotime($event->schedule)) }} hingga {{ date('d-m-Y',
              strtotime($event->end_schedule)) }}</p></br>
            <img src="/icon/lokasi.svg" class="mb-1">
            <p class="d-inline">{{ $event->place }}</p></br>
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
            @foreach($transaction_detail as $ticket)
            <tr>
              <td><img src="/icon/tiket.svg" alt="" class="mb-1">
                <p class="d-inline">Tiket {{ $ticket->ticket_category->name }}</p>
              </td>
              </td>
              <td class="text-center">Rp. {{ $ticket->ticket_category->price }}</td>
              <td class="text-center">x{{ $ticket->count }}</td>
              <td class="text-end">Rp. {{ $ticket->ticket_category->price * $ticket->count }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-3 sticky-top" style="height: 50px; top: 63px">
      <div class="card">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Diselenggarakan Pada</h5>
          <img src="/icon/tanggal.svg" class="mb-1">
          <p class="d-inline">{{ date('d-m-Y', strtotime($event->schedule)) }}</p></br>
          <img src="/icon/jam.svg" class="mb-1">
          <p class="d-inline">{{ date('H:i', strtotime($event->schedule)) }} - {{ date('H:i',
            strtotime($event->end_schedule)) }}</p></br>
          <img src="/icon/lokasi.svg" class="mb-1">
          <p class="d-inline">{{ $event->place }}</p></br>
          <li class="list-unstyled my-3" style="border-bottom: 1px solid #ACE2FF"></li>
          <h5 class="fw-bold mb-3">Pesan Sekarang</h5>
        </div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #ACE2FF"></li>
        <div class="row fw-semibold mx-1">
          <div class="col">
            <p>Total Harga</p>
          </div>
          <div class="col text-end" id="total-price">Rp. {{ $sum }}</div>
        </div>
        <form action="/payment/{{ $transaction->id }}/confirm" method="post">
          @csrf
          <div class="d-grid m-2">
            <button type="submit" class="btn btn-warning fw-semibold">Beli Sekarang</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('partials.footer')
@endsection