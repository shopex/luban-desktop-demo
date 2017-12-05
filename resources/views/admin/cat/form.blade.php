<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', '名称', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('order_srot') ? 'has-error' : ''}}">
    {!! Form::label('order_srot', '排序', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('order_srot', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('order_srot', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    {!! Form::label('parent_id', '父ID', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('parent_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : '创建', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
