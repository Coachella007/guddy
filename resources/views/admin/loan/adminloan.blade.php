<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
		<div class="main-panel">
			<div class="content bg-{{Auth('admin')->User()->dashboard_style}} ">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<h1 class="title1 text-{{$text}}">Manage clients loans</h1>
					</div>
					<x-danger-alert/>
                    <x-success-alert/>
					<div class="mb-5 row">
						
						<div class="col-12 card shadow p-4 bg-{{Auth('admin')->User()->dashboard_style}}">
							<div class="table-responsive" data-example-id="hoverable-table"> 
								<table id="ShipTable" class="table table-hover text-{{$text}}"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Client name</th>
											<th>Client email</th>
											<th>Amount Loaned</th>
											<th>amount to be paid</th>
											{{-- <th>Plan</th> --}}
											<th>Status</th> 
											<th>Date created</th>
											<th>Option</th>
										</tr> 
									</thead> 
									<tbody> 
										@foreach($loans as $loan)
										<tr> 
											<th scope="row">{{$loan->id}}</th>
											<td>{{$loan->duser->name}}</td>
											<td>{{$loan->duser->email}}</td> 
											<td>{{$settings->currency}}{{number_format($loan->amountloaned)}}</td> 
											<td>{{$settings->currency}}{{number_format($loan->amountloaned + $loan->intrest)}}</td>
											{{-- @if(isset($deposit->dplan->name)) 
											<td>{{$deposit->dplan->name}}</td>
											@else
											<td>Account funds</td>
											@endif --}}
											<td>
												@if ($loan->status == "Processed")
													<span class="badge badge-success">{{$loan->status}}</span>
												@else
													<span class="badge badge-danger">{{$loan->status}}</span>
												@endif
											</td> 
											<td>{{\Carbon\Carbon::parse($loan->created_at)->toDayDateTimeString()}}</td> 
											<td> 
												
												@if ($loan->status == 'pending')
													<a href="{{route('processloan',$loan->id )}} " class="m-1 btn btn-danger btn-sm">process</a> 

												@endif

													<a class="btn btn-primary btn-sm" href="{{ url('admin/dashboard/delloan')}}/{{$loan->id}}">delete</a>
												
											</td> 
										</tr> 
										@endforeach
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>	
			</div>
	@endsection