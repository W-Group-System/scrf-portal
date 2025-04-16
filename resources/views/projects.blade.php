@extends('layouts.header')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Projects</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    {{-- <div class="row">
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-format-list-bulleted widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0">Projects</h5>
                    <h3>{{count($projects)}}</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                    </p>
                </div> <!-- end card-body-->
            </div>
        </div>
    </div> --}}

    @if(auth()->user()->role == 'IT Department Head')
        <div class="row">
            <div class="col-lg-6">
                <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#new">
                    <i class="uil-plus"></i>
                    New
                </button>
            </div>
            <div class="col-lg-6">
                
            </div>
        </div>
    @endif
    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @include('components.error')
                    <div class="table-responsive">
                        <table class="tables table w-100 nowrap table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Action</th>
                                    <th>Project Code</th>
                                    <th>Project Name</th>
                                    <th>Department</th>
                                    <th>Members</th>
                                    <th>Created By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>
                                            @if(auth()->user()->role == 'IT Department Head')
                                                <button title="Edit" class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#edit{{$project->id}}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            @endif
                                            <a href="{{url('show_project/'.$project->id)}}" title="View" class="btn btn-sm btn-info">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{$project->project_code}}</td>
                                        <td>{{$project->project_name}}</td>
                                        <td>{{$project->department->name}}</td>
                                        <td>
                                            @foreach ($project->projectMembers as $members)
                                                <small>{{$members->user->name}}</small> <br>
                                            @endforeach
                                        </td>
                                        <td>{{$project->user->name}}</td>
                                    </tr>

                                    @include('edit_project')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row mt-3">
        @foreach ($projects as $project)
            <div class="col-lg-6 col-xxl-3">
                <!-- project card -->
                <div class="card d-block">
                    <div class="card-body">
                        <div class="dropdown card-widgets">
                            <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="dripicons-dots-3"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$project->id}}"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline me-1"></i>Invite</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app me-1"></i>Leave</a> --}}
                            </div>
                        </div>
                        <!-- project title-->
                        <h4 class="mt-0">
                            <p href="apps-projects-details.html" class="text-title">{{$project->project_name}} ({{$project->project_code}})</p>
                        </h4>
                        {{-- <div class="badge bg-success mb-3">Finished</div> --}}
    
                        <!-- project detail-->
                        <p class="mb-1">
                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                <b>{{count($project->projectTask->where('status', 'Approved'))}}</b> System Change Request
                            </span>
                            <span class="text-nowrap mb-2 d-inline-block">
                                <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                @php
                                    $total_comments = 0;
                                    foreach ($project->projectTask as $task) {
                                        $total_comments += count($task->comments);
                                    }
                                @endphp
                                <b>{{$total_comments}}</b> Comments
                            </span>
                        </p>
                        <div id="tooltip-container">
                            @foreach ($project->projectMembers->take(3) as $member)
                                <a href="javascript:void(0);" data-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$member->user->name}}" class="d-inline-block">
                                    @if($member->user->profile_picture == null)
                                    <img src="{{asset('img/user.png')}}" class="rounded-circle avatar-xs" alt="friend">
                                    @else
                                    <img src="{{$member->user->profile_picture}}" class="rounded-circle avatar-xs" alt="friend">
                                    @endif
                                </a>
                            @endforeach
                            @if(count($project->projectMembers) > 3)
                                <a href="javascript:void(0);" class="d-inline-block text-muted fw-bold ms-2">
                                    +{{$project->projectMembers->count() - 3}} more
                                </a>
                            @endif
                        </div>
                    </div> <!-- end card-body-->
                    <div class="card-footer d-flex justify-content-end">
                        <a class="btn btn-primary" href="{{url('show_project/'.$project->id)}}">
                            <i class="dripicons-folder-open"></i>
                            Open
                        </a>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->

            @include('edit_project')
        @endforeach
    </div>

    @include('new_project')
@endsection

@section('js')
    <script src="{{asset('js/project.js')}}"></script>
@endsection