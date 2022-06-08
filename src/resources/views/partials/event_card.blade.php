<div class="col">
  <div class="card" style="width: 16rem">
    <a href="/detail-event/{{ $event->id }}" class="stretched-link">
      @if ($event->img_path)
      <img src="{{ asset('storage/' . $event->img_path) }}" class="card-img-top" alt="event1" style="height: 9rem">
      @else
      <img src="https://source.unsplash.com/254x144?{{ $event->category->name }}" class="card-img-top" alt="event1"
        style="height: 9rem">
      @endif
    </a>
    <div class="card-body py-1">
      <p class="my-0">{{ $event->name }}</p>
      <p class="my-0 fw-light">{{ $event->schedule->format('d-m-Y') }} {{ $event->place }}</p>
      {{-- <p class="my-0 fw-semibold">{{ $event->tickets->first()->price }}</p> --}}
    </div>
  </div>
</div>