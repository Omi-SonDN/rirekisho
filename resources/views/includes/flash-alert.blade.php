@if (Session::has('message'))
    <div class="alert alert-{{Session::get('flash_level')}}">{{ Session::get('message') }}</div>
    <br>
    @if (Session::has('javascript'))
        {!! Session::get('javascript') !!}
    @endif

@endif