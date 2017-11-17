@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="block-header">
        <h2>My Orders</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>List Order</h2>
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
                   {!! Form::open(['url' => 'home/orders', 'method'=>'get', 'class'=>'row clearfix']) !!}
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                      <div class="form-group {!! $errors->has('q') ? 'has-error' : '' !!}">
                        <div class="form-line">
                          {!! Form::text('q', isset($q) ? $q : null, ['class'=>'form-control',
                                'placeholder' => 'Order ID']) !!}
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
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order #</th>
                        <th>Tanggal Order</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($orders as $order)
                      <tr>
                        <td>{{ $order->padded_id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->human_status }}</td>
                        <td>
                          Total: <strong>{{ number_format($order->total_payment) }} </strong><br>
                          Transfer ke : {{ config('bank-accounts')[$order->bank]['bank'] }} a.n {{ config('bank-accounts')[$order->bank]['name'] }} {{ config('bank-accounts')[$order->bank]['number'] }}<br>
                          Dari : {{ $order->sender }}
                        </td>
                        <td>
                          @include('orders._details', compact('order'))
                        </td>
                      </tr>
                      @empty
                        <tr>
                          <td colspan="4">Tidak ada order yang ditemukan</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                  {!! $orders->appends(compact('q', 'status'))->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
