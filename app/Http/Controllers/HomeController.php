<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectMember;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = Project::with('projectMembers','projectTask')
            ->whereHas('projectMembers', function($projectMembersQuery){
                $projectMembersQuery->where('user_id', auth()->user()->id);
            })
            ->get();
        
        return view('home', compact('projects'));
    }
}
