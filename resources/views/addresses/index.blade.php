@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>Address</h2>
    </div>
    @include('layouts._flash')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Your Address</h2>
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
                  <a href="{{ route('address.create') }}" class="btn bg-blue btn-sm">Tambah Alamat</a>
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kota/Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Telepon</th>
                            <th>_</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($addresses as $address)
                        <tr>
                            <td>{{ $address->name }}</td>
                            <td>{{ $address->detail }}</td>
                            <td>{{ $address->regency->name }}</td>
                            <td>{{ $address->regency->province->name }}</td>
                            <td>(+62) {{ $address->phone }}</td>
                            <td>
                            {!! Form::model($addresses, ['route' => ['address.destroy', $address], 'method' => 'delete', 'class' => 'form-inline'] ) !!}
                            <a href="{{ route('address.edit', $address->id)}}" class="btn btn-info btn-xs">Edit</a> |
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