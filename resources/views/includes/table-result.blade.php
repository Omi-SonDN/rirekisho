<?php $count = $CVs->count();?>
@if(!$count)
    <tr class="no-record">
        <td colspan="6">
            <div style="text-align: center;">There are no records to display</div>
        </td>
    </tr>
@else
    <?php $CVx = $CVs->reject(function ($item) {
        return $item->Name == null || $item->Age == "0000-00-00";
    });
    $i = 0;
    ?>
    @foreach ($CVx as $CV)
        <tr class="data">
            <td class="image">
                <div style=" position: relative;height: 100px;width: 100px;">
                    <?php $image = $CV->User->image;?>
                    @if($image!="")
                        <img style="height: 100px; width: 100px;"
                             src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                    @else
                        <div class="dropzone-text-place"
                             style="background-color:{{$CV->User->getThemeColor()}} ">
                            <span class="dropzone-text letter-avatar"
                                  style="color: {{$CV->User->getTextColor()}};">
                                {{substr(trim($CV->name), 0, 1)}}
                            </span>
                        </div>
                    @endif
                </div>
            </td>
            <td class="rank">{{++$i}}</td>
            <td class="name"><a href="{{url('CV',$CV )}} ">{{ $CV->Name }} </a></td>
            <td class="name">{{ $CV->Furigana_name }}  </td>
            <td class="worth">{{$CV->j_gender}}</td>
            <td data-field="age">{{ $CV->Age }} 歳</td>
            <td></td>
            @can('Admin')
                <td><a href="{{url('CV',[$CV ,'edit'])}}">Sửa</a></td>
            @endcan
        </tr>
    @endforeach
    <tr id="number-result" style="display: none;">
        <td colspan="6">Có {{$count }} kết quả</td>
    </tr>
@endif