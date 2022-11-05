@extends('owner.owner')
@section('owner')
<!-- add  -->
<div class="col-lg-3 mt-3 pt-0">
  <div class="p-3 bg-dark text-white">
    <form method="POST" action="/owner/adds">
      @csrf
      <h4>Tambah Barang</h4>
      
      @for ($i = 0; $i < $total; $i++)
        <div class="mb-3 p-3 bg-dark-black">
          <div class="mb-3">
            <div class="mb-3">
              <label for="product_name" class="form-label">Nama Barang </label>
              <input type="text" class="form-control" id="product_name" name="product_name[]" placeholder="Kasut Adidas" required>
            </div>
            <div class="mb-3">
              <label for="product_price" class="form-label">Harga Barang </label>
              <input type="text" class="form-control" id="product_price" name="product_price[]" placeholder="20" required>
              <span class="form-text text-info">* masukkan angka sahaja contoh untuk RM20, masukkan 20</span>
            </div>
          </div>
        </div>
      @endfor

      <div class="mb-3 d-grid">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
  </div>
</div>
<!-- end add  -->
@endsection