@extends('owner.owner')
@section('owner')
<!-- edit  -->
<div class="col-lg-3 mt-3 pt-0">
  <div class="p-3 bg-dark text-white">
    <form method="POST" action="/owner/update">
      @method("put")
      @csrf
      <h4>Edit Barang</h4>

      @foreach ($product_edit as $product)
      <div class="mb-3 p-3 bg-dark-black">
        <div class="mb-3">
          <div class="mb-3">
            <label for="product_name" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="product_name" name="product_name[]" value="{{ $product->product_name }}" required>
          </div>
          <div class="mb-3">
            <label for="product_quantity" class="form-label">Quantiti</label>
            <input type="number" class="form-control" id="product_quantity" name="product_quantity[]" value="{{ $product->product_quantity }}" required>
          </div>
        </div>
      </div>
      <input type="hidden" name="product_id[]" value="{{ $product->product_id }}">
      @endforeach

      <div class="mb-3 d-grid">
        <button type="submit" class="btn btn-primary">Edit Barang</button>
      </div>
    </form>
  </div>
</div>
<!-- end edit  -->
@endsection