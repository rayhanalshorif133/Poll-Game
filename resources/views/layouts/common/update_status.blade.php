<label for="status">Status</label> <br />
<div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-outline-success btn-sm @if($status == " active") active @endif">
        <input type="radio" name="status" autocomplete="off" @if($status == "active") checked="" @endif
        value="active"> Active
    </label>
    <label class="btn btn-outline-danger btn-sm @if($status == " inactive") active @endif">
        <input type="radio" name="status" autocomplete="off" @if($status == "inactive") checked="" @endif
        value="inactive"> Inactive
    </label>
</div>
