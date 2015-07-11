@extends('layouts.master')
@section('page_title') Leave @endsection
@section('page_head') Leave @endsection
@section('page_summery') This is leave @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    	{!!Form::open(array('url'=>'leave/save-leave-request'))!!}
    	<div class="box box-info">
    		<div class="box-header">
				<h3 class="box-title">Request for leave</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="form-group col-md-6 <?= $errors->first('leave_start_date') ? "has-error" : "" ?>">
						{!!Form::label('Start Date','Start Date')!!}
						{!!Form::text('leave_start_date',null,array('class'=>'form-control datepicker'))!!}
						{!! $errors->first('leave_start_date', '<p class="text-danger">:message</p>') !!}
					</div>
					<div class="form-group col-md-6 <?= $errors->first('leave_end_date') ? "has-error" : "" ?>">
						{!!Form::label('End Date','End Date')!!}
						{!!Form::text('leave_end_date',null,array('class'=>'form-control datepicker'))!!}
						{!! $errors->first('leave_end_date', '<p class="text-danger">:message</p>') !!}
					</div>
				</div>
				<!-- <div class="row">
					<div class="form-group col-md-6 <?= $errors->first('description') ? "has-error" : "" ?>">
						{!!Form::label('Description','Description')!!}
						{!!Form::textarea('description',null,array('class'=>'form-control'))!!}
						{!! $errors->first('description', '<p class="text-danger">:message</p>') !!}
					</div>
				</div> -->
				<div class="row">
					<div class="form-group col-md-12">
						<textarea name="description" id="editor1" rows="10" cols="80">
			            </textarea>
			        </div>
				</div>
				<div class="form-group">
						<button class="btn btn-info">Submit</button>
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
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script>
	$(document).ready(function(){
		$(".datepicker").datepicker({format:'yyyy-mm-dd'});
		
    });
     CKEDITOR.replace( 'editor1' );

</script>

@endsection