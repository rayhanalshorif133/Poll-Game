@if (Session::has('message'))
<div class="text-center alert alert-{{ Session::get('class') }}">
    <h1 class="text-center" style="font-size:2rem;">
        {{ Session::get('message') }}
    </h1>
</div>
@endif
