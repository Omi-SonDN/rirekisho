@extends('xCV.template')
<title>Quản lý nhóm người dùng</title>
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;" href="{{route('group_user.create')}}">Create</a>
        <hr>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="table table-hover table-responsive table-bodered" id="pos-list">
                <thead>
                <th>STT</th>
                <th>Tên nhóm</th>
                <th>Nhóm cha</th>
                <th>Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody>
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
                            <a style="font-weight: bold; color: white;" href="{{route('group_user.show',[$stt])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin nhóm người dùng"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('group_user',[$stt->id ,'edit'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('group_user',[$stt->id ,'delete'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $Group_user->render() !!}
        </div>
    </div>

@endsection