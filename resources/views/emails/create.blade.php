@extends('emails.template')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post" action="{{ url('emails/send') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    <div class="form-group">
        <label for="recipient" class="label label-default">Recipient: </label>
        <input name="recipient" id="recipient" class="form-control" placeholder="Recipient's email"  value="{{ Input::old('recipient') }}"/>
    </div>

    <div class="form-group">
        <label for="sender" class="label label-default">Sender: </label>
        <input name="sender" class="form-control" placeholder="Sender's name" value="{{ Input::old('sender') }}"/>
    </div>

    <div class="form-group">
        <label for="subject" class="label label-default">Subject: </label>
        <input name="subject" class="form-control" placeholder="Email's subject"  value="{{ Input::old('subject') }}"/>
    </div>

    <div class="form-group">
        <label for="content" class="label label-default">Content: </label>
        <textarea id="content" name="content" class="form-control">{{ Input::old('content') }}</textarea>
    </div>

    <div class="form-group">
        <label for="attach" class="label label-default">Attach: </label>
        <input name="attach[]" class="form-control" type="file" multiple=""/>
    </div>

    <div class="form-group">
        <button name="sendMail" class="btn btn-primary">Send mail</button>
    </div>
</form>
@endsection