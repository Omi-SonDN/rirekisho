@extends('xCV.template')
@section('title')Quản lý trạng thái @endsection

@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;" href="{{route('status::getaddstatus')}}">Create</a>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="dataTable table table-hover table-responsive table-bodered" id="pos-list">
                <thead>
                <th class="ab">STT</th>
                <th class="ab">Trạng thái</th>
                <th class="ab">Cho phép gửi mail</th>
                <th class="ab">Visitor quản lý</th>
                <th class="ab" style="text-align:center;">Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody id="list-table-body">
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
                            <table style="margin: 0 auto">
                                <tbody>
                                    <tr>
                                        <td><a href="{{url('status',[$stt ,'view'])}}" class="" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin trạng thái CV"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                        <td><a href="{{url('status',[$stt->id ,'edit'])}}" class=""><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                        <td><a href="{{url('status',[$stt->id ,'delete'])}}" class=""><span class="fa fa-trash-o" aria-hidden="true"></span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="float:right;">{!! $Status->render() !!}</div>
        </div>
    </div>

@endsection