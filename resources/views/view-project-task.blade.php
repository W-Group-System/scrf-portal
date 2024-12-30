@extends('layouts.header')

@section('css')
    <link rel="stylesheet" href="{{asset('css/glightbox.min.css')}}">
@endsection

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
                            @if(empty($project_task->assignedTo))
                            <p class="mb-0">No assigned</p>
                            @else
                            <img src="{{asset('img/user.png')}}" alt="Arya S" class="rounded-circle me-2" height="24">
                            <div>
                                <h5 class="mt-1 font-14">
                                    {{optional($project_task->assignedTo)->name}}
                                </h5>
                            </div>
                            @endif
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
                                    {{date('M. d Y', strtotime($project_task->date_needed))}}
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


                <h5 class="mt-3">Activity Task:</h5>

                <p class="text-muted mb-4">
                    {{$project_task->activity_task}}
                </p>

                <h5 class="mt-3">Reason for change:</h5>

                <p class="text-muted mb-4">
                    {{$project_task->reason_for_changes}}
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

                        <br>
                        @if($comment->commentImage->isNotEmpty())
                            @foreach ($comment->commentImage as $key=>$image)
                                <a href="{{url($image->file)}}" 
                                    class="glightbox" 
                                    data-type="image"
                                    data-effect="fade"
                                    data-width="900px"
                                    data-height="auto"
                                    >
                                    <img src="{{url($image->file)}}" alt="" style="max-width: 100px; max-height: 100px;" >
                                </a>
                            @endforeach
                        @endif
                        
                        <br>
                        <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-pencil"></i> Edit</a>
                        <a href="{{url('delete-comment/'.$comment->id)}}" class="text-muted font-13 d-inline-block mt-2" onclick="deleteComment({{$comment->id}})">
                            <i class="mdi mdi-delete"></i> 
                            Delete
                        </a>

                        <form action="{{url('delete-comment/'.$comment->id)}}" method="POST" class="d-inline-block" id="deleteCommentForm{{$comment->id}}" onsubmit="show()">
                            @csrf

                        </form>
                        
                    </div>
                </div>

                @include('edit_comment')
                @endforeach

                {{-- <div class="text-center mt-2">
                    <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading me-1"></i> Load more </a>
                </div> --}}

                <div class="border rounded mt-4">
                    <form action="{{url('comment')}}" class="comment-area-box" onsubmit="show()" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <input type="hidden" name="project_task_id" value="{{$project_task->id}}">
                        <textarea rows="3" name="comment" class="form-control border-0 resize-none" placeholder="Your comment..." required></textarea>
                        <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                            <div>
                                <input type="file" id="imageUpload" name="image_comment[]" accept="image/*" style="display: none;" onchange="previewImage(event)" multiple>

                                <a href="#" class="btn btn-sm px-1 btn-light" onclick="document.getElementById('imageUpload').click()"><i class='mdi mdi-upload'></i></a>
                                {{-- <a href="#" class="btn btn-sm px-1 btn-light"><i class='mdi mdi-at'></i></a> --}}
                            </div>
                            <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Submit</button>
                        </div>

                        <div id="previewContainer" class="mt-2" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>

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

                <div class="card my-1 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-sm">
                                    <span class="avatar-title rounded">
                                        PDF
                                    </span>
                                    
                                </div>
                            </div>
                            <div class="col ps-0">
                                <a href="{{url('print-system-change-request/'.$project_task->id)}}" class="text-muted fw-bold" target="_blank">System Change Request Form</a>
                                {{-- @php
                                    $size = $attachment->size;
                                    $size_display = $size / 1048576;
                                @endphp
                                <p class="mb-0">{{number_format($size_display,2)}} MB</p> --}}
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

@section('js')
<script src="{{asset('js/glightbox.min.js')}}"></script>
<script>
    function previewImage(event) {
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('imagePreview');
        const files = event.target.files;
        previewContainer.innerHTML = '';
        
        if (files.length > 0) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Image Preview';
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    img.style.objectFit = 'cover';
                    img.style.border = '1px solid #ddd';
                    img.style.padding = '5px';
                    img.style.borderRadius = '5px';

                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            });
        }
    }

    function deleteComment(id) {
        event.preventDefault();

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this comment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#deleteCommentForm'+id).submit();
            }
        });
    }

    const lightbox = GLightbox({
        closeButton: true
    });
</script>
@endsection