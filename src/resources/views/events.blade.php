@extends('layouts.main')
@section('contents')
@include('partials.navbar')
<div class="container vh-100">
  <div class="row my-3 g-0">
    @if($events->count())
    @foreach ($events as $event)
    @include('partials.event_card')
    @endforeach
    @else
    <p class="text-center">Tidak ada Event</p>
    @endif
  </div>
</div>
@include('partials.footer')
@endsection