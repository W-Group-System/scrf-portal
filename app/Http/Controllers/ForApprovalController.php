<?php

namespace App\Http\Controllers;

use App\ProjectTask;
use App\ScrfApproval;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ForApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $project_tasks = ProjectTask::where('status', 'Pending')
        //     ->whereHas('project', function($q) {
        //         $q->where('department_id', auth()->user()->department_id);
        //     })  
        //     ->get();

        $scrf_approvals = ScrfApproval::with('project_task.project_task_attachment')->where('user_id', auth()->user()->id)->where('status','Pending')->get();

        return view('for_approval', compact('scrf_approvals'));
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
        //
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
        //
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

    public function approve($id)
    {
        // dd($id);
        $project_tasks = ProjectTask::find($id);
        $project_tasks->status = 'Approved';
        $project_tasks->progress = 'Todo';
        $project_tasks->save();

        $approvals = ScrfApproval::where('project_task_id',$id)->first();
        $approvals->status = 'Approved';
        $approvals->save();

        Alert::success('Successfully Approved')->persistent('Dismiss');
        return back();
    }
    public function reject($id)
    {
        // dd($id);
        $project_tasks = ProjectTask::find($id);
        $project_tasks->status = 'Returned';
        $project_tasks->save();

        $approvals = ScrfApproval::where('project_task_id',$id)->first();
        $approvals->status = 'Returned';
        $approvals->save();
        // dd($approvals);

        Alert::success('Successfully Returned')->persistent('Dismiss');
        return back();
    }
}
