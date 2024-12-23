@extends('layouts.header')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">System Change Request</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-3">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary">
                <h5 class="text-white fw-normal m-0 text-truncate">System Change Request</h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        {{-- <h3>{{count($project_tasks)}}</h3> --}}
                    </div>
                </div> 
            </div> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card border border-1 border-primary">
            <div class="card-header bg-primary">
                <p class="m-0 text-white">For Approval</p>
                {{-- <button class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#new">
                    <i class="uil-plus"></i>
                    New
                </button> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="tables table w-100 nowrap table-sm">
                        <thead class="table-light">
                            <tr>
                                <th>Action</th>
                                <th>System Change No.</th>
                                <th>Project</th>
                                <th>Type of Request</th>
                                <th>Date Needed</th>
                                <th>Activity Task</th>
                                <th>Reason for changes</th>
                                <th>Goals</th>
                                <th>Requestor</th>
                                <th>Immediate Head Requestor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project_tasks as $project_task)
                                <tr>
                                    <td>
                                        <form method="POST" action="{{url('reject-scrf/'.$project_task->id)}}" class="d-inline-block" id="rejectForm{{$project_task->id}}" onsubmit="show()">
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-danger" onclick="reject({{$project_task->id}})">
                                                <i class="fa-solid fa-x"></i>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{url('approve-scrf/'.$project_task->id)}}" class="d-inline-block" id="approveForm{{$project_task->id}}" onsubmit="show()">
                                            @csrf
                                            <button type="button" class="btn btn-sm btn-success" onclick="approve({{$project_task->id}})">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>SCRF {{str_pad($project_task->id, '2', 0, STR_PAD_LEFT)}}</td>
                                    <td>{{$project_task->project->project_name}}</td>
                                    <td>{{$project_task->type_of_request}}</td>
                                    <td>{{date('M d Y', strtotime($project_task->date_needed))}}</td>
                                    <td>{!! nl2br(e($project_task->activity_task)) !!}</td>
                                    <td>{!! nl2br(e($project_task->reason_for_changes)) !!}</td>
                                    <td>{!! nl2br(e($project_task->goal)) !!}</td>
                                    <td>{{$project_task->user->name}}</td>
                                    <td>{{$project_task->project->department->head->name}}</td>
                                </tr>

                                {{-- @include('edit_system_change_request') --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{asset('js/for_approval.js')}}"></script>
@endsection