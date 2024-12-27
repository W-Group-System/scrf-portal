@extends('layouts.header')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- @if(request()->is('show_project/'.$project->id))
                        <li class="breadcrumb-item"><a href="{{url('projects')}}">Project</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                    @endif --}}
                    {{-- <li class="breadcrumb-item active">Task Detail</li> --}}
                </ol>
            </div>
            <h4 class="page-title">Task Detail</h4>
        </div>
    </div>
</div>     

<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="{{url('projects')}}" class="btn btn-sm btn-danger">
                Close
            </a>
            {{-- <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                Add Board Column
            </button> --}}
            {{-- <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#newTask">
                Add Task
            </button> --}}
        </div>
        <div class="board">
            <div class="tasks" data-plugin="dragula"
                data-containers='["task-list-one", "task-list-two", "task-list-three", "task-list-four","task-list-five"]'>
                <h5 class="mt-0 task-header">TODO ({{count($project_task->where('status','Approved')->where('progress','Todo'))}})</h5>

                <div id="task-list-one" class="task-list-items" data-progress="Todo">

                    @foreach ($project_task->where('status','Approved')->where('progress','Todo') as $task)
                    <!-- Task Item -->
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-end text-muted">{{date('d M Y', strtotime($task->created_at))}}</small>
                                @if($task->priority == 'High')
                                    <span class="badge bg-danger">{{$task->priority}}</span>
                                @elseif($task->priority == 'Medium')
                                    <span class="badge bg-warning">{{$task->priority}}</span>
                                @elseif($task->priority == 'Low')
                                    <span class="badge bg-success">{{$task->priority}}</span>
                                @endif

                                <h5 class="mt-2 mb-2">
                                    <a href="{{url('show-project-task/'.$task->id)}}"
                                        class="text-body" data-id="{{$task->id}}">{{$task->project_name}}</a>
                                </h5>

                                <p class="mb-0">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-briefcase-outline text-muted"></i>
                                        {{$task->project->project_name}}
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b>{{count($task->comments)}}</b> Comments
                                    </span>
                                </p>
                                
                                @if(empty($task->assigned_to))
                                    <p class="mb-0">No assigned</p>
                                @else
                                    <p class="mb-0">
                                        <img src="{{asset('img/user.png')}}" alt="user-img"
                                            class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">{{$task->assignedTo->name}}</span>
                                    </p>
                                @endif

                                {{-- @if(auth()->user()->role == 'IT Department Head') --}}
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTask{{$task->id}}"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            {{-- <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a> --}}
                                        </div>
                                    </div>
                                {{-- @endif --}}
                            </div> <!-- end card-body -->
                        </div>
                    @endforeach
                    <!-- Task Item End -->

                </div> <!-- end company-list-1-->
            </div>

            <div class="tasks">
                <h5 class="mt-0 task-header text-uppercase">In Progress ({{count($project_task->where('status','Approved')->where('progress','In Progress'))}})</h5>

                <div id="task-list-two" class="task-list-items" data-progress="In Progress">

                    @foreach ($project_task->where('status','Approved')->where('progress','In Progress') as $task)
                    <!-- Task Item -->
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-end text-muted">{{date('d M Y', strtotime($task->created_at))}}</small>
                                @if($task->priority == 'High')
                                    <span class="badge bg-danger">{{$task->priority}}</span>
                                @elseif($task->priority == 'Medium')
                                    <span class="badge bg-warning">{{$task->priority}}</span>
                                @elseif($task->priority == 'Low')
                                    <span class="badge bg-success">{{$task->priority}}</span>
                                @endif

                                <h5 class="mt-2 mb-2">
                                    <a href="{{url('show-project-task/'.$task->id)}}"
                                        class="text-body" data-id="{{$task->id}}">{{$task->project_name}}</a>
                                </h5>

                                <p class="mb-0">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-briefcase-outline text-muted"></i>
                                        {{$task->project->project_name}}
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b>{{count($task->comments)}}</b> Comments
                                    </span>
                                </p>

                                @if(empty($task->assigned_to))
                                <p class="mb-0">No assigned</p>
                                @else
                                <p class="mb-0">
                                    <img src="{{asset('img/user.png')}}" alt="user-img"
                                        class="avatar-xs rounded-circle me-1">
                                    <span class="align-middle">{{$task->assignedTo->name}}</span>
                                </p>
                                @endif

                                {{-- @if(auth()->user()->role == 'IT Department Head') --}}
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTask{{$task->id}}"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            {{-- <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a> --}}
                                        </div>
                                    </div>
                                {{-- @endif --}}
                            </div> <!-- end card-body -->
                        </div>
                    @endforeach
                    <!-- Task Item End -->

                </div> <!-- end company-list-2-->
            </div>

            <div class="tasks">
                <h5 class="mt-0 task-header text-uppercase">QA ({{count($project_task->where('status','Approved')->where('progress','QA'))}})</h5>

                <div id="task-list-three" class="task-list-items" data-progress="QA">

                    @foreach ($project_task->where('status','Approved')->where('progress','QA') as $task)
                    <!-- Task Item -->
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-end text-muted">{{date('d M Y', strtotime($task->created_at))}}</small>
                                @if($task->priority == 'High')
                                    <span class="badge bg-danger">{{$task->priority}}</span>
                                @elseif($task->priority == 'Medium')
                                    <span class="badge bg-warning">{{$task->priority}}</span>
                                @elseif($task->priority == 'Low')
                                    <span class="badge bg-success">{{$task->priority}}</span>
                                @endif

                                <h5 class="mt-2 mb-2">
                                    <a href="{{url('show-project-task/'.$task->id)}}"
                                        class="text-body" data-id="{{$task->id}}">{{$task->project_name}}</a>
                                </h5>

                                <p class="mb-0">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-briefcase-outline text-muted"></i>
                                        {{$task->project->project_name}}
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b>{{count($task->comments)}}</b> Comments
                                    </span>
                                </p>

                                @if(empty($task->assigned_to))
                                <p class="mb-0">No assigned</p>
                                @else
                                <p class="mb-0">
                                    <img src="{{asset('img/user.png')}}" alt="user-img"
                                        class="avatar-xs rounded-circle me-1">
                                    <span class="align-middle">{{$task->assignedTo->name}}</span>
                                </p>
                                @endif

                                {{-- @if(auth()->user()->role == 'IT Department Head') --}}
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTask{{$task->id}}"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            {{-- <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a> --}}
                                        </div>
                                    </div>
                                {{-- @endif --}}
                            </div> <!-- end card-body -->
                        </div>
                    @endforeach
                    <!-- Task Item End -->

                </div> <!-- end company-list-2-->
            </div>

            <div class="tasks">
                <h5 class="mt-0 task-header text-uppercase">Failed ({{count($project_task->where('status','Approved')->where('progress','Failed'))}})</h5>

                <div id="task-list-four" class="task-list-items" data-progress="Failed">

                    @foreach ($project_task->where('status','Approved')->where('progress','Failed') as $task)
                    <!-- Task Item -->
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-end text-muted">{{date('d M Y', strtotime($task->created_at))}}</small>
                                @if($task->priority == 'High')
                                    <span class="badge bg-danger">{{$task->priority}}</span>
                                @elseif($task->priority == 'Medium')
                                    <span class="badge bg-warning">{{$task->priority}}</span>
                                @elseif($task->priority == 'Low')
                                    <span class="badge bg-success">{{$task->priority}}</span>
                                @endif

                                <h5 class="mt-2 mb-2">
                                    <a href="{{url('show-project-task/'.$task->id)}}"
                                        class="text-body" data-id="{{$task->id}}">{{$task->project_name}}</a>
                                </h5>

                                <p class="mb-0">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-briefcase-outline text-muted"></i>
                                        {{$task->project->project_name}}
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b>{{count($task->comments)}}</b> Comments
                                    </span>
                                </p>

                                @if(empty($task->assigned_to))
                                <p class="mb-0">No assigned</p>
                                @else
                                <p class="mb-0">
                                    <img src="{{asset('img/user.png')}}" alt="user-img"
                                        class="avatar-xs rounded-circle me-1">
                                    <span class="align-middle">{{$task->assignedTo->name}}</span>
                                </p>
                                @endif

                                {{-- @if(auth()->user()->role == 'IT Department Head') --}}
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTask{{$task->id}}"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            {{-- <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a> --}}
                                        </div>
                                    </div>
                                {{-- @endif --}}
                            </div> <!-- end card-body -->
                        </div>
                    @endforeach
                    <!-- Task Item End -->

                </div> <!-- end company-list-2-->
            </div>

            <div class="tasks">
                <h5 class="mt-0 task-header text-uppercase">Done ({{count($project_task->where('status','Approved')->where('progress','Done'))}})</h5>

                <div id="task-list-five" class="task-list-items" data-progress="Done">

                    @foreach ($project_task->where('status','Approved')->where('progress','Done') as $task)
                    <!-- Task Item -->
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-end text-muted">{{date('d M Y', strtotime($task->created_at))}}</small>
                                @if($task->priority == 'High')
                                    <span class="badge bg-danger">{{$task->priority}}</span>
                                @elseif($task->priority == 'Medium')
                                    <span class="badge bg-warning">{{$task->priority}}</span>
                                @elseif($task->priority == 'Low')
                                    <span class="badge bg-success">{{$task->priority}}</span>
                                @endif

                                <h5 class="mt-2 mb-2">
                                    <a href="{{url('show-project-task/'.$task->id)}}"
                                        class="text-body" data-id="{{$task->id}}">{{$task->project_name}}</a>
                                </h5>

                                <p class="mb-0">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-briefcase-outline text-muted"></i>
                                        {{$task->project->project_name}}
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b>{{count($task->comments)}}</b> Comments
                                    </span>
                                </p>

                                @if(empty($task->assigned_to))
                                <p class="mb-0">No assigned</p>
                                @else
                                <p class="mb-0">
                                    <img src="{{asset('img/user.png')}}" alt="user-img"
                                        class="avatar-xs rounded-circle me-1">
                                    <span class="align-middle">{{$task->assignedTo->name}}</span>
                                </p>
                                @endif

                                {{-- @if(auth()->user()->role == 'IT Department Head') --}}
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical font-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTask{{$task->id}}"><i class="mdi mdi-pencil me-1"></i>Edit</a>
                                            {{-- <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete me-1"></i>Delete</a> --}}
                                        </div>
                                    </div>
                                {{-- @endif --}}
                            </div> <!-- end card-body -->
                        </div>
                    @endforeach
                    <!-- Task Item End -->

                </div> <!-- end company-list-2-->
            </div>

            {{-- @php
                $containerIds = ($project->boardColumn)->pluck('id')->map(function ($id) {
                    return "task-list-$id";
                })->toArray();
            @endphp
            
            @foreach ($project->boardColumn as $key=>$board_column)
                <div class="tasks" data-plugin="dragula" @if($key == 0) data-containers='@json($containerIds)' @endif>
                    <h5 class="mt-0 task-header">{{$board_column->column}} (0)
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical font-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$board_column->id}}">
                                    <i class="mdi mdi-pencil me-1"></i>Edit
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item" onclick="deleteBoardColumn({{$board_column->id}})"><i
                                        class="mdi mdi-delete me-1"></i>Delete</a>

                                <form id="delete-column{{$board_column->id}}" action="{{ url('delete-column/'.$board_column->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </h5>

                    <div id="task-list-{{$board_column->id}}" class="task-list-items">
                        <!-- Task Item -->
                        @foreach ($board_column->projectTask->where('status','Approved') as $task)
                            <div class="card mb-0">
                                <div class="card-body p-3">
                                    <small class="float-end text-muted">{{date('d M Y', strtotime($task->created_at))}}</small>

                                    @if($task->priority == 'High')
                                        <span class="badge bg-danger">High</span>
                                    @elseif($task->priority == 'Medium')
                                        <span class="badge bg-warning">Medium</span>
                                    @elseif($task->priority == 'Low')
                                        <span class="badge bg-success">Low</span>
                                    @endif

                                    <h5 class="mt-2 mb-2">
                                        <a href="{{url('show-project-task/'.$task->id)}}"
                                            class="text-body">{{$task->activity_task}}</a>
                                    </h5>

                                    <p class="mb-0">
                                        <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>{{count($task->comments)}}</b> Comments
                                        </span>
                                    </p>

                                    @if(auth()->user()->role == 'IT Department Head')
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-18"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal"data-bs-target="#editTask{{$task->id}}"><i
                                                        class="mdi mdi-pencil me-1"></i>Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i
                                                        class="mdi mdi-delete me-1"></i>Delete</a>
                                            </div>
                                        </div>
                                    @endif

                                    <p class="mb-0">
                                        <img src="{{asset('img/user.png')}}" alt="user-img"
                                            class="avatar-xs rounded-circle me-1">
                                        <span class="align-middle">{{optional($task->assignedTo)->name}}</span>
                                    </p>
                                </div> <!-- end card-body -->
                            </div>

                        @endforeach
                        <!-- Task Item End -->

                    </div> <!-- end company-list-1-->
                </div>
            @endforeach --}}

        </div> <!-- end .board-->
    </div> <!-- end col -->
</div>

{{-- @include('new_board_column')
@include('new_task') --}}

{{-- @foreach ($project->boardColumn as $board_column)
    @include('edit_board_column')   

    @endforeach --}}
@foreach ($project_task as $task)
    @include('edit_task')    
@endforeach

@endsection

@section('js')
<script src="{{asset('assets/js/vendor/dragula.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/ui/component.dragula.js')}}"></script> --}}
{{-- <script src="{{asset('js/board.js')}}"></script> --}}
<script>

$(document).ready(function() {
    $('.chosen-select').chosen()

    var drake = dragula([
        document.getElementById('task-list-one'),
        document.getElementById('task-list-two'),
        document.getElementById('task-list-three'),
        document.getElementById('task-list-four'),
        document.getElementById('task-list-five')
    ])
    
    drake.on('drop', function(el, target, source, sibling) {
        let taskId = $(el).find('a').attr('data-id');
        let newProgress = $(target).attr('data-progress'); 
        
        $.ajax({
            url: "{{url('update-task-progress')}}/" + taskId,
            type: 'POST',
            data: {
                _token: "{{csrf_token()}}",
                progress: newProgress,
                id: taskId
            },
            beforeSend: function() {
                show()
            },
            success: function(response) {
                if (response.error)
                {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message
                    }).then((result) => {
                        if (result.isConfirmed)  
                        {
                            location.reload()
                        }
                    })
                }
                else
                {
                    location.reload()
                }
            }
        })
    })
})
</script>
@endsection