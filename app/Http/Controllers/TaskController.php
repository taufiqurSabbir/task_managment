<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(){
        $all_project = Project::all();
        $user_data=   $user_data = User::find(Auth::id());
        return view('dashboard.task',compact('user_data','all_project'));
    }
}
