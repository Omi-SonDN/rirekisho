@extends('xCV.template')
<title>Quản lý ví trí tuyển dụng</title>
@section('content')
    <div class="row">
        <button class="btn btn-primary open-modal" name="btn_pos_create" id="btn_pos_create"><a style="font-weight: bold; color: white;"  href="{{route('position::getaddposition')}}">Create</a></button>
        <hr>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="table table-hover table-responsive" id="pos-list">
                <thead>
                <th>STT</th>
                <th>Vị trí</th>
                <th>Kích hoạt</th>
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
                            {{ $position->ActPosition }}
                        </td>
                        <td>
                            {{$position->description}}
                        </td>
                        <td>
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