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
<div class="container">
  <div class="row mt-3">
    <div class="col">
      <div class="card p-3 pt-1">
        <h1 class="fw-bold text-center mb-0">Nama Event</h1>
        <h5 class="fw-semibold text-center">by Nama EO</h5>
        <img class="rounded" src="/img/foto.jpg" alt="foto" height="300px">
        <p class="text-justify mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi dictum lobortis
          fermentum. Cras eu tellus id eros auctor pellentesque. Nam consequat nunc ut elit vulputate tincidunt.
          Suspendisse semper, quam at elementum tincidunt, sem lorem porta nulla, at mattis urna diam ac ex. Nunc et
          pretium diam. Pellentesque nec metus a augue tempor tempus in et lectus. Ut convallis neque non rutrum
          consequat. Praesent id ultrices sapien, tincidunt interdum nisl. Donec in ligula tempus, facilisis sapien sit
          amet, tempor diam. Curabitur sodales urna ac sapien luctus fringilla. Sed consequat egestas dolor, vel dictum
          lorem bibendum venenatis. Praesent ullamcorper lacus a finibus aliquam. Nulla tempus libero hendrerit, rhoncus
          nunc quis, elementum velit. Vestibulum semper eget elit vel tristique. Vestibulum ut lacus ut arcu auctor
          semper nec et urna.
          </br>
          Aliquam porttitor ex nulla, vel pulvinar massa venenatis sed. Curabitur pharetra nibh non tortor aliquet, sed
          sodales justo iaculis. Donec a vestibulum leo. Praesent congue vel ipsum vel mattis. Suspendisse purus metus,
          mattis non faucibus sed, faucibus et leo. Sed interdum fermentum blandit. Vestibulum orci lacus, viverra id
          tincidunt vel, lobortis quis magna. Phasellus placerat sem vel quam lobortis semper. Sed eleifend, tortor id
          laoreet auctor, velit arcu interdum velit, non blandit libero enim vel ex. Curabitur id tempor nibh.
          </br>
          Curabitur ultrices facilisis eros, non congue odio malesuada quis. Vivamus aliquet nulla vel magna dignissim,
          vel pellentesque arcu ultricies. Integer ipsum nisi, commodo sit amet nibh vel, finibus pretium tellus. Duis
          venenatis scelerisque libero, id aliquet dui condimentum sed. Integer eu placerat lorem. Quisque porta varius
          leo, placerat vulputate mi dapibus sit amet. Maecenas dolor erat, tincidunt a imperdiet in, molestie id est.
          </br>
          Aliquam lobortis maximus nisi, et sagittis tellus. Praesent sed consectetur ante, vel malesuada ex. Integer
          odio nibh, lobortis ac commodo vel, placerat vitae diam. Sed at lacinia ante, vitae ullamcorper diam. Class
          aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus in ligula est.
          Duis nec justo arcu. Cras fermentum viverra commodo.
          </br>
          Aenean finibus odio odio, sed accumsan diam ultrices quis. Nullam hendrerit nisl sit amet nisl luctus dictum.
          Morbi tristique, libero eget pulvinar pharetra, metus erat molestie lorem, nec volutpat libero magna at est.
          Fusce auctor interdum mattis. Phasellus tincidunt efficitur quam ut elementum. Sed sit amet porttitor libero.
          Nullam sem tortor, maximus rhoncus ligula at, auctor lobortis arcu. Vivamus laoreet at metus sit amet
          malesuada. Phasellus porttitor venenatis tellus, sed ullamcorper quam efficitur ac. Integer ac sem molestie,
          faucibus nibh at, vehicula est. Donec non neque non nulla ullamcorper rutrum. Integer ex neque, iaculis ac
          nibh a, vehicula aliquam ligula. Aliquam iaculis augue ut libero ultricies rutrum. In nibh est, consequat ut
          erat pretium, luctus tempor dolor. Morbi finibus elementum ex, sit amet sagittis neque venenatis nec.
          Pellentesque eu dapibus quam.</p>
      </div>
    </div>
    <div class="col-3 sticky-top" style="height: 50px; top: 63px">
      <div class="card">
        <div class="card-body">
          <h5 class="fw-bold mb-3">Diselenggarakan Pada</h5>
          <img src="/icon/tanggal.svg" class="mb-1">
          <p class="d-inline">dd/mm/yyyy</p></br>
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
            <div class="col text-end prices" {{-- id="price" --}} data-price="{{ $ticket['price'] }}"></div>
          </div>
          <div class="d-flex justify-content-end pb-2 tickets-action">
            <img src=" /icon/minus.svg" alt="" width="15px" role="button" class="minus-btn">
            <form>
              <input type="number" {{-- id="item-count" --}}class="mx-1 text-center item-counts" value="1" min="0"
                max="999" required style="border: 0; border-bottom: 1px solid #FF7F0A; width: 30px"
                data-price="{{ $ticket['price'] }}">
            </form>
            <img src="/icon/plus.svg" alt="" width="15px" role="button" class="plus-btn">
          </div>
          @endforeach
        </div>
        <li class="list-unstyled mb-3" style="border-bottom: 1px solid #ACE2FF"></li>
        <div class="row fw-semibold mx-1">
          <div class="col">
            <p>Total Harga</p>
          </div>
          <div class="col text-end" id="total-price">Rp 0</div>
        </div>
        <div class="d-grid m-2">
          <button class="btn btn-warning fw-semibold">Beli Sekarang</button>
        </div>
      </div>
    </div>
  </div>
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