<form method="POST" name='status' class="status">
    <input type="hidden" name="id" id="id" value="{{ $CV->id }}"/>
    <input type="hidden" name="CV_status" id="CV_status{{ $CV->id }}" value="{{ $CV->Status }}"/>
    <select class="form-control status" name="status" id="status{{ $CV->id }}">
{{--<<<<<<< HEAD--}}
            {{--@foreach($_Status as $status)--}}
                {{--@if($status->id === $CV->Status))--}}
                    {{--<option value="{{$status->id}}" selected="select" >{{$status->id}}: {{$status->status}}</option>--}}
{{--=======--}}

        @foreach( \App\Status::all() as $status )
            @if($CV->old_status && $status->id === $CV->old_status && $CV->old_status!= $CV->Status)
                <option value="{{$status->id}}" >{{$status->id}}: {{$status->status}}</option>
                <?php //continue; ?>
            @endif
            @if($status->id === $CV->Status))
                <option value="{{$status->id}}" selected="select" >{{$status->id}}: {{$status->status}}</option>
            {{---------------------}}
                @else
                    @if( in_array($CV->Status, $status->previous_status) )
                        <option value="{{$status->id}}" >{{$status->id}}: {{$status->status}}</option>
                    @else
                        {{--<option value="{{$status->id}}" class="hidden">{{$status->id}}: {{$status->status}}</option>--}}
                    @endif
                @endif
            @endforeach
    </select>
</form>
