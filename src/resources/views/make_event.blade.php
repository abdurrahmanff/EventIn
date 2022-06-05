@extends('layouts.main')

@section('contents')
<div class="container">
  <h3 class="fw-bold text-center">Buat <span style="color: #FF7A00">Event</span></h2>
    <div class="card start-50 translate-middle-x my-3" style="width: 980px">
      <img src="/img/foto.jpg" class="card-img-top" alt="Upload gambar" height="440px" width="100%">
      <div class="card-body">
        <form action="" class="container g-3 needs-validation">
          <div class="row">
            <div class="col">
              <input type="text" class="form-control form-control-lg rounded-0"
                style="border:0; border-bottom:1px solid" id="" placeholder="Nama Event" required>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col">
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Category</option>
                <option>...</option>
              </select>
            </div>
            <div class="col">
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Category</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="row pt-4">
            <div class="col">
              <div class="row">
                <p class="fw-bold">Waktu Event</p>
                <div class="col">
                  <label for="date" class="col-form-label">Tanggal Mulai</label>
                  <div>
                    <div class="input-group date">
                      <input type="date" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col">
                  <label for="date" class="col-form-label">Tanggal Selesai</label>
                  <div>
                    <div class="input-group date">
                      <input type="date" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row pt-4">
                <div class="col">
                  <label for="time" class="col-form-label">Waktu Mulai</label>
                  <div class="input-group date">
                    <input type="time" class="form-control">
                  </div>
                </div>
                <div class="col">
                  <label for="time" class="col-form-label">Waktu Selesai</label>
                  <div class="input-group date">
                    <input type="time" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <p class="fw-bold">Organizer</p>
              <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
<footer class="p-3" style="background-color: #004E79">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="fw-bold d-inline-block" style="color: white">Sudah diisi semua? </div>
        <div class="fw-bold d-sm-inline-block" style="color: #FF7A00">GAS</div>
      </div>
      <div class="col-sm text-end">
        <button type="button" class="btn btn-sm fw-bold" style="background:#FF7A00;color:white;width:100px">GAS</button>
      </div>
    </div>
  </div>
</footer>
@endsection