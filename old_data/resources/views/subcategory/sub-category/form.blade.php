<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="category_id" type="number" id="category_id" value="{{ $subcategory->category_id?? ''}}" required>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $subcategory->name?? ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_name') ? 'has-error' : ''}}">
    <label for="url_name" class="col-md-4 control-label">{{ 'Url Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url_name" type="text" id="url_name" value="{{ $subcategory->url_name?? ''}}" required>
        {!! $errors->first('url_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>
