@extends('layouts.master')
@section('page_title') Holiday @endsection
@section('page_head') Holidays @endsection
@section('page_summery') This is holiday @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    	<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title">Holiday Calender</h3>
				<div class="box-tools pull-right">
          @if(Auth::user()->role->name!='employee')
					<a href="{!!URL::to('holiday/create')!!}"><button type="button" class="btn btn-danger"><i class="fa fa-plus-circle"></i> Add New Holiday</button></a>
				  @endif
        </div>
			</div>
			<div class="box-body">
				<div class="row">
          <div class="col-md-12">
  					<div class="form-group">
  						<div id="calendar"></div>
  					</div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="modal_holiday" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
        {!! Form::open(array('url' => 'holiday/edit-holiday')) !!}
            <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Holiday details</h4>
        </div>
        <div class="modal-body">    
          <div class="form-group">
              {!! Form::label('holiday_reason', 'Holiday Reason')!!}
              {!! Form::text('holiday_name', null, array('required','class' => 'form-control','id'=>'holiday_reason')) !!}
              
          </div>
          <div class="form-group">
            {!! Form::label('holiday_start_date', 'Holiday Start Date')!!}
            {!! Form::text('holiday_start_date', null, array('required','class' => 'form-control datepicker','id'=>'holiday_start_date')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('holiday_end_date', 'Holiday End Date')!!}
            {!! Form::text('holiday_end_date', null, array('required','class' => 'form-control datepicker','id'=>'holiday_end_date')) !!}
            
          </div> 
        </div>
        <div class="modal-footer">
              <input name="hdn_holiday_id" id="holiday_id" type="hidden" value="">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" name="save_garment" class="btn btn-primary"><i class='fa fa-save'></i> Save</button>
        </div>
      {!! Form::close() !!}
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $user_type=Auth::user()->role->name;?>
@endsection

@section('custom_style')
<link href="{{ URL::asset('fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('bootstrap_editable/bootstrap-editable.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('custom_script')
<script src="{{ URL::asset('fullcalendar/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('bootstrap_editable/bootstrap-editable.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script>

  //console.log(check_user);
$(document).ready(function() {
  $(".datepicker").datepicker({format:'yyyy-mm-dd'});
  var calender_date=<?php echo  $holidays; ?>;
  var check_user='<?php echo Auth::user()->role->name; ?>';
   $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    editable: false,
    eventLimit: true,
    events: calender_date,
    eventColor: 'red',
    eventClick: function(event, jsEvent, view) {
      if(check_user=='employee')
      {
        return false;
      }
      var date=new Date(event.end._i);
      var end_date=new Date(date.setDate(date.getDate()-1));
      $('#holiday_reason').val(event.title);
      $('#holiday_start_date').val(event.start._i);
      $('#holiday_end_date').val(end_date.getFullYear()+'-'+("0" + (end_date.getMonth()+1)).slice(-2)+'-'+("0"+end_date.getDate()).slice(-2));
      $('#holiday_id').val(event.id);
      $('#modal_holiday').modal("show");
                               
    }
  });

});
</script>
@endsection