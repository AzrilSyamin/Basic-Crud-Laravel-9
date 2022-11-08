@extends('templates.main')
@section('contents')
    <!-- tools -->
<div class="row">
  <!-- casher -->
  <div class="col-lg-3 mt-3 pt-0">
    <div class="p-3 bg-dark text-white">
      <form method="POST" action="/">
        @method("put")
        @csrf
        <h4>Kaunter Pembayaran</h4>
        <div class="mb-3">
          <label for="buy_product_name" class="form-label">Barang</label>
          <select class="form-select" id="buy_product_name" name="buy_product_name" required>
            <option value="" selected>-- Pilih Barang --</option>
            @foreach ($products as $product)
            <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="buy_quantity" class="form-label">Kuantiti Barang</label>
          <input type="number" class="form-control" id="buy_quantity" name="buy_quantity" required>
        </div>
        <div class="mb-3 d-grid">
          <button type="submit" class="btn btn-primary" name="cash" onclick="return confirm('Yakin?')">CASH</button>
        </div>
      </form>
    </div>
  </div>
  <!-- end casher  -->
  <!-- table -->
  <div class="col-lg-9 my-3">
    @if(session("success"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ session("success") }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session("failed"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session("failed") }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="p-3 bg-dark text-white">
      <h4 class="">Status Terkini</h4>
      @include('asset/table')
    </div>
  </div>
  <!-- end table  -->
</div>
<!-- end tools  -->

<script>
  // hide checkbox and clear session   
  let mylink = window.location.pathname
  let path = mylink.split("/")
  const fileUrl = window.location.protocol + "//" + window.location.host + "/"

  if (window.location.href == fileUrl || window.location.href == fileUrl+location.search) {
    sessionStorage.clear()
    document.querySelector("thead tr th:last-child").remove()
    let mat = document.querySelectorAll("tbody tr td:last-child")
    for (i = 0; i < mat.length; i++) {
      mat[i].remove()
    }
  }
  // end hide clear session 
  </script>
@endsection