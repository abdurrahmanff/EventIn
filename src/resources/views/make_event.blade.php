@extends('layouts.main')

@section('contents')
<div class="container">
  <h3 class="fw-bold text-center">Buat <span style="color: #FF7A00">Event</span></h2>
    <form action="/buat-event" method="post" class="needs-validation">
      @csrf
    <div class="card start-50 translate-middle-x my-3" style="width: 980px">
      <img src="/img/foto.jpg" class="card-img-top" alt="Upload gambar" height="440px" width="100%">
      <div class="card-body">
        <div class="container g-3">
          <div class="row">
            <div class="col">
              <input name="nama_event" type="text" class="form-control form-control-lg rounded-0 @error('nama_event') @enderror"
                style="border:0; border-bottom:1px solid" id="" placeholder="Nama Event" required>
              @error('nama_event')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="row pt-4">
            <div class="col">
              <select name="kategori" class="form-select" id="kategori" required>
                <option selected disabled value="">Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
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
                      <input name="from_date" type="date" class="form-control @error('from_date') is-invalid @enderror" required>
                      @error('from_date')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col">
                  <label for="date" class="col-form-label">Tanggal Selesai</label>
                  <div>
                    <div class="input-group date">
                      <input name="to_date" type="date" class="form-control @error('to_date') is-invalid @enderror" required>
                      @error('to_date')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="row pt-4">
                <div class="col">
                  <label for="time" class="col-form-label">Waktu Mulai</label>
                  <div class="input-group date">
                    <input name="from_time" type="time" class="form-control @error('from_time') is-invalid @enderror">
                    @error('from_time')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <label for="time" class="col-form-label">Waktu Selesai</label>
                  <div class="input-group date">
                    <input name="to_time" type="time" class="form-control @error('to_time') is-invalid @enderror">
                    @error('to_time')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col">
              <p class="fw-bold">Organizer</p>
              <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
              </div>
            </div> --}}
          </div>
          <div class="row pt-4">
            <div class="col">
              <p class="fw-bold">Lokasi Event</p>
              <label for="time" class="col-form-label">Lokasi Event Yang Akan Diadakan</label>
              <input name="lokasi_event" class="form-control @error('lokasi_event') is-invalid @enderror" id="lokasi_event" rows="3" required></input>
              @error('lokasi_event')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="row pt-4">
            <div class="col">
              <div class="row">
                <p class="fw-bold">Deskripsi Event</p>
                <div class="col">
                  <textarea name="deskripsi_event" class="form-control @error('deskripsi_event') @enderror" id="exampleFormControlTextarea1" rows="3" required></textarea>
                  @error('deskripsi_event')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="my-3">
              <button type="submit" class="btn w-100 fw-bold" style="background:#FF7A00;color:white;width:100px">GAS</button>
            </div> 
          </div>
      </div>
    </div>
  </form>
</div>
<footer class="p-3" style="background-color: #004E79">
  <div class="container">
    <div class="row">
      <div class="col-sm text-end">
        <div class="fw-bold d-inline-block" style="color: white">Sudah diisi semua? </div>
        <div class="fw-bold d-sm-inline-block" style="color: #FF7A00">GAS</div>
      </div>
    </div>
  </div>
</footer>
@endsection