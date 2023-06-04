<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Expenses;
use App\Models\LoanRequest;
use App\Models\Months;
use App\Models\Notics;
use App\Models\transation;
use App\Models\User;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class admin extends Controller
{
   public function index()
   {
       $notice = Notics::latest()->take(10)->get();
       $total_user = User::where('user_status','Approved')->count();

       $user_data = User::find(Auth::id());




       return view('dashboard.admin.dashboard',compact('user_data','total_user','notice'));
   }

   public function all_user(){
       $user_data = User::find(Auth::id());
       $all_user = User::all();

       return view('dashboard.admin.pending_user',compact('user_data','all_user'));
}



    public function approve_user($id){
        $user=  User::find($id);
        $user->update([
            'user_status' =>'Approved'
        ]);
        return back()->with('success',$user->name.' Approve successfully');
    }

    public function pending_user($id){
        $user=  User::find($id);
        $user->update([
            'user_status' =>'pending'
        ]);
        return back()->with('success',$user->name.' pending successfully');
    }

    public function reject_user($id){
        $user=  User::find($id);
        $user->update([
            'user_status' =>'Rejected'
        ]);
        return back()->with('success',$user->name.' rejected successfully');
    }



    public function change_role_submit(Request $request){

       User::find($request->user)->update([
           'role' => $request->role
       ]);


        return back()->with('success',' User Role Updated');
    }

    public function user_profile(){
        $user_data = User::find(Auth::id());

        return view('user_profile',compact('user_data'));
    }

    public function update_profile(Request $request){

        $request->validate([
            'fullName' =>'required',
            'profile_image'=>'mimes:jpg,bmp,png',
        ]);

        $image_name = rand().'.'.$request->profile_image->extension();
        request('profile_image') ->move('image/profile_picture',$image_name);

      User::find(Auth::id())->update([
          'name' =>$request->fullName,
          'profile_picture' =>$image_name,

      ]);
        return back()->with('success',' Update Info successful');
    }


    public function update_password(Request $request){

        $request->validate([
            'password' => 'required|confirmed'
        ]);

             $user =  user::find(Auth::id());


             if ( Hash::check($request->oldpassword,$user->password)){
                $user->update([
                    'password' => bcrypt($request->password)
                ]);
                return redirect(route('logout'))->with('success','password Update successful');
             }else{
                 return back()->with('failed','Current Password not matched');
             }


    }




}
