<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\loan;

use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;


class ManageLoanController extends Controller
{
    public function ploan(Request $request){
  
        $loan=loan::where('id',$request->id)->first();
        $user=User::where('id',$loan->user_id)->first();


      
        // if($withdrawal->user==$user->id){
            
        //     User::where('id',$user->id)
        //     ->update([
        //         'account_bal' => $user->account_bal-$withdrawal->to_deduct,
        //     ]);
        // }

        if ($request->action == "Paid") {
            loan::where('id',$request->id)
            ->update([
                'status' => 'Processed',
            ]);

            User::where('id',$loan->user_id)
            ->update([
                'account_bal' => $user->account_bal + $loan->amountloaned,
                'cstatus' => 'Customer',
            ]);
                //add funds to user's account
               
            $settings=Settings::where('id', '=', '1')->first();
            $message = "This is to inform you that your loan request of $settings->currency$loan->amountloaned have approved and funds have been sent to your selected account";

            Mail::to($user->email)->send(new NewNotification($message, 'laon application was successful', $user->name));
        }else {

            if($loan->user_id==$user->id){
                User::where('id',$user->id)
                ->update([
                    'account_bal' => $user->account_bal,
                ]); 
                loan::where('id',$request->id)->delete();

                if ($request->emailsend == "true") {
                    Mail::to($user->email)->send(new NewNotification($request->reason,$request->subject, $user->name));
                }
                
              }
            if($loan->status=="Processed"){
               
            }
        }

        return redirect()->route('adminloan')->with('success', 'Action Sucessful!');
    }

    
    public function processloan($id){
        
         $with = loan::where('id',$id)->first();
         $method = Wdmethod::where('name', $with->payment_mode)->first();
         $user = User::where('id', $with->user_id)->first();
        return view('admin.loan.processloan',[
            'loan' => $with,
            'method' => $method,
            'user' => $user,
            'title'=>'Process loan Request',
        ]);
    }
 
    public function delloan($id){
            $loan = loan::where('id', $id)->first();
            loan::where('id', $id)->delete();
            return redirect()->back()->with('success', 'loan history has been deleted!');
        
   }
}
