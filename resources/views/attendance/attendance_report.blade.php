@extends('layouts.master')
@section('page_title') Attendance @endsection
@section('page_head') Attendance @endsection
@section('page_summery') This is attendance report @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      {!!Form::open(array('url'=>'attendance/attendance-report','id'=>'attendanceReportForm'))!!}
    	<div class="box box-info ">
      <div class="box-header with-border">
			  <h3 class="box-title">
          Attendance Report 
          @if($start_date !=null && $end_date!=null )
            on {!!$start_date!!} to {!!$end_date!!}
          @endif
        </h3>
			  <div class="box-tools pull-right">
				<div class="form-inline">
				  <div class="form-group ">
				  {!!Form::select('employee_id',array('default'=>'Select Employee')+$employee_list,Input::get('employee_id'),array('class'=>'form-control select2','placeholder'=>'Employee Name','id'=>'employee_id'))!!}
				  </div>  
				  <div class="form-group"> 

					<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						<span>{!! date('d, M Y', strtotime(Input::get('start_date'))) !!} - {!! date('d, M Y', strtotime(Input::get('end_date'))) !!}</span > <b class="caret"></b>
						<input type="hidden" name="start_date" id="start_date" value="{!! Input::get('start_date') !!}"/>
						<input type="hidden" name="end_date" id="end_date" value="{!! Input::get('end_date') !!}"/>
					</div>
				  </div>
				</div>
			  </div>
			</div>  
      <div class="box-body table-responsive no-padding">
        <div id="attendance_report">
			 <table class="table table-bordered">
				<tr>  
				  <th>Date</th>
				  <th>In Time</th>
				  <th>Out Time</th>
				  <th>Comment</th>
          <th>Network IP</th>
				</tr>
				{!!$tbody!!}
			</table>
			<div class="box-footer">
			<!-- <button class="btn btn-info" name="btn_save_user"><i class="fa fa-save"></i> Save</button> -->
			{!! $footer !!}
		  </div>
        
		</div>  
	  </div> 
      <div class="text-center <?= $footer != null? "show": "hide" ?> ">
        <a href="javascript:void(0)" class="btn btn-info  print"><i class="fa fa-print"></i>&nbsp;Print</a>
      </div>		
    </div>
      {!!Form::close()!!}
    </div>
</div>
@endsection
@section('custom_style')
<link href="{{ URL::asset('select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('bootstrap_daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('custom_script')
<script src="{{ URL::asset('select2/select2.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('bootstrap_daterangepicker/moment.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('bootstrap_daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>

<script >
$(document).ready(function(){
  /* Print Employee attendance report*/
  $('.print').click(function(){
	$('td:nth-child(4),th:nth-child(4)').hide();
    $("#attendance_report").print({
                globalStyles: true,
                mediaPrint: true,
                stylesheet:null,
                noPrintSelector: ".comment",
                iframe: true,
                append: null,
                prepend: "{!!$printing_markup!!}</br></br>",
                manuallyCopyFormValues: true,
                deferred: $.Deferred()
          });
  });

	$(".select2").select2();
  $('#reportrange').daterangepicker({

      ranges: {
         'Today': [moment(), moment()],
         'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
         'Last 7 Days': [moment().subtract(6, 'days'), moment()],
         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
         'This Month': [moment().startOf('month'), moment().endOf('month')],
         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      opens: 'left',
      drops: 'down',
      buttonClasses: ['btn', 'btn-sm'],
      applyClass: 'btn-primary',
      cancelClass: 'btn-default',
      separator: ' to ',
      locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Cancel',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
      }
   
  }, function(start, end, label) {
      
      //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      $('#reportrange #start_date').val(start.format('YYYY-MM-DD'));
      $('#reportrange #end_date').val(end.format('YYYY-MM-DD'));
      $('#attendanceReportForm').submit();
  });


  $(function () {
    $('[data-toggle="popover"]').popover()
  });
  
  

});

</script>
@endsection
