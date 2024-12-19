@extends('layouts.header')

@section('content')
<div class="row">
    <div class="col-12 mt-3">
        <div class="mb-3">
            <a href="{{url('projects')}}" class="btn btn-sm btn-danger">
                Close
            </a>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#new">
                Add Board Column
            </button>
            <button class="btn btn-sm btn-success">
                Add Task
            </button>
        </div>
        <div class="board">
            {{-- <div class="tasks" data-plugin="dragula"
                data-containers='["task-list-one", "task-list-two", "task-list-three", "task-list-four"]'>
                <h5 class="mt-0 task-header">TODO (3)</h5>

                <div id="task-list-one" class="task-list-items">

                    <!-- Task Item -->
                    <div class="card mb-0">
                        <div class="card-body p-3">
                            <small class="float-end text-muted">18 Jul 2018</small>
                            <span class="badge bg-danger">High</span>

                            <h5 class="mt-2 mb-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal"
                                    class="text-body">iOS App home page</a>
                            </h5>

                            <p class="mb-0">
                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                    <i class="mdi mdi-briefcase-outline text-muted"></i>
                                    iOS
                                </span>
                                <span class="text-nowrap mb-2 d-inline-block">
                                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                    <b>74</b> Comments
                                </span>
                            </p>

                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-pencil me-1"></i>Edit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-delete me-1"></i>Delete</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                </div>
                            </div>

                            <p class="mb-0">
                                <img src="assets/images/users/avatar-2.jpg" alt="user-img"
                                    class="avatar-xs rounded-circle me-1">
                                <span class="align-middle">Robert Carlile</span>
                            </p>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- Task Item End -->

                </div> <!-- end company-list-1-->
            </div> --}}

            {{-- <div class="tasks">
                <h5 class="mt-0 task-header text-uppercase">In Progress (2)</h5>

                <div id="task-list-two" class="task-list-items">

                    <!-- Task Item -->
                    <div class="card mb-0">
                        <div class="card-body p-3">
                            <small class="float-end text-muted">22 Jun 2018</small>
                            <span class="badge bg-secondary text-light">Medium</span>

                            <h5 class="mt-2 mb-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal"
                                    class="text-body">Write a release note</a>
                            </h5>

                            <p class="mb-0">
                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                    <i class="mdi mdi-briefcase-outline text-muted"></i>
                                    Hyper
                                </span>
                                <span class="text-nowrap mb-2 d-inline-block">
                                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                    <b>17</b> Comments
                                </span>
                            </p>

                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-pencil me-1"></i>Edit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-delete me-1"></i>Delete</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                </div>
                            </div>

                            <p class="mb-0">
                                <img src="assets/images/users/avatar-5.jpg" alt="user-img"
                                    class="avatar-xs rounded-circle me-1">
                                <span class="align-middle">Sean White</span>
                            </p>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- Task Item End -->

                    <!-- Task Item -->
                    <div class="card mb-0">
                        <div class="card-body p-3">
                            <small class="float-end text-muted">19 Jun 2018</small>
                            <span class="badge bg-success">Low</span>

                            <h5 class="mt-2 mb-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal"
                                    class="text-body">Enable analytics tracking</a>
                            </h5>

                            <p class="mb-0">
                                <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                    <i class="mdi mdi-briefcase-outline text-muted"></i>
                                    CRM
                                </span>
                                <span class="text-nowrap mb-2 d-inline-block">
                                    <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                    <b>48</b> Comments
                                </span>
                            </p>

                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-pencil me-1"></i>Edit</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-delete me-1"></i>Delete</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                </div>
                            </div>

                            <p class="mb-0">
                                <img src="assets/images/users/avatar-6.jpg" alt="user-img"
                                    class="avatar-xs rounded-circle me-1">
                                <span class="align-middle">Louis Allen</span>
                            </p>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- Task Item End -->

                </div> <!-- end company-list-2-->
            </div> --}}
            
            @foreach ($project->boardColumn as $board_column)
                <div class="tasks" data-plugin="dragula" data-containers='["task-list-one", "task-list-two", "task-list-three", "task-list-four"]'>
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

                    <div id="task-list-one" class="task-list-items">

                        <!-- Task Item -->
                        {{-- <div class="card mb-0">
                            <div class="card-body p-3">
                                <small class="float-end text-muted">18 Jul 2018</small>
                                <span class="badge bg-danger">High</span>

                                <h5 class="mt-2 mb-2">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal"
                                        class="text-body">iOS App home page</a>
                                </h5>

                                <p class="mb-0">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-briefcase-outline text-muted"></i>
                                        iOS
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b>74</b> Comments
                                    </span>
                                </p>

                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle text-muted arrow-none" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical font-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="mdi mdi-pencil me-1"></i>Edit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="mdi mdi-delete me-1"></i>Delete</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="mdi mdi-plus-circle-outline me-1"></i>Add People</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                class="mdi mdi-exit-to-app me-1"></i>Leave</a>
                                    </div>
                                </div>

                                <p class="mb-0">
                                    <img src="assets/images/users/avatar-2.jpg" alt="user-img"
                                        class="avatar-xs rounded-circle me-1">
                                    <span class="align-middle">Robert Carlile</span>
                                </p>
                            </div> <!-- end card-body -->
                        </div> --}}
                        <!-- Task Item End -->

                    </div> <!-- end company-list-1-->
                </div>

                @include('edit_board_column')
            @endforeach

        </div> <!-- end .board-->
    </div> <!-- end col -->
</div>

@include('new_board_column')
@endsection

@section('js')
<script src="{{asset('assets/js/vendor/dragula.min.js')}}"></script>
<script src="{{asset('assets/js/ui/component.dragula.js')}}"></script>
<script src="{{asset('js/board.js')}}"></script>
@endsection