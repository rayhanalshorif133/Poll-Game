@if ($status == 'active')
<span class="badge badge-success">{{ $status }}</span>
@else
<span class="badge badge-danger">{{ $status }}</span>
@endif
