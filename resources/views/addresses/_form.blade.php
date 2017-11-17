<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
  {!! Form::label('name', 'Nama', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">    
      {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'nama penerima']) !!}
    </div>
  </div>
  {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('detail') ? 'has-error' : '' !!}">
  {!! Form::label('detail', 'Alamat', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">      
      {!! Form::text('detail', null, ['class'=>'form-control','placeholder'=>'nama jalan/nomor rumah..']) !!}
    </div>
  </div>
  {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('province_id') ? 'has-error' : '' !!}">
  {!! Form::label('province_id', 'Provinsi', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('province_id', [''=>'']+DB::table('provinces')->lists('name','id'), null, ['class'=>'form-control', 'id' => 'province_selector']) !!}
    {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('regency_id') ? 'has-error' : '' !!}">
  {!! Form::label('regency_id', 'Kabupaten / Kota', ['class' => 'col-md-4 control-label']) !!}
  <div class="col-md-6">
    {!! Form::select('regency_id',
      old('province_id') !== null ? DB::table('regencies')->where('province_id', old('province_id'))->lists('name', 'id') : [],
      old('regency_id'), ['class'=>'form-control', 'id' => 'regency_selector']) !!}
    {!! $errors->first('regency_id', '<p class="help-block">:message</p>') !!}
  </div>
</div>

<div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
  {!! Form::label('phone', 'Telepon', ['class'=>'col-md-4 control-label']) !!}
  <div class="col-md-6">
    <div class="form-line">
      {!! Form::number('phone', null, ['class'=>'form-control','placeholder'=>'(+62)']) !!}      
    </div>
  </div>
  {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class'=>'btn btn-primary']) !!}    
  </div>
</div>
