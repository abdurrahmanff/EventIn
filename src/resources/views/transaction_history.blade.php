@extends('layouts.main')

@section('contents')
@include('partials.navbar')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

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
        <th scope="col">Total Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
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
        <td>
          @php
          $total = 0;
          @endphp
          @foreach ($transaction->transaction_details as $detail)
          @php
            $total += $detail->ticket_category->price * $detail->count;
          @endphp
          @endforeach
          <div class="d-flex justify-content-between">
            <p class="mb-0">Rp. {{ $total }}</p>
          </div>
        </td>
        <td>
          @if ($transaction->status == 0)
          <div class="d-flex justify-content-between">
            <span class="badge bg-warning">Belum Dikonfirmasi</span>
          </div>
          @elseif ($transaction->status == 1)
          <div class="d-flex justify-content-between">
            <span class="badge bg-success">Sudah Dikonfirmasi</span>
          </div>
          @elseif ($transaction->status == 2)
          <div class="d-flex justify-content-between">
            <span class="badge bg-danger">Ditolak</span>
          </div>
          @endif
        </td>
        <td>
          @if($transaction->img_path == NULL && $transaction->status == 0)
          <form action="/profil/transaksi/{{ $transaction->id }}/upload" method="post" enctype="multipart/form-data">
            @csrf
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Pilih Gambar</label>
              <input type="file" class="custom-file-input" id="customFile" name="img_path" required>
              @error('img_path')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Upload</button>
          </form>
          @elseif($transaction->img_path != NULL || $transaction->status == 0)
            <span class="badge bg-info">Sudah Upload</span>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('partials.footer')
@endsection