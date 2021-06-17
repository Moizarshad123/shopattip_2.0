@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">

<style>
    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    #blah{
        display: none;
    }
    /* span.select2-selection.select2-selection--single{
        height: 39px !important;
        border: 0.5px solid #e5ebec !important;
        margin-right: 10px !important;

    }
    .select2-container--default .select2-selection--single .select2-selection__arrow b{
        left: 10% !important;
    } */

</style>
@endpush

<div class="form-group {{ $errors->has('banner_type') ? 'has-error' : ''}}">
    {!! Form::label('banner_type', 'Banner Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="banner_type" id="banner_type" class="form-control" required>
            <option value="">Select Banner Type</option>
            <option @if(isset($banner->banner_type) && $banner->banner_type == '1') selected @endif value="1">General</option>
            <option @if(isset($banner->banner_type) && $banner->banner_type == '2') selected @endif value="2">Grocery</option>
        </select>
        {{-- {!! Form::text('banner_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('banner_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if($ACTION == 'ADD')
<div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
    {!! Form::label('category_type', 'Category Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="category_type" id="category_type" class="form-control" required>
            <option value="">Select Category</option>
          
            
        </select>
        {{-- {!! Form::text('banner_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@elseif($ACTION == 'EDIT')
<div class="form-group {{ $errors->has('category_type') ? 'has-error' : ''}}">
    {!! Form::label('category_type', 'Category Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="category_type" id="category_type" class="form-control" required>
            <option value="">Select Category</option>
            @foreach ($getCategories as $category)
                <option value="{{ $category->id }}" {{(  $category->id == @$banner->category_type) ? 'selected="true"':'' }}>(Category) <strong>{{ $category->name }}</strong></option>
            @endforeach
            
        </select>
        {{-- {!! Form::text('banner_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('category_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ('required' == 'required') ? ['id'=>'title','class' => 'form-control', 'required' => 'required', 'maxlength' =>'45'] : ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    {!! Form::label('banner', 'Banner', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <input type="file" class="form-control" name=" banner" id="banner" required onchange="readURL(this);">
        {{-- {!! Form::file('banner', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        <br>
        @if($ACTION == 'EDIT')
        {{-- @include('includes.image_html',['variable'=>$banner->banner]) --}}
        <img id="blah" src="#" alt="your image" />
        @elseif($ACTION == 'ADD')
        <img id="blah" src="#" alt="your image" />
        @endif
        {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['id'=>'submitBtn','class' => 'btn btn-primary']) !!}
    </div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

<script>
    $(document).ready(function(){
        $("#category_type").select2();
       
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

                    // alert('This is not an allowed file type.');
                    this.value = '';
            }
        });

        $(document).on('change','#banner_type',function(){
           
            var brand_type = $(this).val();
            var option = '';
            if(brand_type != null){
                $.ajax({
                type: 'GET',
                url: "{{url('select-brand-type')}}/" +brand_type,
                data:{ 
                    _token:'{{ csrf_token() }}'
                },
                cache: false,
                dataType: 'json',

                beforeSend: function() {
                    // setting a timeout
                    
                },
                success: function(response) {
        
                    console.log(response);
                    
                    $.each(response,function(index,row){
                        option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                    });
                
                    $("#category_type").empty();
                    $("#category_type").append(option);
                    
                },
                error: function(xhr) { // if error occured
                
                },

                });
            }else{
                alert('Select any category');
            }
        });

        // var banner_type = $('#banner_type').val();
        // var category_type = $('#category_type').val();
        // var title = $('#title').val();
        // var banner = $('#banner').val();
      
        $('#submitBtn').click(function(){
            // e.preventDefault();
           
            var banner_type = $('#banner_type').val();
            var category_type = $('#category_type').val();
            var title = $('#title').val();
            var banner = $('#banner').val();
            console.log(banner_type);
            console.log(category_type);
            console.log(title);
            console.log(banner);
            if(banner_type == '' && category_type == '' && title == '' && banner == ''){
                $('#submitBtn').prop('disabled',false);
            }else if(banner_type != '' && category_type != '' && title != '' && banner != ''){
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