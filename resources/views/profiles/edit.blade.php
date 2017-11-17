@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Profile</h2>
    </div>
    @include('layouts._flash')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Change Profile</h2>
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
                    {!! Form::model(auth()->user(), ['url' => url('/profile'), 'method' => 'post', 'class'=>'form-horizontal']) !!}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <div class="form-line">
                                {!! Form::text('name', null, ['class'=>'form-control']) !!} {!! $errors->first('name', '
                                <p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-6">
                            <div class="form-line">
                                {!! Form::email('email', null, ['class'=>'form-control']) !!} {!! $errors->first('email', '
                                <p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection