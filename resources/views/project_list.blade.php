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
    @foreach ($projects as $project)
        <div class="col-lg-6 col-xxl-3">
            <!-- project card -->
            <div class="card d-block">
                <div class="card-body">
                    <!-- project title-->
                    <h4 class="mt-0">
                        <p href="apps-projects-details.html" class="text-title">{{$project->project_name}} ({{$project->project_code}})</p>
                    </h4>
                    {{-- <div class="badge bg-success mb-3">Finished</div> --}}

                    <!-- project detail-->
                    <p class="mb-1">
                        <span class="pe-2 text-nowrap mb-2 d-inline-block">
                            <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                            <b>{{count($project->projectTask)}}</b> System Change Request
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
                    <a class="btn btn-primary" href="{{url('show-system-change-request/'.$project->id)}}">
                        <i class="dripicons-folder-open"></i>
                        Open
                    </a>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    @endforeach
</div>
@endsection