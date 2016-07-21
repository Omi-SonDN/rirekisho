@extends('positions.template')

@section('content')
<div class="row">
    <button class="btn btn-primary open-modal" name="btn_pos_create" id="btn_pos_create">Create</button>
    <hr>
</div>
<div class="row">
    <div class='col-lg-12'>
        <table class="table table-hover table-responsive" id="pos-list">
            <thead>
            <th>Position</th>
            <th>Active</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($positions as $position)
                <tr id="pos{{ $position->id }}">

                    <td>
                        {{ $position->name }}
                    </td>
                    <td>
                        {{ $position->active }}
                    </td>
                    <td>
                        <button class="btn btn-warning btn-lg open-modal" name="btn_position" id="btn_position" value="{{ $position->id }}">Edit</button>
                        <button class="btn btn-danger btn-lg delete-pos" name="btn_delete" id="btn_delete" value="{{ $position->id }}">Delete</button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $positions->render() !!}
    </div>
</div>

<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Positions Form</h4>
            </div>
            <div class="modal-body">
                <form id="frmPositions" name="frmPositions" class="form-horizontal">

                    <div class="form-group error">
                        <div id="error-frmPositions"></div>
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="position_name" name="name"/>
                        </div>
                        <div class="form-inline">
                            <label for="active" class="col-sm-3 control-label">Active</label>
                            <input class="form-control" type="checkbox" id="position_active" name="active" value="1"/>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="position_id" name="pos_id" value="0">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save</button>
            </div>
        </div>
    </div>
</div>

<meta name="_token" content="{!! csrf_token() !!}" />
@endsection