@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Orders</h2>
    </div>
    @include('layouts._flash')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Manage Orders</h2>
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
                  {!! Form::open(['url' => 'orders', 'method'=>'get', 'class'=>'row clearfix']) !!}
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                      <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                        <div class="form-line">
                          {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control',
                                'placeholder' => 'Order ID/Customer...']) !!}
                          {!! $errors->first('q', '<p class="help-block">:message</p>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                      <div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}">
                        <div class="form-line">
                          {!! Form::select('status', [''=>'Semua status']+App\Order::statusList(),
                            isset($status) ? $status : null, ['class'=>'form-control']) !!}
                          {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       {!! Form::submit('Cari', ['class'=>'btn btn-primary m-l-15 waves-effect']) !!}
                    </div>
                  {!! Form::close() !!}
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Order #</td>
                          <th>Customer</th>
                          <th>Status</th>
                          <th>Pembayaran</th>
                          <th>Update terakhir</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($orders as $order)
                        <tr>
                          <td><a href="{{ route('orders.edit', $order->id)}}">{{ $order->padded_id }}</a></td>
                          <td>{{ $order->user->name }}</td>
                          <td>{{ $order->human_status }}</td>
                          <td>
                            Total: <strong>{{ number_format($order->total_payment) }} </strong><br>
                            Transfer ke : {{ config('bank-accounts')[$order->bank]['bank'] }} <br>
                            Dari : {{ $order->sender }}
                          </td>
                          <td>{{ $order->updated_at }}</td>
                        </tr>
                        @empty
                          <tr>
                            <td colspan="4">Tidak ada order yang ditemukan</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
                      {!! $orders->appends(compact('status', 'q'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
