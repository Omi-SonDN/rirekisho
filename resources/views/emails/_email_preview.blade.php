<div class="panel">
    <div class="panel panel-heading">
        <h3 style="color: #666699; text-align: center;">Xem trước Email</h3>
    </div>
    <div class="panel panel-body">
    	{!!$message!!}
    	@if(count($attachs))
    	<ul> Các tệp đính kèm:
    	@foreach($attachs as $file)
    		<li>{{$file}}</li>
    	@endforeach
    	</ul>
    	@endif
    	<button class="btn btn-primary col-lg-12" data-dismiss="modal">Đóng lại</button>
    </div>
</div>