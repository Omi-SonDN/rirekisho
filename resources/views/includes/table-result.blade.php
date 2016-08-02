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
                        <td class="image" style="width:150px">
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
                        <td class="rank" style="width: 50px">{{$h+1}}</td>
                        <td class="name" style="width: 170px"><a href="{{url('CV',$CVx[$h] )}} ">{{ $CVx[$h]->Name }} </a></td>
                        <td class="worth" style="width: 100px">{{$CVx[$h]->JGender}}</td>
                        <td data-field="age" style="width: 60px">{{ $CVx[$h]->Age }}</td>
                        <td style="width: 50px"></td>
                        @can('Visitor')
                        <td> <td class="name" style="width: 100px">{{$CVx[$h]->Position}}  </td></td>
                        @endcan
                        @can('Admin')
                        <td style="width: 200px">
                            <div class="status" id="status{{ $CVx[$h]->id }}">
                                @include('includes._form_status',['CV' => $CVx[$h]])
                                <input type="hidden" value="{{ $CVx[$h]->id }}" id="id"/>
                                <input type="hidden" value="{{ $CVx[$h]->User->email }}" id="email"/>
                                <button id="btn_send_email{{ $CVx[$h]->id }}" class="btn btn-primary btn-send-email" value="{{ $CVx[$h]->Status }}">Send Email {{ $CVx[$h]->Status }}</button>
                            </div>
                        </td>
                        <td><a style="margin-left: 25px;"class="btn btn-default btn-edit" href="{{url('CV',[$CVx[$h] ,'edit'])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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
                        <td class="worth" style="width: 15%">{{$CVx[$h]->JGender}}</td>
                        <td data-field="age" style="width: 10%">{{ $CVx[$h]->Age }}</td>
                        <td style="width: 20%"></td>
                        @can('Visitor')
                        <td> <td class="name" style="width: 15%">{{$CVx[$h]->Position}}  </td></td>
                        @endcan
                        @can('Admin')
                        <td>
                            <div class="status" id="status{{ $CVx[$h]->id }}">
                                @include('includes._form_status',['CV' => $CVx[$h]])
                                <input type="hidden" value="{{ $CVx[$h]->id }}" id="id"/>
                                <input type="hidden" value="{{ $CVx[$h]->User->email }}" id="email"/>
                                <button id="btn_send_email{{ $CVx[$h]->id }}" class="btn btn-primary btn-send-email" value="{{ $CVx[$h]->Status }}">Send Email {{ $CVx[$h]->Status }}</button>
                            </div>
                        </td>
                        <td><button style="margin-left: 25px;"class="btn btn-default btn-edit"><a href="{{url('CV',[$CVx[$h] ,'edit'])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></button></td>
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
<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-content">
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset('js/CV_changeStatus.js') }}"></script>
<script src="{{ asset('js/email_send.js') }}"></script>