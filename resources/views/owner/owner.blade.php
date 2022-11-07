@extends('templates.main')
@section('contents')
<!-- tools -->
<div class="row">
  @yield('owner')  
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
      <div class="col-lg-12 d-flex justify-content-between">
        <h4 class="">Status Terkini</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generateFormAddProduct"><b>+</b></button>
      </div>
      <form method="POST" action="/owner/edit">
        @csrf
        @include("asset/table")
        <div class=" d-flex justify-content-end  pt-3">
          <button type="submit" class="btn btn-warning" name="submit" value="edit">Edit</button>
          <button type="submit" class="btn btn-danger ms-2" name="submit" value="delete">Padam</button>
        </div>
      </form>
    </div>
  </div>
  <!-- end table  -->
</div>
<!-- end tools  -->
<!-- Modal -->
<div class="modal fade" id="generateFormAddProduct" tabindex="-1" aria-labelledby="generateFormAddProductLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/owner/add" method="POST" class="modal-content bg-dark-black text-white">
      @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="generateFormAddProductLabel">Tambah Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-12">
          <div class="mb-3">
            <label for="total_comfirm" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="total_comfirm" name="total_comfirm" placeholder="10" max="10" required>
            <div id="total_comfirm" class="form-text text-info">*Masukkan jumlah barang yang ingin anda tambah, max 10 data saja</div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"">Teruskan</button>
      </div>
    </form>
  </div>
</div>
<!-- end modal  -->
@endsection
