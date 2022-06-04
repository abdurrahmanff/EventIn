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
      <form action="/admin" method="POST">
        <button class="btn btn-danger btn-sm">Log Out</button>
      </form>
    </div>
  </div>
</nav>
<div class="container mt-2">
  <table class="table table-bordered border-secondary">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama EO</th>
        <th scope="col">Nama Event</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>
          <form action=""></form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection