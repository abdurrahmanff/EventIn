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
<div class="container mt-2">
  <table class="table table-bordered border-secondary" style="width: 100%">
    <thead>
      <tr class="text-center">
        <th scope="col" style="width: 2%">No</th>
        <th scope="col" style="width: 20%">Nama EO</th>
        <th scope="col">Nama Event</th>
        <th scope="col" style="width: 15%">Tanggal</th>
        <th scope="col" style="width: 10%">Status</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach($events as $event) <tr>
        <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
        <td>{{ $event->user->name }}</td>
        <td>{{ $event->name }}</td>
        <td>{{ $event->schedule }}</td>
        <td>
          <form method="" action="post">
            <div class="d-flex">
              <button class="btn btn-success btn-sm text-center mx-auto" style="width: 50px">Acc</button>
              <button class="btn btn-danger btn-sm text-center mx-auto" style="width: 50px">Deny</button>
            </div>
          </form>
        </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection