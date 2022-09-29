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
            <h5 class="mb-0 text-white h3 font-weight-400">Submit your loan application form.</h5>
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="p-2 shadow-lg card p-md-4">
                            <form method="post" action="{{route ('loanform') }}" id="amt">
                              @csrf

                              <div class="pt-3">
                                <label for="fullname">your full name</label>
                                <input value= "{{ Auth::user()->name }}" type="name" class="form-control" name="fullname" aria-describedby="emailHelp" disabled >
                              </div>

                                <div class="pt-3">
                                  <label for="Email1">Email address</label>
                                  <input value="{{ Auth::user()->email }}"type="email" class="form-control" id="Email1" name="usersemail" aria-describedby="emailHelp" placeholder="Enter email" disabled required>
                                </div>

                                <div class="pt-3">
                                  <label for="phone">Phone number</label>
                                  <input type="tel" class="form-control" name="phone" id='phone'required value="{{ Auth::user()->phone }} " readonly>

                                </div>

                                <div class="pt-3">
                                  <label for="amountloaned">amount to be loaned</label>
                                  <input id="amountloaned" type="number" class="form-control" name="amountloaned" aria-describedby="amount" min="5000" max="50000" minlength="4" max="25000" maxlength="4" required >
                                  <small id="emailHelp" class="form-text text-muted">note! the amount should not be above 50 percent of the premium investment plan.</small>
                                </div>
                                
                                  <div class="pt-3">
                                      <label for="intrest">Charge during payback</label>
                                      <input id="intrest" type="number" class="form-control" name="intrest" aria-describedby="charges" value="{{ $settings->currency }}" disabled required >
                                      <small id="" class="form-text text-muted">this would be charged on this user while paying back.</small>
                                  </div>
                               
                                 

                                  <div class="pt-3">
                                    <label for="exampleFormControlSelect1">select any government issued id to upload</label>
                                    <select type="file"   class="form-control" id="exampleFormControlSelect1">
                                      <option>national id</option>
                                      <option>drivers liscence</option>
                                      <option>registerd voters card</option>
                                      <option>others</option>
                                    </select>
                                  </div>

                                    <div class="pt-3">
                                        <label for="file">upload your government issued ID</label>
                                        <input type="file" class="form-control" name="file" required>
                                        <small id="" class="form-text text-muted">please upload for easy processing of your documents.</small>

                                      </div>


                            
                                <div class="pt-5">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script defer>
  function calculate() {
var inputform = document.forms['amt']
var firstelement = inputform.elements['amountloaned']
var firstvalue = firstelement.value
var percent = firstvalue * 0.02
var percent = Math.round(percent * 100) / 100
var secondelement = inputform.elements['intrest']
secondelement.value = percent

}
document.getElementById('amountloaned').addEventListener('keyup', calculate);
</script> 

  {{-- // var x = document.getElementById("amountloaned").value ;
  // document. getElementById('charges').value  = x; 
  // console.log(); --}}
  
  <div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  </div>


@endsection
