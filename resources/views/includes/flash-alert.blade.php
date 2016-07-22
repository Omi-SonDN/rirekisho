@if (Session::has('message'))
    <div class="alert alert-{{Session::get('flash_level')}}">{{ Session::get('message') }}</div>
@endif