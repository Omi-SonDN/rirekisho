@extends('xCV.template')
@section('title')Quản lý Slide @endsection
@section('content')
    <div class="row">
        <a class="btn btn-primary open-modal" style="font-weight: bold; color: white;"  href="{{route('slide::addSlide')}}">Create</a>
    </div>
    <div class="row">
        <div class='col-lg-12'>
            <table class=" dataTable table table-hover table-responsive" id="pos-list">
                <thead>
                <th class="ab">STT</th>
                <th class="ab">Hình ảnh</th>
                <th class="ab">Text</th>
                <th class="ab">Vị trí</th>
                <th class="ab" style="text-align:center;">Hành động</th>
                </thead>
                @include('includes.flash-alert')
                <tbody id="list-table-body">
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
                            <table style="margin: 0 auto">
                                <tbody>
                                    <tr>
                                        <td><a href="{{url('slide',[$slide ,'view'])}}" data-toggle="tooltip" data-placement="top" data-original-title="Thông tin slide"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                        <td><a href="{{url('slide',[$slide ,'edit'])}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                                        <td><a href="{{url('slide',[$slide ,'delete'])}}"><span class="fa fa-trash-o" aria-hidden="true"></span></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div style="float:right">{!! $slides->render() !!}</div>
        </div>
    </div>
@endsection