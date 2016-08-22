@extends('xCV.template')
<title>Quản lý ví trí tuyển dụng</title>
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;"  href="{{route('position::getaddposition')}}">Create</a>
        <hr>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="table table-hover table-responsive" id="pos-list">
                <thead>
                <th>STT</th>
                <th>Vị trí</th>
                <th>Kích hoạt</th>
                <th>Icon</th>
                <th>Mô tả</th>
                <th>Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody>
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
                            <a style="font-weight: bold; color: white;" href="{{url('position',[$position ,'view'])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin vị trí tuyển dụng"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('position',[$position ,'edit'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('position',[$position ,'delete'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $positions->render() !!}
        </div>
    </div>
@endsection