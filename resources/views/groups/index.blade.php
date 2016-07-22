@extends('groups.template')

@section('content')
    <div class="row">
    <button class="btn btn-primary open-modal" name="btn_group_create" id="btn_group_create">Create</button>
    <hr>
</div>
<div class="row">
    <div class='col-lg-12'>
        <table class="table table-hover table-responsive" id="groups-list">
            <thead>
            <th>Group</th>
            <th>Group's member</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($groups as $group)
                <tr id="group{{ $group->id }}" tabindex="-1">
                    <td>
                        {{ $group->name }}
                    </td>
                    <td>
                        <button class="btn btn-info btn-lg group_info" name="btn_group_info" id="btn_group_info" value="{{ $group->id }}">Show group's members</button>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-lg open-modal" name="btn_group" id="btn_group" value="{{ $group->id }}">Edit</button>
                        <button class="btn btn-danger btn-lg delete-group" name="btn_delete" id="btn_delete" value="{{ $group->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $groups->render() !!}
    </div>
</div>

<div class="modal fade"  id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Groups Form</h4>
            </div>
            <div class="modal-body">
                <form id="frmGroups" name="frmGroups" class="form-horizontal">
                    <div id="error-frmGroups"></div>
                    <div class="form-group error">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="group_name" name="name"/>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="group_id" name="group_id" value="0">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade"  id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">List member</h4>
            </div>
            <div class="modal-body">
                <form id="frmMembers" name="frmMembers" class="form-horizontal">
                    <div id="error-frmMembers"></div>
                    <div class="form-group error">
                        <label for="name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="members" name="members"/>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="group_id" name="group_id" value="0">
                <button type="button" class="btn btn-primary" id="btn-member-save" value="add">Save</button>
            </div>
        </div>
    </div>
</div>


<meta name="_token" content="{!! csrf_token() !!}" />
@endsection