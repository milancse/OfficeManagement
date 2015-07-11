@extends('layouts.master')
@section('page_title') Set Office Time @endsection
@section('page_head') Office Time @endsection
@section('page_summery')Set Office Time @endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">	
		{!!Form::open(array('url'=>'office/save-office-time'))!!}
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
							<div class="form-group  <?= $errors->first('office_time_title') ? "has-error" : "" ?>">
								{!!Form::label('office_time_title','Title for officetime')!!}
								{!!Form::text('office_time_title',Input::old('office_time_title'),array('class'=>'form-control '))!!}
								{!! $errors->first('office_time_title', '<p class="text-danger">:message</p>') !!}
							</div>  
							<div class="form-group  <?= $errors->first('office_time_zone') ? "has-error" : "" ?>">
								{!!Form::label('department','Department')!!}
								{!!Form::select('department',$data['department_list'],null,array('class'=>'form-control','id'=>'depertment_select2'))!!}
								{!! $errors->first('office_time_zone', '<p class="text-danger">:message</p>') !!}
							</div>
							<div class="form-group ">
								{!!Form::label('office_intime','Office Start Time')!!}
								<div class="input-group ">
									{!!Form::text('office_intime',Input::old('office_intime'),array('class'=>'form-control timepicker1'))!!}  
									<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
								</div>	       
							</div>
							<div class="form-group ">
								{!!Form::label('office_outtime','Office End Time')!!}
								<div class="input-group ">
								 {!!Form::text('office_outtime',Input::old('office_outtime'),array('class'=>'form-control timepicker2'))!!} 
								<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
								</div>
							</div>		
							{!! Form::checkbox('active', '1','checked',array('class'=>'form-group')) !!} Active.
							
					</div>
					<div class="col-md-8">
						<div class="table-responsive">
							<table class="table table-bordered ">
								<tr>
									<th>Title</th>
									<th>Department</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th width="10%">Status</th>
									<th>Created at</th>
								</tr>
								@forelse($data['office_times'] as $office_time)
								<tr>	
									<td>{!!$office_time->title!!}</td>
									<td>{!!$office_time->depertment->title!!}</td>
									<td>{!!date('h:i:s a',strtotime($office_time->office_intime))!!}</td>
									<td>{!!date('h:i:s a',strtotime($office_time->office_outtimetime))!!}</td>
			                        @if($office_time->status==0)
			                        	<td><a href="javascript:ChangedStatus({!!$office_time->id!!})" class="btn btn-danger" >Deactive</a></td>
			                    	@else
			                    		<td><a href="javascript:ChangedStatus({!!$office_time->id!!})" class="btn btn-success">Active</a></td>
			                    	@endif
			                    	<td>{!!date('d F, Y',strtotime($office_time->created_at))!!}</td>
			                    </tr>
			                    @empty
								<tr><td class="empty_row" colspan='5'>No Data Found!</td></tr>
								@endforelse
	                		</table>
	                		{!! str_replace('/?', '?',$data['office_times']->render()) !!}
	                	</div>
					</div>
				</div>
			</div><!-- /.box-body -->
			<div class="box-footer">
				<button class="btn btn-info" name="btn_save_user"><i class="fa fa-save"></i> Save</button>
			</div>
			{!!Form::close()!!}
		</div><!-- /.box -->
	</div><!-- /.col -->
</div>
<!--resource found: http://laravelcollective.com/docs/5.0/html-->
@endsection
@section('custom_style')
<link href="{{ URL::asset('bootstrap_timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('custom_script')
<script src="{{ URL::asset('bootstrap_timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{ URL::asset('select2/select2.min.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$('#depertment_select2').select2();
	$('input').iCheck({
	    checkboxClass: 'icheckbox_minimal',
	    radioClass: 'iradio_square',
	    increaseArea: '20%'
  	});
	$('.timepicker1').timepicker();
	$('.timepicker2').timepicker();
});

function ChangedStatus(id)
{
	$.ajax({
		url:"{!!URL::to('office/changed-status')!!}",
		type:"post",
		data:{id:id},
		success:function(data)
		{
			location.reload();
		}

	});
}
</script>
@endsection