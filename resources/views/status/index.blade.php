@extends('xCV.template')
<title>Quản lý trạng thái</title>
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;" href="{{route('status::getaddstatus')}}">Create</a>
        <hr>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="table table-hover table-responsive table-bodered" id="pos-list">
                <thead>
                <th>STT</th>
                <th>Trạng thái</th>
                <th>Cho phép gửi mail</th>
                <th>Visitor quản lý</th>
                <th>Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody>
                @foreach($Status as $key=>$stt)
                    <tr id="pos{{ $stt->id }}">

                        <td>
                            {{$stt->id }}
                        </td>
                        <td>
                            {{ $stt->status }}
                        </td>
                        <td>
                            {!! $stt->allow_send !!}
                        </td>
                        <td>
                            {!! $stt->role_Visitor !!}
                        </td>
                        <td>
                            <a style="font-weight: bold; color: white;" href="{{url('status',[$stt ,'view'])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin trạng thái CV"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('status',[$stt->id ,'edit'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('status',[$stt->id ,'delete'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $Status->render() !!}
        </div>
    </div>

@endsection