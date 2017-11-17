<div class="form-group container">
  <div class="row">
    <div class="col-md-2">
      <label>Order #</label>
    </div>
    <div class="col-md-10">
      <div class="form-line">
        {{ $order->padded_id }}
      </div>
    </div>
  </div>
</div>

<div class="form-group container">
  <div class="row">
    <div class="col-md-2">
      <label>Customer</label>
    </div>
    <div class="col-md-10">
      <div class="form-line">
        {{ $order->user->name }}
      </div>
    </div>
  </div>
</div>

<div class="form-group container">
  <div class="row">
    <div class="col-md-2">
      <label>Alamat Pengiriman</label>
    </div>
    <div class="col-md-10">
      <address>
       <strong>{{ $order->address->name }}</strong> <br>
       {{ $order->address->detail }} <br>
       {{ $order->address->regency->name }}, {{ $order->address->regency->province->name }} <br>
       <abbr title="Phone">P:</abbr>  +62 {{ $order->address->phone }}
      </address>
    </div>
  </div>
</div>

<div class="form-group">
  <div class="row-clearfix">
    <div class="col-md-12">
      @include('orders._details', compact('order'))
    </div>
  </div>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <div class="row">
      <div class="col-md-6 text-right">
        <label class="control-label">Status</label>
      </div>
      <div class="col-md-6">
        <div class="form-line">
          {!! Form::select('status', App\Order::statusList(), null, ['class'=>'form-control']) !!}
          {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
      </div>
    </div>
</div>

{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
