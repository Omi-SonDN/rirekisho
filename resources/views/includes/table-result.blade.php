
<?php
    $count = $CVs->count();
    $perPage = $CVs->perPage;
    $number_page = $count/$perPage;
?>
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
        ?>

        @for($i = 0; $i < $number_page; $i++)
            @for($j = 0; $j < $perPage; $j++)
                <?php $h = $i*$perPage+$j; ?>
                @if($h < $count)
                    @if($i == 0)
                    <tr class="data{{$i}}" style="display: block; width: 1000px;">
                        <td class="image" style="width:15%">
                            <div style=" position: relative;height: 100px;width: 100px;">
                                <?php $image = $CVx[$h]->User->image;?>
                                @if($image!="")
                                    <img style="height: 100px; width: 100px;"
                                         src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                                @else
                                    <div class="dropzone-text-place"
                                         style="background-color:{{$CVx[$h]->User->getThemeColor()}} ">
                                        <span class="dropzone-text letter-avatar"
                                              style="color: {{$CVx[$h]->User->getTextColor()}};">
                                            {{substr(trim($CVx[$h]->name), 0, 1)}}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="rank" style="width: 5%">{{$h+1}}</td>
                        <td class="name" style="width: 18%"><a href="{{url('CV',$CVx[$h] )}} ">{{ $CVx[$h]->Name }} </a></td>
                        <td class="name" style="width: 15%">{{$CVx[$h]->Position}}  </td>
                        <td class="worth" style="width: 15%">{{$CVx[$h]->JGender}}</td>
                        <td class="" style="width: 20%">{{ $CVx[$h]->Sta }}</td>
                        <td data-field="age" style="width: 10%">{{ $CVx[$h]->Age }}</td>
                        <td style="width: 20%"></td>
                        @can('Admin')
                        <td><a href="{{url('CV',[$CVx[$h] ,'edit'])}}">Sửa</a></td>
                        @endcan
                    </tr>
                    @else
                    <tr class="data{{$i}}" style="display: none; width: 1000px">
                        <td class="image" style="width:15%">
                            <div style=" position: relative;height: 100px;width: 100px;">
                                <?php $image = $CVx[$h]->User->image;?>
                                @if($image!="")
                                    <img style="height: 100px; width: 100px;"
                                         src=<?php echo "/img/thumbnail/thumb_" . $image;?> >
                                @else
                                    <div class="dropzone-text-place"
                                         style="background-color:{{$CVx[$h]->User->getThemeColor()}} ">
                                        <span class="dropzone-text letter-avatar"
                                              style="color: {{$CVx[$h]->User->getTextColor()}};">
                                            {{substr(trim($CVx[$h]->name), 0, 1)}}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="rank" style="width: 5%"">{{$h+1}}</td>
                        <td class="name" style="width: 18%"><a href="{{url('CV',$CVx[$h] )}} ">{{ $CVx[$h]->Name }} </a></td>
                        <td class="name" style="width: 15%">{{$CVx[$h]->Position}}  </td>
                        <td class="worth" style="width: 15%">{{$CVx[$h]->JGender}}</td>
                        <td class="" style="width: 20%">{{ $CVx[$h]->Sta }}</td>
                        <td data-field="age" style="width: 10%">{{ $CVx[$h]->Age }}</td>
                        <td style="width: 20%"></td>
                        @can('Admin')
                        <td><a href="{{url('CV',[$CVx[$h] ,'edit'])}}">Sửa</a></td>
                        @endcan
                    </tr>
                    @endif
                @endif
            @endfor
        @endfor

            <tr id="number-result" style="display: none;">
                <td colspan="6">Có {{$count}} kết quả</td>
            </tr>
        
    <!-- <tr>
        <td>
        </td>
    </tr> -->    
   <ul class="pagination">
        @if($number_page > 1)
            <li class="pre" classPage=".data0" classPagi=".pagi0" numberPage = "0" nameClass="pagi0"><span><<</span></li>
            
            <li class="active" classPage=".data0" classPagi=".pagi0" nameClass="pagi0" numberPage = "0"><span>1</span></li>
            @for($i = 1; $i <= $number_page; $i++)
                @if($i <= $number_page -1)
                    <li class="pagi{{$i}}" classPage = ".data{{$i}}" classPagi=".pagi{{$i}}" nameClass="pagi{{$i}}" numberPage = "{{$i}}"><span>{{$i+1}}</span></li>
                @else
                    <li class="pagi{{$i}}" classPage = ".data{{$i}}" classPagi=".pagi{{$i}}" nameClass="pagi{{$i}}" numberPage = "{{$i}}"><span>{{$i+1}}</span></li>
                @endif
            @endfor
            <li class="next" classPage= ".data1" classPagi=".pagi1" nameClass="pagi1" numberPage = "1" status="{{$i-1}}"><span>>></span></li>
        @endif
        @if($number_page <= 1)
            <li class="pre" classPage=".data0" classPagi=".pagi0" numberPage = "0" nameClass="pagi0"><span><<</span></li>
            <li class="active" classPage=".data0" classPagi=".pagi0" nameClass="pagi0" numberPage = "0"><span>1</span></li>
            <li class="next" classPage= ".data0" classPagi=".pagi0" nameClass="pagi0" numberPage = "0" status="0"><span>>></span></li>
        @endif
    </ul>  
    
@endif

