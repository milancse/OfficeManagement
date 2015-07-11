@extends('layouts.master')
@section('page_title') Holiday @endsection
@section('page_head') Add new holiday(s) @endsection
@section('page_summery') This is holiday @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    	@if(!isset($holiday))
    	{!!Form::open(array('url'=>'holiday'))!!}
    	@else
    	{!!Form::model($holiday,array('route'=>array('holiday.update',$holiday->id),'method' => 'PUT'))!!}	
    	@endif
    	<div class="box box-info">
    		<div class="box-body">
    			<div class="row">
					<div class="form-group col-md-6 <?= $errors->first('holiday_start_date') ? "has-error" : "" ?>">
						{!!Form::label('Start Date','Start Date')!!}
						{!!Form::text('holiday_start_date',Input::old('holiday_start_date'),array('class'=>'form-control datepicker'))!!}
						{!! $errors->first('holiday_start_date', '<p class="text-danger">:message</p>') !!}
					</div>	
				</div>
				<div class="row">
					<div class="form-group col-md-6 <?= $errors->first('holiday_end_date') ? "has-error" : "" ?>">
						{!!Form::label('End Date','End Date')!!}
						{!!Form::text('holiday_end_date',Input::old('holiday_end_date'),array('class'=>'form-control datepicker'))!!}
						{!! $errors->first('holiday_end_date', '<p class="text-danger">:message</p>') !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6 ">
						{!!Form::label('Holiday Name','Holiday Name')!!}
						{!!Form::text('holiday_name',Input::old('holiday_name'),array('class'=>'form-control input-lg'))!!}
						{!! $errors->first('holiday_name', '<p class="text-danger">:message</p>') !!}
					</div>	
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<h4><input type="checkbox" name="status" value="1" checked> Active</h4>	
					</div>	
				</div>
				<div class="form-group">
						<button type="submit"class="btn btn-info">Submit</button>
				</div>
    		</div>
    	</div>
    	{!!Form::close()!!}
    </div>
</div>
@endsection

@section('custom_style')
<link href="{{ URL::asset('css/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('custom_script')
<script src="{{ URL::asset('js/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>


<script>
	$(document).ready(function(){
	 $('input').iCheck({
    checkboxClass: 'icheckbox_minimal',
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  	});
	$(".datepicker").datepicker({format:'yyyy-mm-dd'});
	
    }); 
</script>
@endsection