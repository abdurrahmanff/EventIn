@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<div class="container vh-100">
  <h1 class="my-3">Daftar Transaksi</h1>
  {{ $transactions->links() }}
  <table class="table table-bordered border-secondary" style="width: 100%">
    <thead>
      <tr class="text-center">
        <th scope="col" style="width: 2%">No</th>
        <th scope="col" style="width: 55%">Nama Event</th>
        <th scope="col" style="width: 20%">Tanggal Pembelian</th>
        <th scope="col">Tiket</th>
      </tr>
    </thead>
    <tbody class="align-middle">
      @foreach ($transactions as $transaction)
      <tr>
        <th scope="col" class="text-center">{{ $loop->index+1 }}</th>
        <td>{{ $transaction->event->name }}</td>
        <td>{{ $transaction->timestamp }}</td>
        <td>
          @foreach ($transaction->transaction_details as $detail)
          <div class="d-flex justify-content-between">
            <p class="mb-0">Tiket {{ $detail->ticket_category->name }}</p>
            <p class="mb-0">{{ $detail->count }}x</p>
          </div>
          @endforeach
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('partials.footer')
@endsection