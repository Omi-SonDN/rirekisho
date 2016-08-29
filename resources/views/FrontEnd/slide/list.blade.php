@extends('xCV.template')
<title>Quản lý Slide</title>
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;"  href="{{route('slide::addSlide')}}">Create</a>
        <hr>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class="table table-hover table-responsive" id="pos-list">
                <thead>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Text</th>
                <th>Vị trí</th>
                <th>Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody>
                @foreach($slides as $key=>$slide)
                    <tr id="slide_{{ $slide->id }}">
                        <td>
                            {{$key+1 }}
                        </td>
                        <td>
                            <img src="{{asset($slide->image)}}" width="100" />
                            {{ $slide->name }}
                        </td>
                        <td>
                            {!! $slide->text !!}
                        </td>
                        <td>
                            {{$slide->order}}
                        </td>
                        <td>
                            <a style="font-weight: bold; color: white;" href="{{url('slide',[$slide ,'view'])}}" class="btn ink-reaction btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin slide"><span class="glyphicon glyphicon-eye-open"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('slide',[$slide ,'edit'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                            <a style="font-weight: bold; color: white;" href="{{url('slide',[$slide ,'delete'])}}" class="btn ink-reaction btn-primary"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $slides->render() !!}
        </div>
    </div>
@endsection