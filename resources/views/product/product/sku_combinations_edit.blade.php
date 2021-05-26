@if(count($combinations[0]) > 0)

	<table class="table table-bordered color_table form-control" >
		<thead>
			<tr class="color_table">
				<tr >
					<th class="text-center">
						<label for="" class="control-label">Color</label>
					</th>
					{{-- <td class="text-center">
						<label for="" class="control-label">Variant Price</label>
					</td> --}}
	
					<th class="text-center">
						<label for="" class="control-label">Quantity</label>
					</th>
					<th>Action</th>
				</tr>
			</tr>
		</thead>
		<tbody>

		@foreach ($combinations as $key => $combination)
			@php
				$sku = '';
				foreach (explode(' ', $product_name) as $key => $value) {
					$sku .= substr($value, 0, 1);
				}

				$str = '';
				foreach ($combination as $key => $item){
					if($key > 0 ){
						$str .= '-'.str_replace(' ', '', $item);
						$sku .='-'.str_replace(' ', '', $item);
					}
					
					else{
						if($colors_active == 1){
							$color_name = \App\ProductColor::where('color_code', $item)->first()->name;
							
							$str .= $color_name;
							$sku .=$color_name;
							
						}
						else{
							$str .= $item;
							$sku .=$item;
						}
					}
				}
			
			@endphp
			@if(strlen($str) > 0)
				<tr class="variant">
					<td>
						<label for="" class="control-label">{{ $str }}</label>
					</td>
					{{-- <td>
						<input type="number" name="price_{{ $str }}" value="@php
								if(($stock = $product->variation->where('variation', $str)->first()) != null){
									echo $stock->price;
								}
								else{
									echo $unit_price;
								}
						@endphp" min="0" step="0.01" class="form-control" required>
					</td> --}}
		
					<td>
						<input type="number" name="qty[]" value="@php
							$qty = \App\ProductVariation::where('product_id',$product->id)->first();
						
							if(($qty ) != null){
								echo $qty->stock;
							}
							else{
								echo '10';
							}
						@endphp" min="0" step="1" class="form-control" required>
					</td>
					<td>
						<button type="button" id="delete_variant" class="btn btn-icon btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
					</td>
				</tr>
			@endif
		@endforeach

		</tbody>
	</table>
@endif
