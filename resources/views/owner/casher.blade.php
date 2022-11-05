@extends('owner.owner')
@section('owner')
<!-- casher -->
<div class="col-lg-3 mt-3 pt-0">
  <div class="p-3 bg-dark text-white">
    <form method="POST" action="/owner">
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
        <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin?')">CASH</button>
      </div>
    </form>
  </div>
</div>
<!-- end casher  -->
@endsection