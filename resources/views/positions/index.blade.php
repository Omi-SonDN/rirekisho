@extends('xCV.template')
@section('title')Quản lý ví trí tuyển dụng @endsection
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;"  href="{{route('position::getaddposition')}}">Create</a>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="dataTable table table-hover table-responsive" id="pos-list">
                <thead>
                <th class="ab">STT</th>
                <th class="ab">Vị trí</th>
                <th class="ab">Kích hoạt</th>
                <th class="ab">Icon</th>
                <th class="ab">Mô tả</th>
                <th class="ab">Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody id="list-table-body">
                @foreach($positions as $key=>$position)
                    <tr id="pos{{ $position->id }}">
                        <td>
                            {{$key+1 }}
                        </td>
                        <td>
                            {{ $position->name }}
                        </td>
                        <td>
                            {!! $position->ActPosition !!}
                        </td>
                        <td>
                            <i class="fa {{$position->icon}}"></i>
                        </td>
                        <td>
                            {{$position->description}}
                        </td>
                        <td>
                            <table style="margin:0 auto">
                                <tr>
                                    <td><a href="{{url('position',[$position ,'view'])}}" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin vị trí tuyển dụng"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                    <td><a href="{{url('position',[$position ,'edit'])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                    <td><a href="{{url('position',[$position ,'delete'])}}"><span class="fa fa-trash-o" aria-hidden="true"></span></a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="float:right;">{!! $positions->render() !!}</div>
        </div>
    </div>
@endsection