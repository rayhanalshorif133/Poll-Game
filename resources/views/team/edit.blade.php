<form action="{{route('team.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$team->id}}">
    <div class="form-group">
        <label for="name" class="required">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="{{$team->name}}">
    </div>
    <div class="form-group">
            <label for="logo" class="required">Logo</label>
            <input type="file" class="form-control" name="logo" id="logo">
    </div>
    <div class="form-group">
            <label for="banner" class="required">Banner</label>
            <input type="file" class="form-control" name="banner" id="banner">
    </div>
    <div class="form-group">
        @include('layouts.common.update_status', ['status' => $team->status])
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3">{!! $team->description !!}</textarea>
    </div>

    <button type="submit" class="btn btn-info">Submit</button>
</form>
