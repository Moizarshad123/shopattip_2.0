@push('css')
{{-- <link rel="stylesheet" href="{{ asset('vendor/css/forms/select/select2.min.css') }}"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<link href="{{asset('plugins/components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">


<style>
    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    #blah{
        display: none;
    }
</style>
@endpush
<div class="form-group {{ $errors->has('slider_type') ? 'has-error' : ''}}">
    <label for="slider_type" class="col-md-4 control-label">{{ 'Slider Type' }}</label>
    <div class="col-md-6">
        <b><input type="radio" name="slider_type"  id="slider_type" value="1" {{(@$slider->slider_type==1) ? "checked" :''}} required> GENERAL </b>
        <b><input type="radio" name="slider_type" id="slider_type" value="2" {{(@$brand->slider_type==2) ? "checked" :''}} style="margin-left: 51px;" required> GROCERY</b>
        {{-- <input class="form-control" name="slider_type" type="number" id="slider_type" value="{{ $slider->slider_type?? ''}}" required> --}}
        {!! $errors->first('slider_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $slider->title?? ''}}" maxlength="40">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('slider_image') ? 'has-error' : ''}}">
    <label for="slider_image" class="col-md-4 control-label">{{ 'Slider Image' }}</label>
    <div class="col-md-6">
        <input type="file" class="form-control" name="slider_image" id="slider_image" onchange="readURL(this);" required>
        <br>
        @if($ACTION == 'EDIT')
        <img id="blah" src="#" alt="your image" />
        @elseif($ACTION == 'ADD')
        <img id="blah" src="#" alt="your image" />

        @endif
        {{-- <input class="form-control" name="slider_image" type="text" id="slider_image" value="{{ $slider->slider_image?? ''}}" required> --}}
        {!! $errors->first('slider_image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" id="submitBtn" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>

@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

<script>

    $(document).ready(function(){
       
        $('#slider_image').change(function () {
            var ext = this.value.match(/\.(.+)$/)[1];
            switch (ext) {
                case 'jpg':
                case 'png':
                    $('#uploadButton').attr('disabled', false);
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
                    this.value = '';
            }
        });

        $('#submitBtn').click(function(){
            // e.preventDefault();
           
            var slider_type = $('#slider_type').val();
            var title = $('#title').val();
            var slider_image = $('#slider_image').val();
            if(slider_type == '' && title == '' && slider_image == ''){
                $('#submitBtn').prop('disabled',false);
            }else if(slider_type != '' && title != '' && slider_image != '' ){
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


