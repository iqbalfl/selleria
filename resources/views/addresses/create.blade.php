@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="block-header">
        <h2>Addresses</h2>
    </div>
    @include('layouts._flash')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Add Address</h2>
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
                  {!! Form::open(['route' => 'address.store','class'=>'form-horizontal'])!!}
                      @include('addresses._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
$(document).ready(function () {
  if ($('#province_selector').length > 0) {
    var xhr
    var province_selector, $province_selector
    var regency_selector, $regency_selector

    $province_selector = $('#province_selector').selectize({
      sortField: 'text',
      onChange: function (value) {
        if (!value.length) {
            regency_selector.disable()
            regency_selector.clearOptions()
            return
        }
        regency_selector.clearOptions()
        regency_selector.load(function (callback) {
            xhr && xhr.abort()
            xhr = $.ajax({
              url: '/address/regencies?province_id=' + value,
              success: function (results) {
                regency_selector.enable()
                callback(results)
            },
            error: function () {
              callback()
            }
          })
        })
      }
    })
    $regency_selector = $('#regency_selector').selectize({
        sortField: 'name',
        valueField: 'id',
        labelField: 'name',
        searchField: ['name']
    })
    province_selector = $province_selector[0].selectize
    regency_selector = $regency_selector[0].selectize
  }
})
</script>    
@endsection