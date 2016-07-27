@extends('xCV.template')

@section('content')
    <div class="row">
        <button class="btn btn-primary open-modal" name="btn_pos_create" id="btn_pos_create"><a style="font-weight: bold; color: white;" href="{{route('status::getaddstatus')}}">Create</a></button>
        <hr>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="table table-hover table-responsive" id="pos-list">
                <thead>
                <th>STT</th>
                <th>Trạng thái</th>
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