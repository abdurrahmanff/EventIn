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
<div class="container vh-100">
    <div class="row mt-3">
        <div class="col">
            <div class="card p-3 pt-1">
            <h1 class="fw-bold text-center mb-0">{{ $event->name }}</h1>
            <h5 class="fw-semibold text-center">{{ $user}}</h5>
            @if ($event->img_path)
                <img class="rounded" src="{{ asset('storage/' . $event->img_path) }}" alt="foto" height="300px">
            @else
                <img class="rounded" src="https://source.unsplash.com/662x300?{{ $event->category->name }}" alt="foto" height="300px">
            @endif
            <p class="text-justify mt-3">{{ $event->desc }}</p>
            </div>
        </div>
        </div>
    </div>
</div>