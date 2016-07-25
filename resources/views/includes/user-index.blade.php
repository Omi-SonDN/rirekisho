@if(!count($users))
    <tr class="no-record">
        <td colspan="6">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    @foreach ($users as $key => $row)
        <tr class="data">
            <td></td>
            <td class="image">
                <div style=" position: relative;height: 100px;width: 100px;">
                    @if($row->image!="")
                        <img style="height: 100px; width: 100px;"
                             src=<?php echo "/img/thumbnail/thumb_" . $row->image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$row->getThemeColor()}} ">
                                            <span class="dropzone-text letter-avatar"
                                                  style="color: {{$row->getTextColor()}};">
                                                {{substr(trim($row->name), 0, 1)}}
                                            </span>
                        </div>
                    @endif
                </div>
            </td>
            <td class="name"><i class="fa fa-pencil fa-fw"></i>&nbsp<a href="{{url('User',$row->hash)}}" title="Edit {{ $row->name }}">{{ $row->name }} </a></td>
            <td class="name">{{ $row->email }}  </td>
            <td> {{ $row->getRole() }}</td>
            <td>
                <input class="fix-class-check cb-element" type="checkbox" value="{{$row->hash}}" name="arrDel[]" style="opacity: 1">
                {{--</td>--}}
                {{--<td>--}}
                {{--<a href="url('User',[$row->hash ])">Sửa</a>--}}{{--{{route('destroyuser')}}--}}
                <a href="{{route('getdeluser', $row->hash)}}" onclick="return xacnhanxoa('Bạn có chắc là xóa không!')" title="Delete {{$row->name}}"><i class="fa fa-trash-o  fa-fw"></i>&nbsp Delete</a>
            </td>
        </tr>
    @endforeach
    {{--<tr id="number-result" style="display: none;">--}}
    {{--<td colspan="5">Có {{$count }} kết quả</td>--}}
    {{--</tr>--}}
@endif