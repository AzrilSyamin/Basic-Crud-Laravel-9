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
<script>
  let mylink = window.location.pathname
  let path = mylink.split("/")
  const fileUrl = window.location.protocol + "//" + window.location.host + "/" //index

  // simple alert
  if (window.location.href == fileUrl + "owner") {
  let owner = sessionStorage.getItem("name")

  if(!owner){
  // if not isset owner
  let question = confirm("Opps... Anda Owner? Halaman ini hanya boleh dibuka oleh Owner")

  if(question !== true){
  // if question == false 
  window.location.href=fileUrl
  }else {
  // if question == true
  let pass = prompt("Halaman ini memerlukan password! Sila masukkan password anda dibawah!")

  if (pass !== "Owner") {
    alert("Maaf anda tidak dibenarkan disini")
    window.location.href = fileUrl
  }else{
    sessionStorage.setItem("name","owner")
    window.location.href
  }
  }

  }else{
  // if isset owner 
  window.location.href
  }

  }
  // end simple alert 

  // checbox
  let checkAll= document.querySelector("#select_all")
  let checks= document.querySelectorAll(".check")

  checkAll.onclick=function(){
  if(checkAll.checked == true){
  checks.forEach(element => {
    element.checked=true
  });
  }else{
  checks.forEach(element => {
    element.checked=false
  });
  }
  }

  for (let i = 0; i < checks.length; i++) {
  checks[i].onclick=("click", function() {
  let result = 0
  for (let i = 0; i < checks.length; i++) {
  if (checks[i].checked) result++
  }
  checkAll.checked = result === checks.length
  })
  }
  // end checbox
</script>
@endsection
