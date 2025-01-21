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

    <div class="row">
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
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if(auth()->user()->role == 'IT Department Head')
                    <div class="card-header">
                        <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#new">
                            <i class="uil-plus"></i>
                            New
                        </button>
                    </div>
                @endif
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
    </div>

    @include('new_project')
@endsection

@section('js')
    <script src="{{asset('js/project.js')}}"></script>
@endsection