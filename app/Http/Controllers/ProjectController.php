<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use App\ProjectMember;
use App\ProjectTask;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('projectMembers','user')->get();
        $users = User::where('status',null)->get();
        $departments = Department::where('status','Active')->get();

        return view('projects', compact('projects','users', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $projects = new Project;
        $projects->project_name = $request->project_name;
        $projects->department_id = $request->department;
        $projects->description = $request->description;
        $projects->user_id = auth()->user()->id;
        $projects->save();

        foreach($request->members as $members)
        {
            $project_members = new ProjectMember;
            $project_members->project_id = $projects->id;
            $project_members->user_id = $members;
            $project_members->save();
        }

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('projectMembers')->findOrFail($id);
        $users = User::whereIn('role',['IT Personnel', 'IT Department Head'])->where('status',null)->pluck('name','id');
        
        if (in_array(auth()->user()->id, $project->projectMembers->pluck('user_id')->toArray()))
        {
            $project_task = ProjectTask::with('assignedTo')->get();
    
            return view('view_project',compact('project_task','users'));
        }
        else
        {
            Alert::error('You are not a member of this project')->persistent('Dismiss');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $projects = Project::findOrFail($id);
        $projects->project_name = $request->project_name;
        $projects->department_id = $request->department;
        $projects->description = $request->description;
        $projects->user_id = auth()->user()->id;
        $projects->save();

        $members = ProjectMember::where('project_id',$id)->delete();
        foreach($request->members as $members)
        {
            $project_members = new ProjectMember;
            $project_members->project_id = $projects->id;
            $project_members->user_id = $members;
            $project_members->save();
        }

        Alert::success('Successfully Updated')->persistent('Dismiss');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
