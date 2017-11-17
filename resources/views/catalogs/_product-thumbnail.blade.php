{{--  <h3>{{ $product->name }}</h3>
<div class="thumbnail">
  <img src="{{ $product->photo_path }}" class="img-rounded">
    <p>Model: {{ $product->model }}</p>
    <p>Harga: <strong>Rp{{ number_format($product->price, 2) }}</strong></p>
    <p>Category:
      @foreach ($product->categories as $category)
        <span class="label label-primary">
        <i class="fa fa-btn fa-tags"></i>
        {{ $category->title }}</span>
      @endforeach
    </p>

    @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-product-form', 'data' => compact('product')])

</div>  --}}

<div class="thumbnail">
  <img src="{{ $product->photo_path }}" alt="">
  <div class="caption">
      <h4 class="pull-right"><strong>Rp{{ number_format($product->price, 2) }}</strong></h4>
      <h4><a href="#">{{ $product->name }}</a></h4>
      <h5><strong>{{ $product->model }}</strong></h5>
      <p>{{ $product->description }}</p>
      <p>
        @foreach ($product->categories as $category)
          <span class="label label-primary">
          <i class="fa fa-btn fa-tags"></i>
          {{ $category->title }}</span>
        @endforeach
      </p>
  </div>
  <div class="addtocart">
    @include('layouts._customer-feature', ['partial_view'=>'catalogs._add-product-form', 'data' => compact('product')])
  </div>
</div>

