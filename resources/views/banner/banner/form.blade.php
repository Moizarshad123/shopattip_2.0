<div class="form-group {{ $errors->has('banner_type') ? 'has-error' : ''}}">
    {!! Form::label('banner_type', 'Banner Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="banner_type" class="form-control">
            <option value="">Select Banner Type</option>
            <option value="1">General</option>
            <option value="2">Grocery</option>
        </select>
        {{-- {!! Form::text('banner_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('banner_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required', 'maxlength' =>'70'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    {!! Form::label('banner', 'Banner', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('banner', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        <br>
        @if($ACTION == 'EDIT')
        @include('includes.image_html',['variable'=>$banner->banner])
        @endif
        {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
