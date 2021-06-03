@push('css')
{{-- <link rel="stylesheet" href="{{ asset('vendor/css/forms/select/select2.min.css') }}"> --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


<style>
    .select2-container .select2-selection--single {
        height: 38px !important;
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
<div class="form-group {{ $errors->has('category_type_id') ? 'has-error' : ''}}">
    <label for="category_type_id" class="col-md-4 control-label">{{ 'Category Type' }}</label>
    <div class="col-md-6">
        <select class="form-control category_type_id" name="category_type_id" id="category_type_id">
            <option value=""> Select Category Type</option>
            @if(@$subcategory->category->category_type_id == 1)
                <option  value="1" selected>General</option>
                <option  value="2">Grocery</option>
            @elseif(@$subcategory->category->category_type_id == 2)
                <option  value="2" selected>Grocery</option>
                <option  value="1">General</option>
            @else
                <option  value="1">General</option>
                <option  value="2">Grocery</option>
            @endif
           
        </select>
        {!! $errors->first('category_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>




@if($ACTION == 'CREATES')
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select id="select_category" class="form-control" name="category_id" id="category_id" required> 

            
     </select>
     {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@elseif($ACTION == 'EDIT')
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category' }}</label>
    <div class="col-md-6">
        <select id="select_category" class="form-control" name="category_id" id="category_id" required> 
            <option value="">Select Category</option>
            @foreach ($getCategories as $category)
            <option value="{{ $category->id }}" {{(  $category->id == @$subcategory->category_id) ? 'selected="true"':'' }}>(Category) <strong>{{ $category->name }}</strong></option>
            @endforeach
            
     </select>
     {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
{{-- <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="col-md-4 control-label">{{ 'Category Id' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="category_id" type="number" id="category_id" value="{{ $subcategory->category_id?? ''}}" required>
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $subcategory->name?? ''}}" required maxlength="70">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('url_name') ? 'has-error' : ''}}">
    <label for="url_name" class="col-md-4 control-label">{{ 'Url Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="url_name" type="text" id="url_name" value="{{ $subcategory->url_name?? ''}}" required maxlength="70">
        {!! $errors->first('url_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText?? 'Create' }}">
    </div>
</div>

@if($ACTION == 'EDIT')
<input type="hidden" id="edit" value="1">
@endif

@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
            $(document).ready(function () {
            //change selectboxes to selectize mode to be searchable
                $("#select_category,#category_type_id").select2();

                $(document).on('change','#category_type_id',function(){
                    var category_type = $(this).val();
                    var option = '';
                    if(category_type != null){
                        $.ajax({
                        type: 'GET',
                        url: "{{url('select-category-type')}}/" +category_type,
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
                          
                          })
                      
                          $("#select_category").empty();
                          $("#select_category").append(option);
                           
                          
                        
                        },
                        error: function(xhr) { // if error occured
                        
                        },

                        });
                    }else{
                        alert('Select any category');
                    }
                });

                // var editValue =  $('#edit').val();
                // var category_type =  $('#category_type_id').val();
                // var option = '';
                // if(editValue == 1){
                //     if(category_type != null){
                //         $.ajax({
                //         type: 'GET',
                //         url: "{{url('select-category-type')}}/" +category_type,
                //         data:{ 
                //             _token:'{{ csrf_token() }}'
                //         },
                //         cache: false,
                //         dataType: 'json',

                //         beforeSend: function() {
                //             // setting a timeout
                            
                //         },
                //         success: function(response) {
                //             console.log(response);
                            
                //             $.each(response,function(index,row){
                                

                //                 option += `<option value=`+row['id']+`>`+row['name']+`</option>`;
                            
                //             })
                        
                //             $("#select_category").empty();
                //             $("#select_category").append(option);
                            
                            
                        
                //         },
                //         error: function(xhr) { // if error occured
                        
                //         },

                //         });
                //     }else{
                //         alert('Please Reload the page');
                //     }
                    
                // }else{
                   
                //     console.log('Select any category')
                // }
                

                
            });
  
</script>

@endpush
