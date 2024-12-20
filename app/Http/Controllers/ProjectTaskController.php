<?php

namespace App\Http\Controllers;

use App\ProjectAttachment;
use App\ProjectTask;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $project_task = new ProjectTask;
        $project_task->project_id = $request->project_id;
        $project_task->board_column_id = 1;
        $project_task->title = $request->title;
        $project_task->priority = $request->priority;
        $project_task->description = $request->description;
        $project_task->assigned_to = $request->assigned_to;
        $project_task->due_date = $request->due_date;
        $project_task->reporter = auth()->user()->id;
        $project_task->save();

        $files = $request->file('file');
        foreach($files as $file)
        {
            $name = time().'-'.$file->getClientOriginalName();
            $size = $file->getSize();
            $file->move(public_path('project_attachments'),$name);
            $file_name = '/project_attachments/'.$name;

            $project_attachment = new ProjectAttachment;
            $project_attachment->project_task_id =  $project_task->id;
            $project_attachment->attachment = $file_name;
            $project_attachment->file_name = $name;
            $project_attachment->size = $size;
            $project_attachment->save();
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
        $project_task = ProjectTask::with('assignedTo')->findOrFail($id);

        return view('view-project-task',compact('project_task'));
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
        // dd($request->all(),$id);
        $project_task = ProjectTask::findOrFail($id);
        // $project_task->project_id = $request->project_id;
        // $project_task->board_column_id = 1;
        $project_task->title = $request->title;
        $project_task->priority = $request->priority;
        $project_task->description = $request->description;
        $project_task->assigned_to = $request->assigned_to;
        $project_task->due_date = $request->due_date;
        // $project_task->reporter = auth()->user()->id;
        $project_task->save();
        
        if ($request->hasFile('file'))
        {
            $files = $request->file('file');
            foreach($files as $file)
            {
                $name = time().'-'.$file->getClientOriginalName();
                $size = $file->getSize();
                $file->move(public_path('project_attachments'),$name);
                $file_name = '/project_attachments/'.$name;

                $project_attachment = new ProjectAttachment;
                $project_attachment->project_task_id =  $project_task->id;
                $project_attachment->attachment = $file_name;
                $project_attachment->file_name = $name;
                $project_attachment->size = $size;
                $project_attachment->save();
            }
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
