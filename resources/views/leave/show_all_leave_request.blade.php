@extends('layouts.master')
@section('page_title') Leave @endsection
@section('page_head') Leaves @endsection
@section('page_summery') This is leave request @endsection
@section('content')
<div class="row">
    <div class="col-md-12">	
        	<div class="box box-info">
			<div class="box-body">
				<table class="table table-bordered">
					<tr>	
						<th>Employee ID</th>
						<th>Name</th>
						<th>Leave Start Date</th>
						<th>Leave End Date</th>
						<th>Total day(s)</th>
						<th width="20%">Action</th>
					</tr>
					@forelse($leave_request as $request)
						<tr>	
						<td>{!!$request->user->employee->employee_identifier!!}</td>
						<td>{!!$request->user->employee->first_name!!}<?= " "?>{!!$request->user->employee->last_name!!}</td>
						<td>{!!date('Y-m-d',strtotime($request->leave_start_date))!!}</td>
						<td>{!!date('Y-m-d',strtotime($request->leave_end_date))!!}</td>
						<td>{!!$request->leave_days_count!!}</td>
						<td>
							<a href="{!!URL::to('leave/detail',array($request->id))!!}"><button class="btn btn-info">Details</button></a>   
                        </td>
                    </tr>
                    @empty
					<tr><td class="empty_row" colspan='6'>No Data Found!</td></tr>
					@endforelse
				</table>
				{!! str_replace('/?', '?',$leave_request->render()) !!}
			</div>
		</div>
	</div>
</div>
<!-- <div id="request_modal" class="modal fade">
	<div class="modal-dialog modal-lg">
    	<div class="modal-content">
		      	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3">
								<p>Employee ID: <span id="id"></span></p>
							</div>
							<div class="col-md-3">
								<p>Name: <span id="name"></span></p>
							</div>
							<div class="col-md-3">
								<p>Start Date: <span id="leave_start_date"></span></p>
							</div>
							<div class="col-md-3">
								<p>End Date: <span id="leave_end_date"></span></p>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id">
					<input type="hidden" name="leave_start_date" id="leave_start_date">
        			<button type="button" class="btn btn-danger" data-dismiss="modal">Reject</button>
        			<a href="#"><button type="submit" name="save_btn" class="btn btn-primary">Accept</button></a>
      			</div>
			{!! Form::close() !!}
    	</div><!-- /.modal-content -->
  	<!--</div><!-- /.modal-dialog -->
<!--</div><!-- /.modal --> 
@endsection
@section('custom_style')
@endsection
@section('custom_script')
// <script>
// function requestLeaveByID(id,start_date){	
// 		$.ajax({
// 	      url:"{!!URL::to('leave/detail')!!}",
// 	      type:"get",
// 	      data:{'id':id,'start_date':start_date,'_token': $('input[name=_token]').val()},
// 	      success: function(data){
// 	       	var obj=JSON.parse(data);
// 	      	$('#id').text(obj.employee_id);
// 	  		$('#name').text(obj.name);
// 	  		$('#leave_start_date').text(obj.leave_start_date);
// 	  		$('#leave_end_date').text(obj.leave_end_date);
// 	        $("#request_modal .modal-title").html('Leave Request Details');
// 			$("#request_modal").modal("show");		
// 	      }
// 	    }); 
		
// }
// </script>
@endsection