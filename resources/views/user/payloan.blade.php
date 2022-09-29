@extends('layouts.dash')
@section('title', $title)
@section('content')
@section('styles')
    @parent
    <link rel="stylesheet" href="{{ asset('dash/css/stripeglobal.css') }}">
    <link rel="stylesheet" href="{{ asset('dash/css/stripenormalize.css') }}">
@endsection

<!-- Page title -->
<div class="page-title">
    <div class="row justify-content-between align-items-center">
        <div class="mb-3 col-md-6 mb-md-0">
            <h5 class="mb-0 text-white h3 font-weight-400">Payment Of Loan</h5>
        </div>
    </div>
</div>


<div>
  @if(!empty($successMsg))
  <div class="row">
      <div class="col-lg-12">
          <div class="alert alert-group alert-danger alert-icon alert-dismissible fade show" role="alert">
              <div class="alert-group-prepend">
                  <span class="alert-group-icon text-">
                      <i class="far fa-thumbs-down"></i>
                  </span>
              </div>
              <div class="alert-content">
                  {{ $successMsg }}
              </div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      </div>
  </div>
  @endif
</div>
<x-danger-alert />
<x-success-alert />

@if ($loan->amountloaned > 0)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="p-2 shadow-lg card p-md-4">
                            <form method="POST" action="{{route ('deposits') }}" id="amt">
                              @csrf
                                
                                <div class="pt-3">
                                  <label for="amountloaned">Amount Loaned</label>
                                  <input id="amountloaned" type="number" value="{{ $loan->amountloaned }}" class="form-control" name="amountloaned" aria-describedby="amount" required readonly>
                                  {{-- <small id="emailHelp" class="form-text text-muted">note! the amount should not be above 50 percent of the premium investment plan.</small> --}}
                                </div>
                                
                                  <div class="pt-3">
                                      <label for="intrest">Amount To Pay </label>
                                      <input id="intrest" type="number" class="form-control" name="intrest" aria-describedby="charges" value="{{ $loan->amountloaned + $loan->intrest }}" disabled required >
                                      <small id="" class="form-text text-muted">amount loaned + 2% charge</small>
                                  </div>
                                                        
                            
                                <div class="pt-5">
                                      <a  href="{{ route('deposits') }}" type="submit" class="btn btn-primary" {{ (($loan->amountloaned + $loan->intrest) < ($user->account_bal)) ? 'disabled' : '' }}  value="submit" style="width:100%;" >proceed to loan application</a>
                                </div>
                              </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@else
<div class="mt-4 row">
    <div class="col-md-12">
        <div class="py-4 card">
            <div class="text-center card-body">

                <p>You are currently not on loan at the moment</p>
                <a href="{{ route('loan') }}" class="px-3 btn btn-primary">Apply for loan</a>
            </div>
        </div>
    </div>
</div>
@endif



@endsection
