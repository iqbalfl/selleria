@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        @include('catalogs._search-panel', [
          'q' => isset($q) ? $q : null,
          'cat' => isset($cat) ? $cat : ''
        ])

        @include('catalogs._category-panel')

        @if (isset($category) && $category->hasChild())
          @include('catalogs._sub-category-panel', ['current_category' => $category])
        @endif

        @if (isset($category) && $category->hasParent())
          @include('catalogs._sub-category-panel', [
            'current_category' => $category->parent
          ])
        @endif

      </div>
      <div class="col-md-9">
        <div class="row">
        
        {{--  start carrousel  --}}
          <div class="col-md-12">
            <div class="row carousel-holder">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="{{ asset('img/1.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="{{ asset('img/2.jpg') }}" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="{{ asset('img/3.jpg') }}" alt="">
                            </div>
                        </div>
                        {{--  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>  --}}
                    </div>
                </div>
            </div>
          </div>
          {{--  end carrousel  --}}

          <div class="col-md-12">
          <br>
            @include('catalogs._breadcrumb', [
              'current_category' => isset($category) ? $category : null
            ])

            @if ($errors->has('quantity'))
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ $errors->first('quantity') }}
              </div>
            @endif
          </div>
          
          @forelse ($products as $product)
            <div class="col-md-6">
              @include('catalogs._product-thumbnail', ['product' => $product])
            </div>
          @empty
            <div class="col-md-12 text-center">
              @if (isset($q))
                <h1>:(</h1>
                <p>Produk dengan kata kunci tidak ditemukan.</p>
                @if (isset($category))
                  <p><a href="{{ url('/catalogs?q=' . $q) }}">Cari di semua kategori <i class="fa fa-arrow-right"></i></a></p>
                @endif
              @else
                <h1>:|</h1>
                <p>Belum ada produk untuk kategori ini.</p>
              @endif
              <p><a href="{{ url('/catalogs') }}">Lihat semua produk <i class="fa fa-arrow-right"></i></a></p>
            </div>
          @endforelse

          <div class="pull-right">
            {!! $products->appends(compact('cat', 'q', 'sort', 'order'))->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
