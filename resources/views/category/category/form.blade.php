@push('css')
<link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

<style>
    span.select2-selection.select2-selection--single {
    height: 37px;
}

#blah{
        display: none;
    }

</style>
@endpush

<div class="form-group {{ $errors->has('category_type_id') ? 'has-error' : ''}}">
    <label for="category_type_id" class="col-md-4 control-label">{{ 'Category Type' }}</label>
    <div class="col-md-6">
        {{-- <input class="form-control" name="category_type_id" type="number" id="category_type_id" value="{{ $category->category_type_id??''}}" required> --}}
        <select class="form-control" name="category_type_id" id="category_type_id" required>
            <option value="">Select Category Type</option>
            <option @if(isset($category->category_type_id) && $category->category_type_id == '1') selected @endif value="1">General</option>
            <option @if(isset($category->category_type_id) && $category->category_type_id == '2') selected @endif value="2">Grocery</option>
        </select>
        {!! $errors->first('category_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('level_name') ? 'has-error' : ''}}">
    <label for="level_name" class="col-md-4 control-label">{{ 'Level Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="level_name" type="text" id="level_name" value="{{ $category->level_name??''}}" required>
        {!! $errors->first('level_name', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control " name="name" type="text" id="name" value="{{ $category->name??''}}" maxlength="45" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
{{-- <div class="form-group {{ $errors->has('url_name') ? 'has-error' : ''}}">
    <label for="url_name" class="col-md-4 control-label">{{ 'Url Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url_name" type="text" id="url_name" value="{{ $category->url_name??''}}" required>
        {!! $errors->first('url_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="description" type="text" id="description" value="{{ $category->description??''}}" required>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="col-md-4 control-label">{{ 'Banner' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="banner" type="file" id="banner" value="{{ $category->banner??''}}" onchange="readURL(this);" required>
        <br>
        @if($ACTION == 'EDIT')
        {{-- @include('includes.image_html',['variable'=>$category->banner]) --}}
        <img id="blah" src="#" alt="your image" />
        @elseif($ACTION == 'CREATES')
        <img id="blah" src="#" alt="your image" />

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
        <input class="btn btn-primary" id="submitBtn" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>


<script>
    $(document).ready(function () {
    //change selectboxes to selectize mode to be searchable
        $("#category_type_id").select2();
        // $("#select_category").select2();
        $('#banner').change(function () {
            var ext = this.value.match(/\.(.+)$/)[1];
            switch (ext) {
                case 'jpg':
                case 'png':
                    $('#uploadButton').attr('disabled', false);
                    $('#blah').css('display','block');

                    break;
                default:
                    $.toast({
                        heading: 'Error!',
                        position: 'top-center',
                        text: 'This is not an allowed file type',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2000,
                        stack: 6
                    });
                    $('#blah').css('display','none');

                    this.value = '';
            }
        });

        $('#submitBtn').click(function(){
            // e.preventDefault();
           
            var category_type_id = $('#category_type_id').val();
            var name = $('#name').val();
            var status = $('#status').val();
            var banner = $('#banner').val();
            console.log(category_type_id);
            console.log(name);
            console.log(status);
            console.log(banner);
            if(category_type_id == '' && name == '' && status == '' && banner == ''){
                $('#submitBtn').prop('disabled',false);
            }else if(category_type_id != '' && name != '' && status != '' && banner != ''){
                $('#submitBtn').prop('disabled',true);
                $('#create').submit();
            }
            
        })

    
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(250)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
            $('#blah').css('display','block');
        }
    }

</script>

@endpush
