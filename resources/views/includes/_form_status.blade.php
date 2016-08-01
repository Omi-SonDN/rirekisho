<?php $the_status = array(
	32 => [1],
    1 => [2,12,9],
	2 => [3],
	3 => [8,25],
	4 => [],
	5 => [6,7],
	6 => [2,21],
	7 => [24],
	8 => [4,14],
	9 => [22],
	10 => [6,7],
	11 => [5, 13],
	12 => [4],
	13 => [10],
	14 => [15],
	15 => [18, 19],
	16 => [20],
	17 => [4],
	18 => [17],
	19 => [16, 26],
	20 => [],
	21 => [4],
	22 => [11],
	23 => [12, 9],
	24 => [4],
	25 => [24, 4],
	26 => [17],
	27 => [31, 28, 30],
	28 => [4],
	29 => [27],
	30 => [14, 4],
	31 => [4],
); ?>

<form method="POST" name='status' class="status">
    <input type="hidden" name="id" id="id" value="{{ $CV->id }}"/>
    <input type="hidden" name="CV_status" id="CV_status{{ $CV->id }}" value="{{ $CV->Status }}"/>
    <select class="form-control status" name="status" id="status{{ $CV->id }}">
        @foreach( \App\Status::all() as $status )
            @if($status->id === $CV->Status))
                <option value="{{$status->id}}" selected="select" >{{$status->id}}: {{$status->status}}</option>
                @foreach($the_status[$CV->Status] as $vl)
                    @if(Auth::user()->getRole() === 'Visitor')
                        @if ($vl === 2)
                            <option value="{{$vl}}">{{$vl}}: {{ \App\Status::findOrFail($vl)->status }}</option>
                        @endif
                        @break
                    @else
                        <option value="{{$vl}}">{{$vl}}: {{\App\Status::findOrFail($vl)->status }}</option>
                    @endif
                @endforeach
            @endif
        @endforeach
    </select>
</form>