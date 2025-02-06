@extends('layouts.header')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">For Approval</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-3">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-progress-clock widget-icon"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0">Pending</h5>
                <h3 class="mt-3 mb-3">{{count([])}}</h3>
                <p class="mb-0 text-muted">
                    <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                </p>
            </div> <!-- end card-body-->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <p class="m-0 fw-bold">For Approval</p>
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
                                {{-- <th>Activity Task</th> --}}
                                {{-- <th>Reason for changes</th> --}}
                                {{-- <th>Goals</th> --}}
                                <th>Requestor</th>
                                <th>Immediate Head Requestor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project_tasks as $project_task)
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#view{{$project_task->id}}">
                                            <i class="uil-eye"></i>
                                        </button>

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
                                    {{-- <td>{!! nl2br(e($project_task->activity_task)) !!}</td> --}}
                                    {{-- <td>{!! nl2br(e($project_task->reason_for_changes)) !!}</td> --}}
                                    {{-- <td>{!! nl2br(e($project_task->goal)) !!}</td> --}}
                                    <td>{{$project_task->user->name}}</td>
                                    <td>{{$project_task->project->department->head->name}}</td>
                                </tr>

                                {{-- @include('edit_system_change_request') --}}
                                @include('view_scrf_details')
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