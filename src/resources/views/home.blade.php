@extends('layouts.main')
@section('contents')
@include('partials.navbar')
<div class="container">
  <div id="carouselExampleControls" class="carousel slide my-4 start-50 translate-middle-x" data-bs-ride="carousel"
    style="width: 50rem">
    <div class="carousel-inner rounded" style="height: 25rem;">
      <div class="carousel-item active">
        <img src="/img/foto.jpg" class="d-block w-100" height="400px" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/img/foto.jpg" class="d-block w-100" height="400px" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/img/foto.jpg" class="d-block w-100" height="400px" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <h5>Featured <a href="#" class="fs-6 anchor-link" style="color: #FF7F0A; text-decoration: 0px">Lihat semua</a></h5>
  <div class="row my-3 g-0">
  @foreach ($events as $event)
    <div class="col">
      <div class="card" style="width: 16rem">
        <a href="detail-event/{{ $event->id }}" class="stretched-link">
          <img src="https://source.unsplash.com/254x144?{{ $event->category->name }}" class="card-img-top" alt="event1" style="height: 9rem">
        </a>
        <div class="card-body py-1">
          <p class="my-0">{{ $event->name }}</p>
          <p class="my-0 fw-light">{{ $event->schedule }}" "{{ $event->place }}</p>
          {{-- <p class="my-0 fw-semibold">{{ $event->$ticket-> }}</p> --}}
        </div>
      </div>
    </div>
  @endforeach
</div>
</div>
<div class="p-3" style="background-color: #1A7DB5">
  <div class="fw-bold text-center">Pen buat event?</div>
  <div class="fw-regular text-break mx-auto" style="width: 497px">Lorem, ipsum dolor sit amet consectetur adipisicing
    elit. Accusantium,
    quibusdam
    repellat
    ipsam temporibus delectus placeat aliquid nisi enim eius. Culpa aliquid enim non amet repellat omnis aspernatur
    dicta temporibus sapiente?</div>
  <div class="d-grid col mx-auto mt-3" style="width: 89px">
    <form action="/buat-event">
      <button  type="submit" class="btn btn-warning btn-sm fw-bold">Buat Event</button>
    </form>
  </div>
</div>
<div class="container mt-3">
  <h5>Nama Kategori <a href="#" class="fs-6 anchor-link" style="color: #FF7F0A; text-decoration: 0px">Lihat semua</a>
  </h5>
  <div class="row my-3 g-0">
    @for ($i = 0; $i < 5; $i++) <div class="col">
      @include('partials.event_card')
  </div>
  @endfor
</div>
</div>
@include('partials.footer')
@endsection