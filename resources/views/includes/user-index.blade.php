@if(!count($users))
    <tr class="no-record">
        <td colspan="100%">
            <div style="text-align: center;">Chưa có thông tin mô tả nào</div>
        </td>
    </tr>
@else
    @foreach ($users as $key => $row)
        <tr class="data">
            <td class="image">
                <div style=" position: relative;height: 50px;width: 50px;">
                    @if($row->image!="")
                        <img style="height: 50px; width: 50px;"
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
            <td class="name"><a href="{{url('User',$row->hash)}}" title="Sửa {{ $row->userName }}">{{ $row->userName }} </a></td>
            <td class="name">{{ $row->email }}  </td>
            <td>{{$row->JGender}}</td>
            <td>{{$row->Birthday}}</td>
            <td>{{$row->Phone}}</td>
            <td>{{$row->CV->count()}}</td>
            <td> {{ $row->getRole() }}</td>
            <td>
                <div class="col-lg-12">
                    <input class="fix-class-check cb-element" type="checkbox"
                           value="{{$row->hash}}"
                           name="arrDel[]">
                </div>
                <div class="col-lg-12 mt8">
                    <table style="margin: 0 auto">
                        <tr>
                            <td>
                                <a href="{{url('User',$row->hash)}}" title="Sửa {{ $row->userName }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </td>
                            <td>
                                <a href="{{route('getdeluser', $row->hash)}}" onclick="return xacnhanxoa('Bạn có chắc là xóa không!')" title="Xóa {{$row->userName}}">
                                    <span class="fa fa-trash-o" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    @endforeach
@endif