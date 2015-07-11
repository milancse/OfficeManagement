@extends('layouts.master')
@section('page_title') Transaction Head @endsection
@section('page_head') Transaction Heads @endsection
@section('page_summery') This is Transaction Head @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
    	<div class="box box-info">
			<div class="box-header">
				<h3 class="box-title"></h3>
				<div class="box-tools pull-right">
					@if(Auth::user()->role->name!=='employee')
						<a href="transaction/create"><button id="btn_add_new_factory" type="button" class="btn btn-danger"><i class="fa fa-plus-circle"></i> Add New transaction Head</button></a>
					@endif				
				</div>
			</div>
			<div class="box-body">
				<table class="table table-bordered">
					<tr>
						
						<th>Company</th>
						<th>Title</th>
						<th>Head Type</th>
						<th>Details</th>
						<th width="20%">Actions</th>
					</tr>
					@forelse($transaction_heads as $transaction_head)
					<tr>
						
						<td>{{$company->title}}</td>
						<td>{{$company->address}}</td>
						<td>{{$company->phone}}</td>
						<td>{{$company->email}}</td>
						<td>
							<a href="{!!URL::to('company/'.$company->id)!!}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
                            <a href="{!!URL::to('/company/'.$company->id).'/edit'!!}" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> Edit</a>
                            
                        </td>
                    </tr>
                    @empty
					<tr><td class="empty_row" colspan='5'>No Data Found!</td></tr>
					@endforelse
                </table>
                {!! str_replace('/?', '?',$companies->render()) !!}
			</div><!-- /.box-body -->
		</div><!-- /.box -->
    </div>
</div>

@endsection

@section('custom_style')
@endsection

@section('custom_script')

@endsection