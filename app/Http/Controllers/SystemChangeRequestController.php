<?php

namespace App\Http\Controllers;

use App\Project;
use App\ProjectTask;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use RealRashid\SweetAlert\Facades\Alert;

class SystemChangeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::whereHas('department', function($q) {
                $q->where('department_id', auth()->user()->department_id);
            })
            ->pluck('project_name','id');

        $project_tasks = ProjectTask::whereHas('project', function($q) {
                $q->where('department_id', auth()->user()->department_id);
            })
            ->get();
        
        return view('system_change_request', compact('projects', 'project_tasks'));
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
        $project_task = new ProjectTask();
        $project_task->priority = $request->priority;
        $project_task->project_id = $request->project;
        $project_task->type_of_request = $request->type_of_request;
        $project_task->date_needed = $request->date_needed;
        $project_task->activity_task = $request->activity_task;
        $project_task->project_name = $request->project_name;
        $project_task->reason_for_changes = $request->reason_for_changes;
        $project_task->goal = $request->goals;
        $project_task->reporter = auth()->user()->id;
        $project_task->status = 'Pending';
        $project_task->progress = 'Todo';
        $project_task->save();

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
        //
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
        $project_task = ProjectTask::findOrFail($id);
        // $project_task->project_id = $request->project;
        $project_task->type_of_request = $request->type_of_request;
        $project_task->priority = $request->priority;
        $project_task->date_needed = $request->date_needed;
        $project_task->activity_task = $request->activity_task;
        $project_task->reason_for_changes = $request->reason_for_changes;
        $project_task->project_name = $request->project_name;
        $project_task->goal = $request->goals;
        // $project_task->reporter = auth()->user()->id;
        // $project_task->status = 'Pending';
        $project_task->save();

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

    public function printScrf($id)
    {
        $project_task = ProjectTask::findOrFail($id);

        $data_array = [];
        $data_array['project_task'] = $project_task;
        $data_array['it_head'] = User::where('role', 'IT Department Head')->where('status',null)->first();
        $data_array['sys_admin'] = User::where('role', 'System Administrator')->where('status',null)->first();
        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('print_scrf', $data_array)->setPaper('a4', 'portrait');

        return $pdf->stream();
    }
}
