<select class="form-control" name="category_type_id" id="category_type_id">
    <option @if(isset($variable) && $variable == '1') selected @endif value="1">General</option>
    <option @if(isset($variable) && $variable == '2') selected @endif value="2">Grocery</option>
</select>