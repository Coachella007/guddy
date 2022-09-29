
@extends('layouts.dash')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Your ROI history</h5>
            </div>
        </div>
    </div>
    <x-danger-alert/>
	<x-success-alert/>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
					<div class="mb-5 row">
						<div class="p-2 text-center shadow-lg p-md-4 col-12 card">
							<div class="table-responsive"> 
								<table id="UserTable" class="table UserTable table-hover "> 
									<thead> 
										<tr> 
											<th>Plan</th>
											<th>Amount</th>
											<th>Type</th>
											<th>Date created</th>
										</tr> 
									</thead> 
									<tbody> 
									@foreach($t_history as $history)
										<tr> 
											<td>{{$history->plan}}</td> 
											<td>{{$settings->currency}}{{$history->amount}}</td> 
											<td>{{$history->type}}</td> 
											<td>{{\Carbon\Carbon::parse($history->created_at)->toDayDateTimeString()}}</td> 
										</tr> 
									@endforeach
									</tbody> 
								</table>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
	</div>
@endsection
