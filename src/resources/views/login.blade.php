@extends('layouts.main')

@section('contents')
<div class="card start-50 translate-middle-x" style="width: 20rem">
  <div class="card-body">
    <h5 class="card-title fw-bold text-center">Login</h5>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
          role="tab" aria-controls="nav-home" aria-selected="true">Email</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
          role="tab" aria-controls="nav-profile" aria-selected="false">Nomor Ponsel</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
        <form action="">
          <label for="" class="form-label mt-2">Email</label>
          <input type="email" class="form-control" placeholder="example@mail.com" required>
          <label for="" class="form-label mt-2">Password</label>
          <input type="password" class="form-control" placeholder="password" required>
        </form>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
        <form action="">
          <label for="" class="form-label mt-2">Nomor Ponsel</label>
          <input type="email" class="form-control" placeholder="08123456789" required>
          <label for="" class="form-label mt-2">Password</label>
          <input type="password" class="form-control" placeholder="password" required>
        </form>
      </div>
    </div>
    <div class="d-grid">
      <button class="btn btn-primary mt-3">Login</button>
    </div>
  </div>
</div>
@endsection