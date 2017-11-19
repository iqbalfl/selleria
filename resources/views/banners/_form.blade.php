<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">    
      {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Nama banner']) !!}
    </div>
      {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
  {!! Form::label('description', 'Deskripsi banner', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">      
      {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Deskripsi singkat', 'rows'=>'4']) !!}
    </div>
      {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('link') ? 'has-error' : '' !!}">
  {!! Form::label('link', 'Link', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">      
      {!! Form::text('link', null, ['class'=>'form-control','placeholder'=>'Link']) !!}
    </div>
      {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
  {!! Form::label('image', 'Banner image (jpeg, png)', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::file('image') !!}
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
  </div>

  @if (isset($model) && $model->image !== '')
    <div class="col-md-6">
      <p>Current image:</p>
      <div class="thumbnail">
        <img src="{{ url('/img/' . $model->image) }}" class="img-rounded">
      </div>
    </div>
  @endif
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}
    </div>
</div>