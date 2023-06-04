<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){
        $all_project = Project::all();
        $user_data=   $user_data = User::find(Auth::id());
        return view('dashboard.projects',compact('user_data','all_project'));
    }

    public function add_project(Request $request){
        $request->validate([
            'name' =>'required',
            'starting_date'=>'required',
            'end_date'=>'required',
            'status'=>'required'
        ]);

        Project::create([
            'name'=> $request->name,
            'start_date'=>$request->starting_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
            'created_by'=>Auth::id(),
        ]);
        return back()->with('success','Project Added Successfully');
    }
}
