@extends('layouts.main')

@section('contents')
@include('partials.navbar')
<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  input[type=number] {
    -moz-appearance: textfield;
  }

  input[type=number]:focus,
  input[type=number]:active {
    outline: none;
  }
</style>
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
    <div class="col-3 sticky-top" style="height: 50px; top: 63px">
      <form action="/detail-event/{{ $event->id }}/beli-tiket" method="post">
        @csrf
        <div class="card">
          <div class="card-body">
            <h5 class="fw-bold mb-3">Diselenggarakan Pada</h5>
            <img src="/icon/tanggal.svg" class="mb-1">
            <p class="d-inline">{{ date_format($event->schedule, "d/m/Y") }}</p></br>
            <img src="/icon/jam.svg" class="mb-1">
            <p class="d-inline">hh:mm - hh:mm</p></br>
            <img src="/icon/lokasi.svg" class="mb-1">
            <p class="d-inline">Lokasi</p></br>
            <li class="list-unstyled my-3" style="border-bottom: 1px solid #ACE2FF"></li>
            <h5 class="fw-bold mb-3">Pesan Sekarang</h5>
            @foreach ($tickets as $ticket)
            <div class="row fw-semibold">
              <div class="col">
                <img src="/icon/tiket.svg" alt="" class="mb-1">
                <p class="d-inline">{{ $ticket['name'] }}</p>
              </div>
              <div class="col text-end prices" {{-- id="price" --}} data-price="{{ $ticket['price'] }}">
              </div>
            </div>
            <div class="d-flex justify-content-end pb-2 tickets-action">
              <img src=" /icon/minus.svg" alt="" width="15px" role="button" class="minus-btn">
              <input name = '{{ $ticket->name }}' type="number" {{-- id="item-count" --}}class="mx-1 text-center item-counts" value="1" min="0"
                  max="999" required style="border: 0; border-bottom: 1px solid #FF7F0A; width: 30px"
                  data-price="{{ $ticket['price'] }}">
              <img src="/icon/plus.svg" alt="" width="15px" role="button" class="plus-btn">
            </div>
            @endforeach
            <li class="list-unstyled mb-3" style="border-bottom: 1px solid #ACE2FF"></li>
            <div class="row fw-semibold mx-1">
              <div class="col">
                <p>Total Harga</p>
              </div>
              <div class="col text-end" id="total-price">Rp 0</div>
              <div class="d-grid m-2">
                <button type="submit" class="btn btn-warning fw-semibold">Beli Sekarang</button>
              </div>
              </div>
            </div>
          </div>
        </div>
      </form>
  </div>
</div>
<script>
  const formatter = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
  })

  function getTotalPrice () {
    let sum = 0
    const inputs = document.querySelectorAll('.item-counts')
    inputs.forEach(input => {
      sum += input.value * input.dataset.price
    });
    const totalPrice = document.querySelector('#total-price')
    totalPrice.innerText = formatter.format(sum)
  }

  const prices = document.querySelectorAll('.prices')
  prices.forEach(price => {
    // console.log(price.querySelector('sahf'))
    price.innerText = formatter.format(price.dataset.price)
  });
  getTotalPrice()
  const actions = document.querySelectorAll('.tickets-action')
  actions.forEach(action => {
    // console.log(actions)
    const input = action.querySelector('input')
    const minusBtn = action.querySelector('.minus-btn')
    minusBtn.addEventListener('click', function() {
      if (input.value == 0)
        return
      input.value--
      getTotalPrice()
    })
    const plusBtn = action.querySelector('.plus-btn')
    plusBtn.addEventListener('click', function() {
      input.value++
      getTotalPrice()
    })
    input.addEventListener('keydown', function(e) {
      // console.log(e.keyCode)
      if ((e.keyCode < 48 || e.keyCode > 57) && (e.keyCode < 96 || e.keyCode > 105) && e.keyCode != 8 && e.keyCode != 46) {
        e.preventDefault()
      }
      else {
        getTotalPrice()
      }
    })
  });
</script>

@include('partials.footer')
@endsection