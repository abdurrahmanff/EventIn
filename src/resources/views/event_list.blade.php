@extends('layouts.main')

@section('contents')
@include('partials.navbar')

<div class="container">
    <h1>Daftar Event</h1>
    <div class="container mt-2">
        {{ $events->links() }}
        <table class="table table-bordered border-secondary" style="width: 100%">
          <thead>
            <tr class="text-center">
              <th scope="col" style="width: 2%">No</th>
              <th scope="col">Nama Event</th>
              <th scope="col" style="width: 15%">Tanggal</th>
              <th scope="col" style="width: 10%">Status</th>
              <th scope="col" style="width: 10%">Aksi</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @foreach($events as $event) <tr>
              <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
              <td>{{ $event->name }}</td>
              <td>{{ $event->schedule }}</td>
              <td>
                @if( $event->status  == 0)
                <span class="badge bg-warning">Event Belum Dikonfirmasi Admin</span>
                @elseif( $event->status  == 1)
                <span class="badge bg-success">Event Sudah Dikonfirmasi Admin</span>
                @elseif( $event->status  == 2)
                <span class="badge bg-danger">Event Ditolak Admin</span>
                @endif
              </td>
              <td>
                <a href="/profil/event/{{ $event->id }}" class="btn btn-primary">List Pembeli</a>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
@include('partials.footer')