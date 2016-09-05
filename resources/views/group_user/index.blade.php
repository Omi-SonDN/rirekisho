@extends('xCV.template')
@section('title')Quản lý nhóm người dùng @endsection

@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;" href="{{route('group_user.create')}}">Create</a>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="dataTable table table-hover table-responsive table-bodered" id="pos-list">
                <thead>
                <th class="ab">STT</th>
                <th class="ab">Tên nhóm</th>
                <th class="ab">Nhóm cha</th>
                <th class="ab" style="text-align:center;">Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody id="list-table-body">
                @foreach($Group_user as $key=>$stt)
                    <tr id="pos{{ $stt->id }}">
                        <td>
                            {{$stt->id }}
                        </td>
                        <td>
                            {{ $stt->name }}
                        </td>
                        <td>
                            {{ ($stt->parent)?($stt->theParent()->name):'' }}
                        </td>
                        <td>
                            <table style="margin: 0 auto;">
                                <tr>
                                    <td><a href="{{route('group_user.show',[$stt])}}" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin nhóm người dùng"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                    <td><a href="{{url('group_user',[$stt->id ,'edit'])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                    <td><a href="{{url('group_user',[$stt->id ,'delete'])}}"><span class="fa fa-trash-o" aria-hidden="true"></span></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="float:right">{!! $Group_user->render() !!}</div>
        </div>
    </div>

@endsection