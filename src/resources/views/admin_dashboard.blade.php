@extends('layouts.main')

@section('contents')

<nav class="sticky-top py-2" style="background-color: #006FAD">
  <div class="container-fluid d-flex">
    <h5 style="color: #FF7A00">
      <a href="/admin" class="text-decoration-none navbar-brand" style="width: min-content">
        EventIn <span style="color: black">Admin</span>
      </a>
    </h5>
    <div class="ms-auto">
      <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Log Out</button>
      </form>
    </div>
  </div>
</nav>
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container mt-2">
  {{ $events->links() }}
  <table class="table table-bordered border-secondary" style="width: 100%">
    <thead>
      <tr class="text-center">
        <th scope="col" style="width: 2%">No</th>
        <th scope="col" style="width: 20%">Nama EO</th>
        <th scope="col">Nama Event</th>
        <th scope="col" style="width: 15%">Tanggal</th>
        <th scope="col" style="width: 10%">Status</th>
        <th scope="col" style="width: 10%">Aksi</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($events as $event) <tr>
        <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
        <td>{{ $event->user->name }}</td>
        <td>{{ $event->name }}</td>
        <td>{{ $event->schedule }}</td>
        <td>
          @if( $event->status == 0)
          <span class="badge bg-warning">Belum Dikonfirmasi</span>
          @elseif( $event->status == 1)
          <span class="badge bg-success">Sudah Dikonfirmasi</span>
          @elseif( $event->status == 2)
          <span class="badge bg-danger">Ditolak</span>
          @endif
        </td>
        <td>
          <a href="/admin/event/{{ $event->id }}" class="btn btn-primary btn-sm">Detail</a>
          @if ($event->status == 0)
          <form action="/admin/event/{{ $event->id }}/acc" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-sm">Accept</button>
          </form>
          <form action="/admin/event/{{ $event->id }}/deny" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Deny</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection