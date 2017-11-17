<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">    
      {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama produk']) !!}
    </div>
      {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('model') ? 'has-error' : '' !!}">
  {!! Form::label('model', 'Model', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">      
      {!! Form::text('model', null, ['class'=>'form-control','placeholder'=>'Nama model']) !!}
    </div>
      {!! $errors->first('model', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
  {!! Form::label('description', 'Deskripsi produk', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">      
      {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Deskripsi singkat', 'rows'=>'4']) !!}
    </div>
      {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('weight') ? 'has-error' : '' !!}">
  {!! Form::label('weight', 'Berat (gram)', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">
      {!! Form::number('weight', null, ['class'=>'form-control','placeholder'=>'Berat produk']) !!}      
    </div>
      {!! $errors->first('weight', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
  {!! Form::label('price', 'Harga', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">
      {!! Form::number('price', null, ['class'=>'form-control','placeholder'=>'Harga produk']) !!}
    </div>
      {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
  {!! Form::label('category_lists', 'Categories', ['class'=>'col-md-4 control-label']) !!}
  {{-- Simplify things, no need to implement ajax for now --}}
  <div class="col-md-6">
    {!! Form::select('category_lists[]', [''=>'']+App\Category::lists('title','id')->all(), null, ['class'=>'form-control js-selectize', 'multiple']) !!}
    {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('photo') ? 'has-error' : '' !!}">
  {!! Form::label('photo', 'Product photo (jpeg, png)', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::file('photo') !!}
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
  </div>

  @if (isset($model) && $model->photo !== '')
    <div class="col-md-6">
      <p>Current photo:</p>
      <div class="thumbnail">
        <img src="{{ url('/img/' . $model->photo) }}" class="img-rounded">
      </div>
    </div>
  @endif
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
    </div>
</div>