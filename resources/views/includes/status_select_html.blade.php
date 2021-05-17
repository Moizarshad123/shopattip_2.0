<select class="form-control" name="status" id="status">
    <option @if(isset($variable) && $variable == '1') selected @endif value="1">Active</option>
    <option @if(isset($variable) && $variable == '0') selected @endif value="0">Inactive</option>
</select>