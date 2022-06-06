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