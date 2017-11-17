@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Products</h2>
    </div>
    @include('layouts._flash')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Lists Product</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                  {!! Form::open(['url' => 'products', 'method'=>'get', 'class'=>'row clearfix']) !!}
                    <div class="col-lg-7 col-md-7">
                        <a href="{{ route('products.create') }}" class="btn bg-blue">Add product</a>     
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
                      <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                        <div class="form-line">
                          {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control',
                                'placeholder' => 'Type name/model...']) !!}
                          {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                       {!! Form::submit('Search', ['class'=>'btn btn-primary m-t-15 waves-effect']) !!}
                    </div>
                  {!! Form::close() !!}
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Category</th>
                            <th>_</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->model}}</td>
                            <td>
                            @foreach ($product->categories as $category)
                                <span class="label label-primary">
                                <i class="fa fa-btn fa-tags"></i>
                                {{ $category->title }}</span>
                            @endforeach
                            </td>
                            <td>
                            {!! Form::model($product, ['route' => ['products.destroy', $product], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                            <a href="{{ route('products.edit', $product->id)}}" class="btn btn-xs btn-info">Edit</a> |
                                {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                            {!! Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $products->appends(compact('q'))->links() !!}
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).ready(function () {
    $(document.body).on('click', '.js-submit-confirm', function (event) {
        event.preventDefault()
        var $form = $(this).closest('form')
        var $el = $(this)
        var text = $el.data('confirm-message') ? $el.data('confirm-message') : 'Kamu tidak akan bisa membatalkan proses ini!'

        swal({
        title: 'Kamu yakin?',
        text: text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yap, lanjutkan!',
        cancelButtonText: 'Batal',
        closeOnConfirm: true
        },
        function () {
            $form.submit()
        })
    })
})
</script>
@endsection