<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kaunter Dashboard</title>
  <link rel="stylesheet" href="/asset/css/style.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">Kaunter Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link {{ ($menu==='Home')? 'active':''}}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($menu==='Owner')? 'active':''}}" aria-current="page" href="/owner">Owner</a>
            </li>
          </ul>
          <form method="POST" class="d-flex" role="search">
            <div class="input-group mb-3">
              <select class="form-select" name="header_search_select">
                <option value="" selected>All</option>
                <option value="product_name">Nama Barang</option>
                <option value="product_quantity">Quantiti</option>
                <option value="product_sell">Jualan</option>
              </select>
              <input class="form-control" type="search" placeholder="Cari" name="header_search_input" required>
              <button class="btn btn-success" type="submit" name="header_search_button">Cari</button>
            </div>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container-fluid">
    @yield('contents')
    </div>

    {{-- pagination  --}}
    <div class="container">
      <div class="row  ">
        <div class="col d-flex justify-content-center">
          <div class="">
            {{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
    {{-- end pagination  --}}
  </main>
    <footer>
    
    </footer>
    <script src="/asset/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous">
    </script>
    <script>
    // hide checkbox and clear session   
    let mylink = window.location.pathname
    let path = mylink.split("/")
    const fileUrl = window.location.protocol + "//" + window.location.host + "/"

    if (window.location.href == fileUrl) {
    sessionStorage.clear()
    document.querySelector("thead tr th:last-child").classList.add("visually-hidden")
    let mat = document.querySelectorAll("tbody tr td:last-child")
    for (i = 0; i < mat.length; i++) {
      mat[i].classList.add("visually-hidden")
    }
    }
    // end hide clear session 
    </script>
  </body>    
</html>