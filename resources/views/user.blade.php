@extends('layouts.header')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">User</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0">Users</h5>
                    <h3 class="mt-3 mb-3">{{count($users)}}</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                    </p>
                </div> <!-- end card-body-->
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-check widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0">Active Users</h5>
                    <h3 class="mt-3 mb-3">{{count($users->where('status',null))}}</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div>
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-cancel widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0">Inactive Users</h5>
                    <h3 class="mt-3 mb-3">{{count($users->where('status','Inactive'))}}</h3>
                    <p class="mb-0 text-muted">
                        <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                    </p>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#new">
                        <i class="uil-plus"></i>
                        New
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="tables table w-100 nowrap table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    <th>Role</th>
                                    <th>Immediate Supervisor</th>
                                    <th>Status</th>
                                </tr>   
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <button title="Edit" class="btn btn-sm btn-warning text-light" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}">
                                                {{-- <i class="mdi mdi-square-edit-outline"></i> --}}
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            
                                            @if($user->id != auth()->user()->id)
                                                @if($user->status == null)
                                                    <form method="POST" action="{{url('deactivate_user/'.$user->id)}}" onsubmit="show()" id="deactivateForm{{$user->id}}" class="d-inline-block">
                                                        @csrf

                                                        <button type="button" title="Deactivate" class="btn btn-sm btn-danger" value="Deactivate" onclick="status(this.value, {{$user->id}})">
                                                            <i class="fa-solid fa-ban"></i>
                                                        </button>
                                                    </form>
                                                @elseif($user->status == 'Inactive')
                                                    <form method="POST" action="{{url('activate_user/'.$user->id)}}" onsubmit="show()" id="activateForm{{$user->id}}" class="d-inline-block">
                                                        @csrf

                                                        <button type="button" title="Activate" class="btn btn-sm btn-info" value="Activate" onclick="status(this.value, {{$user->id}})">
                                                            <i class="fa-solid fa-check"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->company->name}}</td>
                                        <td>{{$user->department->name}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{optional($user->immediateSup)->name}}</td>
                                        <td>
                                            @if($user->status == null)
                                            <div class="badge bg-success">Active</div>
                                            @else
                                            <div class="badge bg-danger">Inactive</div>
                                            @endif
                                        </td>
                                    </tr>

                                    @include('edit_user')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('new_user');
@endsection

@section('js')
<script src="{{asset('js/user.js')}}"></script>
@endsection