@extends('layouts.main')

@section('contents')
@include('partials.navbar')
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
          <div class="row fw-semibold">
            <div class="col">
              <img src="/icon/tiket.svg" alt="" class="mb-1">
              <p class="d-inline">Tiket A</p>
            </div>
            <div class="col text-end">Rp. xx.xxx</div>
          </div>
          <div class="row justify-content-end">
            <input class="col-3" type="number" name="" id="">
          </div>
          <li class="list-unstyled my-3" style="border-bottom: 1px solid #ACE2FF"></li>
          <div class="row fw-semibold">
            <div class="col">
              <p>Total Harga</p>
            </div>
            <div class="col text-end">Rp. xx.xxx</div>
          </div>
          <div class="d-grid">
            <button class="btn btn-warning fw-semibold">Beli Sekarang</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('partials.footer')
@endsection