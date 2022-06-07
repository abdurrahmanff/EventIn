@extends('layouts.main')

@section('contents')
<div class="container">
    <h3 class="fw-bold text-center">Buat <span style="color: #FF7A00">Event</span></h2>
        <form action="/buat-event/{{ $eventId }}/buat-tiket" method="post" class="needs-validation">
        @csrf
        <div class="card start-50 translate-middle-x my-3" style="width: 980px">
        <img src="/img/foto.jpg" class="card-img-top" alt="Upload gambar" height="440px" width="100%">
        <div class="card-body">
            <div class="container g-3">
                <div class="row pt-4">
                    <div class="col">
                        <div class="row">
                            <p class="fw-bold">Kategori Tiket</p>
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label class="col-form-label">Nama Tiket</label>
                                        <input name="nama_tiket" class="form-control @error('nama_tiket') is-invalid @enderror" id="nama_tiket" rows="3" required></input>
                                        @error('nama_tiket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="time" class="col-form-label">Harga Tiket</label>
                                        <input name="harga_tiket" type="number" class="form-control @error('harga_tiket') is-invalid @enderror" id="harga_tiket" required>
                                        @error('harga_tiket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="time" class="col-form-label">Jumlah Tiket</label>
                                        <input name="jumlah_tiket" type="number" class="form-control @error('jumlah_tiket') is-invalid @enderror" id="jumlah_tiket" required>
                                        @error('jumlah_tiket')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="my-3">
                                        <button type="submit" class="btn w-100 fw-bold" style="background:#FF7A00;color:white;width:100px">GAS</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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