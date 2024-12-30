@extends('layouts.header')

@section('content')
    <!-- start page title -->
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
                            <h3>{{count($project_tasks)}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Cancelled</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($project_tasks->where('status','Cancelled'))}}</h3>
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
                    <p class="m-0 text-white">System Change Request
                        <button class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#new">
                            <i class="uil-plus"></i>
                            New
                        </button>
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tables table w-100 nowrap table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Action</th>
                                    {{-- <th>System Change No.</th> --}}
                                    <th>Project</th>
                                    <th>Type of Request</th>
                                    <th>Priority</th>
                                    <th>Date Needed</th>
                                    <th>Activity Task</th>
                                    <th>Reason for changes</th>
                                    <th>Goals</th>
                                    <th>Requestor</th>
                                    {{-- <th>Immediate Head Requestor</th> --}}
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project_tasks as $project_task)
                                    <tr>
                                        <td>
                                            @if($project_task->status == 'Pending')
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$project_task->id}}">
                                                <i class="fa fa-pen-to-square text-white"></i>
                                            </button>

                                            <form method="POST" action="{{url('cancel-system-change-request/'.$project_task->id)}}" class="d-inline" id="cancelScrfForm{{$project_task->id}}" onsubmit="show()">
                                                @csrf

                                                <button type="button" class="btn btn-sm btn-danger" onclick="cancelScrf({{$project_task->id}})">
                                                    <i class="fa fa-ban text-white"></i>
                                                </button>
                                            </form>
                                            @endif

                                            @if($project_task->status != 'Cancelled')
                                            <a href="{{url('print-system-change-request/'.$project_task->id)}}" class="btn btn-sm btn-info" target="_blank">
                                                <i class="fa fa-print text-white"></i>
                                            </a>
                                            @endif
                                        </td>
                                        {{-- <td>SCRF {{str_pad($project_task->id, '2', 0, STR_PAD_LEFT)}}</td> --}}
                                        <td>{{$project_task->project->project_name}}</td>
                                        <td>{{$project_task->type_of_request}}</td>
                                        <td>{{$project_task->priority}}</td>
                                        <td>{{date('M d Y', strtotime($project_task->date_needed))}}</td>
                                        <td>{!! nl2br(e($project_task->activity_task)) !!}</td>
                                        <td>{!! nl2br(e($project_task->reason_for_changes)) !!}</td>
                                        <td>{!! nl2br(e($project_task->goal)) !!}</td>
                                        <td>{{$project_task->user->name}}</td>
                                        {{-- <td>{{$project_task->project->department->head->name}}</td> --}}
                                        <td>
                                            @if($project_task->status == 'Pending')
                                                <span class="badge bg-warning">
                                            @elseif($project_task->status == 'Approved')
                                                <span class="badge bg-success">
                                            @elseif($project_task->status == 'Rejected' || $project_task->status == 'Cancelled')
                                                <span class="badge bg-danger">
                                            @endif
                                                {{$project_task->status}}
                                            </span>
                                        </td>
                                    </tr>

                                    @include('edit_system_change_request')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('new_system_change_request')
@endsection

@section('js')
<script src="{{asset('js/system_change_request.js')}}"></script>
@endsection