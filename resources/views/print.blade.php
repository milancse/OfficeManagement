<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<!-- <link href="{{ URL::asset('css/print.css') }}" rel="stylesheet" type="text/css" media="print"/> -->
	<link href="{{ URL::asset('bootstrap-3.3.4/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>
	<div class="container">
		<div id="table_print">
			<table class="table table-hover">
				<tr>
					<th>Name</th>
					<th>Email</th>
				</tr>
				<tr>
					<td class="success">Milan</td>
					<td>milan31cse@gmail.com</td>
				</tr>
				<tr>
					<td class="danger">Milan</td>
					<td><span class="label label-success">milan31cse@gmail.com</span></td>
				</tr>
			</table>
		</div>
		<button class="btn btn-info print">Print</button>
	</div>
	
	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('js/jQuery.print.js')}}" type="text/javascript"></script>
	<script src="{{ URL::asset('bootstrap-3.3.4/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			$('.print').click(function(){
				console.log("print");
				 $("#table_print").print({
		            globalStyles: true,
		            mediaPrint: true,
		            stylesheet:null,
		            noPrintSelector: ".no-print",
		            iframe: true,
		            append: null,
		            prepend: null,
		            manuallyCopyFormValues: true,
		            deferred: $.Deferred()
   				});
			});
		});
	</script>
</body>
</html>