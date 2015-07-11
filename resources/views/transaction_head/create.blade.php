@extends('layouts.master')
@section('page_title') Transaction Head @endsection
@section('page_head') Transaction Head  @endsection
@section('page_summery')Create New Transaction Head @endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			{!!Form::open(array('url'=>'transaction'))!!}
			<div class="box-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group <?= $errors->first('title') ? "has-error" : "" ?>">
							{!!Form::label('title','Title')!!}
							{!!Form::text('title',null,array('class'=>'form-control'))!!}

							{!! $errors->first('title', '<p class="text-danger">:message</p>') !!}

						</div>
						@if(isset($message))
								{!!$message!!}
							@endif
						<div class="form-group <?= $errors->first('head_type') ? "has-error" : "" ?>">
							{!!Form::label('head_type','Head Type')!!}
							{!!Form::select('head_type',config('constants.head_type'),null,array('class'=>'form-control','id'=>'head_type_select2'))!!}
							{!! $errors->first('head_type', '<p class="text-danger">:message</p>') !!}
						</div>
					
						<div class="form-group">
							{!!Form::label('details','Details')!!}
							{!!Form::textarea('details',null,array('class'=>'form-control'))!!}
						</div>
					</div>
					
				</div>	
			</div>
			<div class="box-footer">
				<button class="btn btn-info" name="btn_save_user"><i class="fa fa-save"></i> Save</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
</div>
@endsection
@section('custom_style')
<link href="{{ URL::asset('select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('custom_script')
<script src="{{ URL::asset('select2/select2.min.js')}}" type="text/javascript"></script>
<script>
	$('#head_type_select2').select2();
</script>
@endsection