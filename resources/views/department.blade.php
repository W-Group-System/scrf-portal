@extends('layouts.header')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Departments</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Departments</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($departments)}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Active Departments</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($departments->where('status','Active'))}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Inactive Departments</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($departments->where('status','Inactive'))}}</h3>
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
                    @include('components.error')
                    <div class="table-responsive">
                        <table class="tables table w-100 nowrap table-sm">
                            <thead class="table-light">
                                <tr>
                                    <th>Action</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Head</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>
                                            <button title="Edit" class="btn btn-sm btn-warning text-light" data-bs-toggle="modal" data-bs-target="#edit{{$department->id}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            
                                            @if($department->status == 'Active')
                                                <form method="POST" action="{{url('deactivate_department/'.$department->id)}}" onsubmit="show()" id="deactivateForm{{$department->id}}" class="d-inline-block">
                                                    @csrf

                                                    <button type="button" title="Deactivate" class="btn btn-sm btn-danger" value="Deactivate" onclick="status(this.value, {{$department->id}})">
                                                        <i class="fa-solid fa-ban"></i>
                                                    </button>
                                                </form>
                                            @elseif($department->status == 'Inactive')
                                                <form method="POST" action="{{url('activate_department/'.$department->id)}}" onsubmit="show()" id="activateForm{{$department->id}}" class="d-inline-block">
                                                    @csrf

                                                    <button type="button" title="Activate" class="btn btn-sm btn-info" value="Activate" onclick="status(this.value, {{$department->id}})">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>{{$department->code}}</td>
                                        <td>{{$department->name}}</td>
                                        <td>{{optional($department->head)->name}}</td>
                                        <td>
                                            @if($department->status == 'Active')
                                            <div class="badge bg-success">Active</div>
                                            @else
                                            <div class="badge bg-danger">Inactive</div>
                                            @endif
                                        </td>
                                    </tr>

                                    @include('edit_department')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('new_department')
@endsection

@section('js')
    <script src="{{asset('js/department.js')}}"></script>
@endsection