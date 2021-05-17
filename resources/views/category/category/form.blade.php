<div class="form-group {{ $errors->has('category_type_id') ? 'has-error' : ''}}">
    <label for="category_type_id" class="col-md-4 control-label">{{ 'Category Type Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="category_type_id" type="number" id="category_type_id" value="{{ $category->category_type_id??''}}" required>
        {!! $errors->first('category_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('level_name') ? 'has-error' : ''}}">
    <label for="level_name" class="col-md-4 control-label">{{ 'Level Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="level_name" type="text" id="level_name" value="{{ $category->level_name??''}}" required>
        {!! $errors->first('level_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $category->name??''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_name') ? 'has-error' : ''}}">
    <label for="url_name" class="col-md-4 control-label">{{ 'Url Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url_name" type="text" id="url_name" value="{{ $category->url_name??''}}" required>
        {!! $errors->first('url_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $category->description??''}}" required>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="col-md-4 control-label">{{ 'Banner' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="banner" type="file" id="banner" value="{{ $category->banner??''}}" required>
        <br>
        @if($ACTION == 'EDIT')
        @include('includes.image_html',['variable'=>$category->banner])
        @endif

        {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="status" type="text" id="status" value="{{ $category->status??''}}" required> --}}
        @include('includes.status_select_html',['variable'=>$category->status??''])
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
