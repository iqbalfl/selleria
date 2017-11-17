<p>
  {!! Form::open(['url' => 'cart', 'method'=>'post', 'class'=>'form-inline']) !!}
      {!! Form::hidden('product_id', $product->id) !!}

      <div class="form-group">
        {!! Form::number('quantity', null, ['class'=>'form-control', 'min' => 1, 'placeholder' => 'Qty']) !!}
      </div>
  
    {!! Form::submit('Tambah ke cart', ['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}
</p>
