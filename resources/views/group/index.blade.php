@extends('xCV.template')
@section('title')Quản lý nhóm @endsection
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;" href="{{route('group.create')}}">Create</a>
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
                @foreach($Group as $key=>$stt)
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
                            <a style="font-weight: bold; color: white;" href="{{route('group.show',[$stt])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin trạng thái CV"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('group',[$stt->id ,'edit'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('group',[$stt->id ,'delete'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $Group->render() !!}
        </div>
    </div>

@endsection