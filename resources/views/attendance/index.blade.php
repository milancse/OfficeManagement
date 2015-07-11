@extends('layouts.master')
@section('page_title') Attendance @endsection
@section('page_head') Attendance @endsection
@section('page_summery') This is attendance @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    	<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Attendance history for month of <?= date("M, Y");?></h3>
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tbody>  	
					  	<tr>	
					  		<th>Date</th>
							<th>In Time</th>
							<th>Out Time</th>
							<th>Comment</th>
							<th width="20%">Action</th>
						</tr>
						<?php $comment="";?>
						@forelse($attendances as $attendance)
						<?php    
								$in_date = new \DateTime($attendance->in_time);
								$out_date= new \DateTime($attendance->out_time);
								$date_difference=$in_date->diff($out_date)->days;
						?>	
						@if($date_difference>0)
							<tr class="danger">
								<td>{{date('d M, Y',strtotime($attendance->in_time))}}</td>
								<td>{!!date('h:i:s a',strtotime($attendance->in_time))!!}</td>
								@if(isset($attendance->out_time))
									<td>{!!date('Y-m-d h:i:s a',strtotime($attendance->out_time))!!}</td>
								@else
									<td></td>
								@endif
								<td>{{$attendance->comments}}</td>
								@if(isset($attendance->out_time))	
									<td></td>
		                        @else
		                        	<td>
										<a href="javascript:sign_out_modal({!!$attendance->id!!},{!!date('Y-m-d',strtotime($attendance->in_time))!!})"><button class="btn btn-xs btn-warning" ><i class="fa fa-sign-out"></i> Punch Out</button></a>
		                        	</td>
		                        @endif
	                    	</tr>
	                    @else
	                    	<tr>
								<td>{{date('d M, Y',strtotime($attendance->in_time))}}</td>
								<td>{!!date('h:i:s a',strtotime($attendance->in_time))!!}</td>
								@if(isset($attendance->out_time))
									<td>{!!date('h:i:s a',strtotime($attendance->out_time))!!}</td>
								@else
									<td></td>
								@endif
								<td>{{$attendance->comments}}</td>
								@if(isset($attendance->out_time))	
									<td></td>
		                        @else	
		                        	<td>
										<a href="javascript:sign_out_modal({!!$attendance->id!!},{!!date('Y-m-d',strtotime($attendance->in_time))!!})"><button class="btn btn-xs btn-warning" ><i class="fa fa-sign-out"></i> Punch Out</button></a>
		                        	</td>
		                        @endif
	                    	</tr>
	                    @endif
	                    @empty
						<tr><td class="empty_row" colspan='5'>No Data Found!</td></tr>
					@endforelse	
					<tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="punchout_modal" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">
    		{!! Form::open(array('url' => 'attendance/punchout')) !!}
		      	<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">    
					
					<div class="form-group">
						{!! Form::label('Comment', 'Comment')!!}
						{!! Form::textarea('comment', null, array('placeholder'=>'Write your comments','class' => 'form-control','id'=>'sign_out_comment')) !!}
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="in_time" id="in_time">
      				<input name="hdn_action" id="hdn_action" type="hidden" value="">
      				<input name="hdn_gid" id="hdn_gid" type="hidden" value="">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<a href="{!!URL::to('attendance/punchout')!!}"><button type="submit" name="save_btn" class="btn btn-primary"><i class='fa fa-save'></i> Save</button></a>
      			</div>
			{!! Form::close() !!}
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('custom_style')
@endsection

@section('custom_script')
<script>
function sign_out_modal(id,in_time){
		$.ajax({
	      url:"attendance/comment",
	      type: "GET",
	      //dataType:"json",
	      data: {'id':id,'in_time':in_time,'_token': $('input[name=_token]').val()},
	      success: function(data){
	      	var obj=JSON.parse(data);
	  		$('#in_time').val(obj.in_time)
	  		$('#sign_out_comment').val(obj.comments);
	        $("#punchout_modal .modal-title").html('Write your comment');
			$("#punchout_modal").modal("show");
					
	      }
	    }); 
		
}
</script>
@endsection