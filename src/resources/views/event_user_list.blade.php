@extends('layouts.main')

@section('contents')
@include('partials.navbar')

<div class="container">
    <h1>Nama Event: {{ $event->name }}</h1>
    <div class="container mt-2">
        {{ $transactions->links() }}
        <table class="table table-bordered border-secondary" style="width: 100%">
            <thead>
                <tr class="text-center">
                    <th scope="col" style="width: 2%">No</th>
                    <th scope="col">Nama User</th>
                    <th scope="col" style="width: 15%">Tanggal</th>
                    <th scope="col" style="width: 10%">Status</th>
                    <th scope="col" style="width: 10%">Gambar</th>
                    <th scope="col" style="width: 10%">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($transactions as $transaction) <tr>
                    <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->timestamp }}</td>
                    <td>
                        @if( $transaction->status  == 0)
                        <span class="badge bg-warning">Belum Dikonfirmasi</span>
                        @elseif( $transaction->status  == 1)
                        <span class="badge bg-success">Sudah Dikonfirmasi</span>
                        @elseif( $transaction->status  == 2)
                        <span class="badge bg-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        @if($transaction->img_path != NULL)
                        <img src="{{ asset('storage/' . $transaction->img_path) }}" alt="Foto Bukti" class="img-thumbnail" style="width: 100px; height: 100px;">
                        @else
                        <span class="badge bg-danger">Belum Upload Bukti</span>
                        @endif
                    </td>
                    <td>
                        @if( $transaction->status  == 0)
                        <form action="/profil/event/{{ $transaction->id }}/acc" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Accept</button>
                        </form>
                        <form action="/profil/event/{{ $transaction->id }}/deny" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Deny</button>
                        </form>
                        @else
                        <span class="badge bg-info">Sudah confirm, GAS</span>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('partials.footer')