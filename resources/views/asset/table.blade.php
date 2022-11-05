<div class="table-responsive">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Harga Barang</th>
        <th scope="col">Quantiti</th>
        <th scope="col">Unit Terjual</th>
        <th scope="col">Jumlah Jualan</th>
        <th scope="col">
          <input type="checkbox" class="form-check-input" id="select_all" value="">
        </th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
      @foreach ($products as $product)
      <tr>
        <th scope="row">#</th>
        <td>{{ $product->product_name }}</td>
        <td>RM {{ $product->product_price }}</td>
        <td>
          @if ($product->product_quantity == NULL)
          <span class="badge">Belum Ada</span>
          @elseif($product->product_quantity == 0)
          <span class="badge bg-danger">Habis Dijual</span>
          @else
          <span class="badge bg-warning">{{ $product->product_quantity }} Unit</span>
          @endif
        </td>
        <td>
          @if ($product->product_sell == NULL)
          <span class="badge">Belum Terjual</span>
          @else
          <span class="badge bg-success">{{ $product->product_sell }} Unit</span>
          @endif
        </td>
        <td>
          @if ($product->product_sales==NULL)
          RM 0.00
          @else
          RM {{ $product->product_sales }}
          @endif
        </td>
        <td>
          <input class="form-check-input check" type="checkbox" name="checked[]" value="{{ $product->product_id }}">
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @empty($product)
  <p class="text-center">No Result !</p>
  @endempty
</div>