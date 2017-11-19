@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Banners</h2>
    </div>
    @include('layouts._flash')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Lists Banner</h2>
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
                   <a href="{{ route('banner.create') }}" class="btn bg-blue">Add Banner</a>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>link</th>
                            <th>_</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td>{{ $banner->name }}</td>
                            <td>{{ $banner->description}}</td>
                            <td>
                                @if( ($banner->link) !== '' )
                                    {{ $banner->link}}
                                @else
                                    Tidak ada link
                                @endif
                            </td>
                            <td>
                            {!! Form::model($banner, ['route' => ['banner.destroy', $banner], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                            <a href="{{ route('banner.edit', $banner->id)}}" class="btn btn-xs btn-info">Edit</a> |
                                {!! Form::submit('delete', ['class'=>'btn btn-xs btn-danger js-submit-confirm']) !!}
                            {!! Form::close()!!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
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