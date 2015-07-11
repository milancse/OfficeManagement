@extends('layouts.master')
@section('page_title') Leave @endsection
@section('page_head') Leave @endsection
@section('page_summery') This is leave application @endsection
@section('content')
<div class="row">
    <div class="col-md-12">	
    	{!!Form::open(array('url'=>'leave/leave-accept-reject'))!!}
    	<div class="box box-info">
			<div class="box-body">
				<h4>To,<br>
					Mr./ Ms.M,<br>HR Manager,<br>{!!$leave_details->user->company->title!!} <br>{!!$leave_details->user->company->address!!}<br><br>	Dear Sir/ Mam,<br>
					This is to request you to kindly grant me a casual leave for {!!$leave_details->leave_days_count!!} day/s i.e.{!!date('Y-m-d',strtotime($leave_details->leave_start_date))!!} to {!!date('Y-m-d',strtotime($leave_details->leave_end_date))!!}. I need this leave for {!!$leave_details->description!!}. I will join my duties on @if (date('w',strtotime("+1 day", strtotime($leave_details->leave_end_date)))==5){!!date('Y-m-d',strtotime("+2 day", strtotime($leave_details->leave_end_date)))!!}.@else {!!date('Y-m-d',strtotime("+1 day", strtotime($leave_details->leave_end_date)))!!}. @endif<br><br>
					Thanking you,<br><br>Your's truly,<br>{!!$leave_details->user->employee->first_name!!} {!!$leave_details->user->employee->last_name!!},<br>
					{!!$leave_details->user->company->title!!}.<br><br>Dated:{!!date('Y-m-d',strtotime($leave_details->leave_application_date))!!}. 
				</h4>
				<div class="row">
					<div class="col-md-12 inline">
						<button type="submit" name="btn_type" value="accept.{!!$leave_details->id!!}" class="btn btn-primary">Accept</button>
						<button type="submit" name="btn_type" value="reject.{!!$leave_details->id!!}" class="btn btn-danger">Reject</button>
					</div>
				</div>
			</div>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@endsection
@section('custom_style')
@endsection
@section('custom_script')
@endsection