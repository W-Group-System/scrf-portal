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
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">User</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($users)}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Active User</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($users->where('status',null))}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Inactive User</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($users->where('status','Inactive'))}}</h3>
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
                    <button class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#new">
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