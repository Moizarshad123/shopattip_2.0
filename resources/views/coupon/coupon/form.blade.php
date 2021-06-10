@push('css')

<style>
        #sku-error{
            color: red;
        }
</style>
@endpush
@if($ACTION == 'ADD') 
<div class="form-group {{ $errors->has('coupon') ? 'has-error' : ''}}">
    {!! Form::label('coupon', 'Coupon', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('coupon', null, ('required' == 'required') ? ['maxlength'=>'10', 'style'=>"text-transform:uppercase",'id'=>'coupon','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'] ) !!}
        {!! $errors->first('coupon', '<p class="help-block">:message</p>') !!}
        <span id="sku-error"></span>
    </div>
    {{-- <input type="button" id="getit" class="button" value="Generate"  > --}}

</div>
@else
<div class="form-group {{ $errors->has('coupon') ? 'has-error' : ''}}">
    {!! Form::label('coupon', 'Coupon', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('coupon', null, ('required' == 'required') ? ['maxlength'=>'10', 'style'=>"text-transform:uppercase",'id'=>'coupon_update','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'] ) !!}
        {!! $errors->first('coupon', '<p class="help-block">:message</p>') !!}
        <span id="sku-error"></span>
    </div>
    <input type="hidden" id="coupon_id" name="coupon_id" value="{{ $coupon->id }}"  >

</div>
@endif
<div class="form-group {{ $errors->has('coupon_type') ? 'has-error' : ''}}">
    {!! Form::label('coupon_type', 'Coupon Type', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
     
        <select name="coupon_type" class="form-control" id="coupon_type" required>
           
           @if($ACTION == 'ADD') 
                <option value="">Select Coupon Type</option>
                <option value="percent">Percent</option>
                <option value="amount">Amount</option>
              
            @else 
            
                @if($coupon->coupon_type == 'percent')
                    <option value="percent" selected>Percent</option>
                    <option value="amount">Amount</option>
                @else 
                    <option value="percent">Percent</option>
                    <option value="amount" selected>Amount</option>
                @endif
            @endif

          
        </select>
        {{-- {!! Form::text('coupon_type', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!} --}}
        {!! $errors->first('coupon_type', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('coupon_amount') ? 'has-error' : ''}}">
    {!! Form::label('coupon_amount', 'Coupon Amount', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{-- {!! Form::number('coupon_amount', null, ('required' == 'required') ? ['maxlength'=>'5','class' => 'form-control', 'required' => 'required'] : ['maxlength'=>'5','class' => 'form-control'])  !!} --}}
        <input class="form-control" name="coupon_amount" type="number" id="coupon_amount" value="{{ $coupon->coupon_amount??''}}" maxlength="5" required  oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'>

        {!! $errors->first('coupon_amount', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    {!! Form::label('start_date', 'Start Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('start_date', null, ('required' == 'required') ? ['id'=>'start_date', 'class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('end_date') ? 'has-error' : ''}}">
    {!! Form::label('end_date', 'End Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('end_date', null, ('required' == 'required') ? ['id'=>'end_date','class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['id'=>'submitBtn','class' => 'btn btn-primary']) !!}
    </div>
</div>

@section('externalJsLinks')
<script>
var max = '1000000';
var $wrap = $('#testid');
$('#getit').click(function() {
    var num = +$wrap.val();
    $wrap.val('SAT'+Math.ceil(Math.random() * max));
});

    $(document).ready(function(){

        var obj = {
            name:  "saqlain",
                getName: function(){
                console.log(this.name);
            }
        }

        var getName = obj.getName;
        var obj2 = {name:"raza", getName };
        obj2.getName();

        $('#coupon').keyup(function(){
            var coupon = $(this).val();
            console.log(coupon);
            if(coupon == null || coupon == ''){
                console.log('sku filed is empty');
               
            }else{
                $.ajax({
                    type:"POST",
                    url: "{{url('product/product-coupon-check')}}/" +coupon??'',
                    data:{ 
                            _token:'{{ csrf_token() }}',
                            
                        },
                    cache: false,
                    beforeSend: function(){

                    },
                    success: function(response){
                        console.log(response);
                        // $('#sku').html(data);
                        if (response == 1) {
                            $('#sku-error').html("COUPON NOT AVALIABLE!");
                            $('#submitBtn').prop('disabled',true);
                        }else if(response == 0) {
                            $('#sku-error').html("");
                            $('#submitBtn').prop('disabled',false);

                        }
                    }
                });
            }
            
        });

        $('#coupon_update').keyup(function(){
            var coupon = $(this).val();
            console.log(coupon);
            if(coupon == null || coupon == ''){
                console.log('coupon filed is empty');
               
            }else{
                $.ajax({
                    type:"POST",
                    url: "{{url('product/product-coupon-update-check')}}/" +coupon??'',
                    data:$('#choice_form').serialize(),
                    cache: false,
                    beforeSend: function(){

                    },
                    success: function(response){
                        console.log(response);
                        // $('#sku').html(data);
                        if (response == 1) {
                            $('#sku-error').html("");
                            $('#submitBtn').prop('disabled',false);
                        }else if(response == 'found') {
                            $('#sku-error').html("COUPON NOT AVALIABLE!");
                            $('#submitBtn').prop('disabled',true);

                        }else if(response == 'not found') {
                            $('#sku-error').html("");
                            $('#submitBtn').prop('disabled',false);

                        }
                    }
                });
            }
            
        });

        $('#submitBtn').click(function(){
            // e.preventDefault();
           
            var coupon          = $('#coupon').val();
            var coupon_update   = $('#coupon_update').val();
            var coupon_type     = $('#coupon_type').val();
            var coupon_amount   = $('#coupon_amount').val();
            var start_date      = $('#start_date').val();
            var end_date        = $('#end_date').val();
            console.log(coupon);
            console.log(coupon_update);
            console.log(coupon_type);
            console.log(coupon_amount);
            console.log(start_date);
            console.log(end_date);
            if(coupon == '' && coupon_update == '' && coupon_type == '' && coupon_amount == ''&& start_date == '' && end_date == ''){
                $('#submitBtn').prop('disabled',false);
            }else if(coupon != '' && coupon_update != '' && coupon_type != '' && coupon_amount != ''&& start_date != '' && end_date != ''){
                $('#submitBtn').prop('disabled',true);
                $('#choice_form').submit();
            }
            
        })
    
    })

</script>

@endsection
