<?php
if (Auth('admin')->User()->dashboard_style  == "light") {
    $text = "dark";
    $bg = "light";
} else {
    $text = "light";
    $bg = "dark";
}
?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
        <div class="main-panel bg-{{$bg}}">
            <div class="content bg-{{$bg}}">
                <div class="page-inner">
                    <div class="mt-2 mb-5">
                        <h1 class="title1 d-inline text-{{$text}}">Process Loan Request</h1>
                        <div class="d-inline">
                            <div class="float-right btn-group">
                                
                                <a class="btn btn-primary btn-sm" href="{{route('adminloan')}}"> <i class="fa fa-arrow-left"></i> back</a>
                            </div>
                        </div>
                    </div>
                    <x-danger-alert/>
                    <x-success-alert/>
                    <div class="mb-5 row">
                        <div class="col-lg-8 offset-lg-2 card p-md-4 p-2 bg-{{$bg}} shadow">
                            <div class="mb-3">
                                @if ($loan->status != "Processed")
                                <h4 class="text-{{$text}}">Send Funds to {{$user->name}} through his payment details below</h4>
                                @else
                                <h4 class="text-success">Payment Completed</h4>
                                @endif
                            </div>
                           

                            @if ($loan->status != "Processed")
                                <div class="mt-1">
                                    <form action="{{route('ploan')}}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <h6 class="text-{{$text}}">Action</h6>
                                                <select name="action" id="action" class="bg-{{$bg}} text-{{$text}} mb-2 form-control">
                                                    {{-- <option selected disabled>Select processing action</option> --}}
                                                    <option value="Paid">Paid</option>
                                                    <option value="Reject">Reject</option>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="form-row d-none" id="emailcheck">
                                            <div class="col-md-12 form-group">
                                                <div class="selectgroup">
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="emailsend" id="dontsend" value="false" class="selectgroup-input" checked="">
                                                        <span class="selectgroup-button">Don't Send Email</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="radio" name="emailsend" id="sendemail" value="true" class="selectgroup-input">
                                                        <span class="selectgroup-button">Send Email</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row d-none" id="emailtext">
                                            <div class="form-group col-md-12">
                                                <h6 class="text-{{$text}}">Subject</h6>
                                                <input type="text" name="subject" id="subject" class="bg-{{$bg}} text-{{$text}} form-control">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <h6 class="text-{{$text}}">Enter Reasons for rejecting this withdrawal request</h6>
                                                <textarea class="bg-{{$bg}} text-{{$text}} form-control" row="3" placeholder="Type in here" name="reason" id="message"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$loan->id}}">
                                            <input type="submit" class="px-3 btn btn-primary" value="Proccess">
                                        </div>
                                    </form>
                                </div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <script>
                let action = document.getElementById('action');
                 
                $('#action').change(function(){
                    if (action.value === "Reject") {
                        document.getElementById('emailcheck').classList.remove('d-none');
                    }else{
                        document.getElementById('emailcheck').classList.add('d-none');
                        document.getElementById('emailtext').classList.add('d-none');
                        document.getElementById('dontsend').checked = true;
                        document.getElementById('subject').removeAttribute('required');
                        document.getElementById('message').removeAttribute('required');
                    }
                });

                $('#sendemail').click(function(){
                    document.getElementById('emailtext').classList.remove('d-none');
                    document.getElementById('subject').setAttribute('required', '');
                    document.getElementById('message').setAttribute('required', '');
                });

                $('#dontsend').click(function(){
                    document.getElementById('emailtext').classList.add('d-none');
                    document.getElementById('subject').removeAttribute('required');
                    document.getElementById('message').removeAttribute('required');
                });
            

            </script>
    @endsection