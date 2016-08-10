<form method="POST" name='status' class="status">
    <input type="hidden" name="id" id="id" value="{{ $CV->id }}"/>
    <input type="hidden" name="CV_status" id="CV_status{{ $CV->id }}" value="{{ $CV->Status }}"/>
    <select class="form-control status" name="status" id="status{{ $CV->id }}">
            @foreach($_Status as $status)
                @if($status->id === $CV->Status))
                    <option value="{{$status->id}}" selected="select" >{{$status->id}}: {{$status->status}}</option>
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