<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use lluminate\Routing\Redirector;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoanController extends Controller
{
    public function loan(){
        $loan= loan::where('user_id', Auth::user()->id)->where('status',  'pending')->orderByDesc('id')->first();
       
        return view('user.Loan');
       

        // return redirect()->route('loan');
    }

    public function loanform1(){
        $total_debt= Loan::where('user_id', Auth::user()->id)->where('status', 'Processed')->where('paid', 'no')->orderBy('id', 'desc')->first();
        $user = Auth::user();
        $loan = Loan::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($user->account_bal < 5000) {
            return redirect()->route('dashboard')->with('message', 'Your account balance must be greater than 5000 to apply for loan');
        }elseif($loan->status == 'pending'){
            return redirect()->route('dashboard')->with('message', 'please wait, your loan will be processed within 48 hours');
        }elseif(($total_debt->amountloaned + $total_debt->intrest) > 0){
            return redirect()->route('dashboard')->with('message', 'please pay outstanding loan to apply for loan again');
        }else{
        return view('user.Loanform');

        }
    }

    public function loanform(Request $request){
        // $request->validate([
            
        //     'usersemail' => 'required',
        //     'amountloaned' => 'required',
        //     'charges' => 'required',
        //     'phone' => 'required',
        //     'fullname' =>'required|integer'
        // ]);
        $loan = Loan::where('user_id', Auth::user()->id)->where('status', 'pending')->first();
        if ($loan->status == 'pending') {
            return redirect()->route('dashboard')->with('success', 'your application has been submitted and will be reviwed within before 48 hours thank you.');
        } else {
            $user_id=Auth::user()->id;
            $usersemail=Auth::user()->email;
            $fullname=Auth::user()->name;
            $phone=Auth::user()->phone;
    
          $loan= loan::all();
            $loan = loan::create([
                'user_id' => $user_id,
                'usersemail' => $usersemail,
                'amountloaned' => $request->input('amountloaned'),
                'intrest' => $request->input('amountloaned') * 0.02 ,
                'phone' =>$phone,
                'fullname' => $fullname,
                'status' => 'pending',
                'paid' =>  'no'
            ]);
            
        return redirect()->route('dashboard',)
    
        ->with('success','your application has been submitted and will be reviwed within before 48 hours thank you. .');
        }
    }

    public function ploan1(){
        $loan = Loan::where('user_id', Auth::user()->id)->where('status', 'Processed')->where('paid', 'no')->first();

        return view('user.payloan', compact('loan'));
    }
   
}
