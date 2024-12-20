@extends('layouts.header')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            {{-- <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tasks</a></li>
                    <li class="breadcrumb-item active">Task Detail</li>
                </ol>
            </div> --}}
            <h4 class="page-title">Task Detail</h4>
            <a href="{{url('show_project/'.$project_task->project->id)}}" class="btn btn-danger mb-2">
                Back
            </a>
        </div>
    </div>
</div>     
<!-- end page title --> 
<div class="row">
    <div class="col-xxl-8 col-xl-7">
        <!-- project card -->
        <div class="card d-block">
            <div class="card-body">
                {{-- <div class="dropdown card-widgets">
                    <a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='uil uil-ellipsis-h'></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class='uil uil-file-upload me-1'></i>Attachment
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class='uil uil-edit me-1'></i>Edit
                        </a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class='uil uil-file-copy-alt me-1'></i>Mark as Duplicate
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                            <i class='uil uil-trash-alt me-1'></i>Delete
                        </a>
                    </div> <!-- end dropdown menu-->
                </div> <!-- end dropdown--> --}}
                
                {{-- <div class="form-check float-start">
                    <input type="checkbox" class="form-check-input" id="completedCheck">
                    <label class="form-check-label" for="completedCheck">
                        Mark as completed
                    </label>
                </div> <!-- end form-check--> --}}
                
                <div class="clearfix"></div>

                <h3>{{$project_task->title}}</h3>

                <div class="row">
                    <div class="col-4">
                        <!-- assignee -->
                        <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Assigned To</p>
                        <div class="d-flex">
                            <img src="{{asset('img/user.png')}}" alt="Arya S" class="rounded-circle me-2" height="24">
                            <div>
                                <h5 class="mt-1 font-14">
                                    {{$project_task->assignedTo->name}}
                                </h5>
                            </div>
                        </div>
                        <!-- end assignee -->
                    </div> <!-- end col -->

                    <div class="col-4">
                        <!-- start due date -->
                        <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Due Date</p>
                        <div class="d-flex">
                            <i class='uil uil-schedule font-18 text-success me-1'></i>
                            <div>
                                <h5 class="mt-1 font-14">
                                    {{date('M. d Y', strtotime($project_task->due_date))}}
                                </h5>
                            </div>
                        </div>
                        <!-- end due date -->
                    </div> <!-- end col -->

                    <div class="col-4">
                        <!-- start due date -->
                        <p class="mt-2 mb-1 text-muted fw-bold font-12 text-uppercase">Project</p>
                        <div class="d-flex">
                            <i class='uil uil-briefcase font-18 text-primary me-1'></i>
                            <div>
                                <h5 class="mt-1 font-14">
                                    {{$project_task->project->project_name}}
                                </h5>
                            </div>
                        </div>
                        <!-- end due date -->
                    </div> <!-- end col -->
                </div> <!-- end row -->


                <h5 class="mt-3">Overview:</h5>

                <p class="text-muted mb-4">
                    {{$project_task->description}}
                </p>

                {{-- <!-- start sub tasks/checklists -->
                <h5 class="mt-4 mb-2 font-16">Checklists/Sub-tasks</h5>
                <div class="form-check mt-1">
                    <input type="checkbox" class="form-check-input" id="checklist1">
                    <label class="form-check-label strikethrough" for="checklist1">
                        Find out the old contract documents
                    </label>
                </div>
                
                <div class="form-check mt-1">
                    <input type="checkbox" class="form-check-input" id="checklist2">
                    <label class="form-check-label strikethrough" for="checklist2">
                        Organize meeting sales associates to understand need in detail
                    </label>
                </div>
                
                <div class="form-check mt-1">
                    <input type="checkbox" class="form-check-input" id="checklist3">
                    <label class="form-check-label strikethrough" for="checklist3">
                        Make sure to cover every small details
                    </label>
                </div>
                <!-- end sub tasks/checklists --> --}}

            </div> <!-- end card-body-->
            
        </div> <!-- end card-->

        <div class="card">
            <div class="card-header">
                <h4 class="my-1">Comments ({{count($project_task->comments)}})</h4>
            </div>
            <div class="card-body">
                
                <div class="d-flex">
                    {{-- <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                    <div class="w-100">
                        <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted float-end">5 hours ago</small></h5>
                        Nice work, makes me think of The Money Pit.

                        <br>
                        <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a>

                        <div class="d-flex mt-3">
                            <a class="pe-2" href="#">
                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt="Generic placeholder image" height="32">
                            </a>
                            <div class="w-100">
                                <h5 class="mt-0">Thelma Fridley <small class="text-muted float-end">3 hours ago</small></h5>
                                i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.

                                <br>
                                <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2">
                                    <i class="mdi mdi-reply"></i> Reply
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>

                @foreach ($project_task->comments->sortByDesc('id') as $comment)
                <div class="d-flex mt-3">
                    <img class="me-2 rounded-circle" src="{{asset('img/user.png')}}" alt="Generic placeholder image" height="32">
                    <div class="w-100">
                        <h5 class="mt-0">{{$comment->user->name}} <small class="text-muted float-end">{{$comment->created_at->diffForHumans()}}</small></h5>
                        {!! nl2br(e($comment->comment)) !!}

                        {{-- <br> --}}
                        {{-- <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> Reply</a> --}}
                    </div>
                </div>
                @endforeach

                {{-- <div class="text-center mt-2">
                    <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                </div> --}}

                <div class="border rounded mt-4">
                    <form action="{{url('comment')}}" class="comment-area-box" onsubmit="show()" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="project_task_id" value="{{$project_task->id}}">
                        <textarea rows="3" name="comment" class="form-control border-0 resize-none" placeholder="Your comment..."></textarea>
                        <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                            <div>
                                <a href="#" class="btn btn-sm px-1 btn-light"><i class='mdi mdi-upload'></i></a>
                                <a href="#" class="btn btn-sm px-1 btn-light"><i class='mdi mdi-at'></i></a>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Submit</button>
                        </div>
                    </form>
                </div> <!-- end .border-->

            </div> <!-- end card-body-->
        </div>
        <!-- end card-->
    </div> <!-- end col -->

    <div class="col-xxl-4 col-xl-5">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">Attachments</h5>

                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">
                    <div class="fallback">
                        <input name="file" type="file">
                    </div>

                    <div class="dz-message needsclick">
                        <i class="h3 text-muted dripicons-cloud-upload"></i>
                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </form>

                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>

                <!-- file preview template -->
                <div class="d-none" id="uploadPreviewTemplate">
                    <div class="card mt-1 mb-0 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <img data-dz-thumbnail="" src="#" class="avatar-sm rounded bg-light" alt="">
                                </div>
                                <div class="col ps-0">
                                    <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name=""></a>
                                    <p class="mb-0" data-dz-size=""></p>
                                </div>
                                <div class="col-auto">
                                    <!-- Button -->
                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                                        <i class="dripicons-cross"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end file preview template -->


                @foreach ($project_task->attachments as $attachment)
                    <div class="card my-1 shadow-none border">
                        <div class="p-2">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-sm">
                                        <span class="avatar-title rounded">
                                            {{ strtoupper(pathinfo($attachment->file_name, PATHINFO_EXTENSION)) }}
                                        </span>
                                        
                                    </div>
                                </div>
                                <div class="col ps-0">
                                    <a href="{{url($attachment->attachment)}}" class="text-muted fw-bold" target="_blank">{{$attachment->file_name}}</a>
                                    @php
                                        $size = $attachment->size;
                                        $size_display = $size / 1048576;
                                    @endphp
                                    <p class="mb-0">{{number_format($size_display,2)}} MB</p>
                                </div>
                                {{-- <div class="col-auto">
                                    <!-- Button -->
                                    <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                        <i class="dripicons-download"></i>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection