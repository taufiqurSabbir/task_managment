<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Years;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{

    public function dep(){
        $all_dep = Department::all();
        $user_data=   $user_data = User::find(Auth::id());
        return view('dashboard.department',compact('user_data','all_dep'));
    }


    public function adddep(Request $request){
        $request->validate([
            'name' =>'required',
        ]);

        Department::create([
            'name'=> $request->name,
        ]);
        return back()->with('success','Department Added Successfully');
    }
}
