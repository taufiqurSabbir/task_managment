<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\transation;
use App\Models\User;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransationController extends Controller
{
    public function transaction(Request $request){


        $user_data = User::find(Auth::id());
        $all_user = User::all();
        $month = Months::all();
        $year = Years::all();


        if(count($request->all()) >= 1)
        {

            if(isset($request->s_month)){
                $current_month=  transation::where('month_id',$request->s_month)->where('status','Due')->orWhere('status', 'paid')->get();
            }
            if(isset($request->s_month) ){
                $current_month=  transation::where('month_id',$request->s_month)->where('status','Due')->orWhere('status', 'paid')->get();
            }
            if(isset($request->s_year)){
                $current_month=  transation::where('year_id', $request->s_year)->where('status','Due')->orWhere('status', 'paid')->get();
            }
            if(isset($request->s_status)){
                $current_month=  transation::where('status', $request->s_status)->where('status','Due')->orWhere('status', 'paid')->get();
            }

            if(isset($request->s_type)){
                $current_month=  transation::where('type', $request->s_type)->where('status','Due')->orWhere('status', 'paid')->get();
            }

            if(isset($request->s_user)){
                $current_month=  transation::where('user_id', $request->s_user)->where('status','Due')->orWhere('status', 'paid')->get();
            }





        }
        else {
            $current_month=  transation::orderBy('month_id', 'asc')->orderBy('year_id', 'desc')->where('status','Due')->orWhere('status', 'paid')->get();
        }




        return view('dashboard.admin.transaction',compact('user_data','all_user','month','year','current_month'));
    }


    public function add_amount(Request $request){
        $request->validate([
            'user' =>'required',
            'month' =>'required',
            'year' =>'required',
            'payment_type'=>'required',
            'amount'=>'required'
        ]);


//        transation::create([
//            'amount' =>'300',
//            'type'=>'a',
//            'month_id'=>1,
//            'year_id'=>1,
//            'collect_by '=>'2',
//            'paid_date '=>date('d/m/Y' ),
//
//        ]);
        $transaction = new transation();
        $transaction->amount = $request->amount;
        $transaction->user_id = $request->user;
        $transaction->type = $request->payment_type;
        $transaction->month_id = $request->month;
        $transaction->year_id = $request->year;
        $transaction->collect_by =auth::id();
        $transaction->paid_date = date('y-m-d' );

        $transaction->save();

        return back()->with('success','Transaction added');

    }

    public function addyear(Request $request){

        $request->validate([
            'year' =>'required',
        ]);

        Years::create([
            'year'=> $request->year,
        ]);
        return back()->with('success','Year Added Successfully');
    }


    public function paid($id){

        $paid=transation::find($id);
        $paid->update([
            'status' =>'paid'
        ]);
        return back()->with('success',' Paid successfully');
    }

    public function due($id){

        $due= transation::find($id);
        $due->update([
            'status' =>'Due'
        ]);
        return back()->with('success',' Marked Due successfully');
    }

    public function delete_tran($id){
        transation::destroy($id);
        return back()->with('success',' Delete successfully');
    }



}
