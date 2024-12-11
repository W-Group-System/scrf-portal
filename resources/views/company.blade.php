@extends('layouts.header')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Companies</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Companies</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($companies)}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Active Companies</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($companies->where('status','Active'))}}</h3>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card border border-1 border-primary">
                <div class="card-header bg-primary">
                    <h5 class="text-white fw-normal m-0 text-truncate">Inactive Companies</h5>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{count($companies->where('status','Inactive'))}}</h3>
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>
                                            <button title="Edit" class="btn btn-sm btn-warning text-light" data-bs-toggle="modal" data-bs-target="#edit{{$company->id}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            
                                            @if($company->status == 'Active')
                                                <form method="POST" action="{{url('deactivate_company/'.$company->id)}}" onsubmit="show()" id="deactivateForm{{$company->id}}" class="d-inline-block">
                                                    @csrf

                                                    <button type="button" title="Deactivate" class="btn btn-sm btn-danger" value="Deactivate" onclick="status(this.value, {{$company->id}})">
                                                        <i class="fa-solid fa-ban"></i>
                                                    </button>
                                                </form>
                                            @elseif($company->status == 'Inactive')
                                                <form method="POST" action="{{url('activate_company/'.$company->id)}}" onsubmit="show()" id="activateForm{{$company->id}}" class="d-inline-block">
                                                    @csrf

                                                    <button type="button" title="Activate" class="btn btn-sm btn-info" value="Activate" onclick="status(this.value, {{$company->id}})">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                        <td>{{$company->code}}</td>
                                        <td>{{$company->name}}</td>
                                        <td>
                                            @if($company->status == 'Active')
                                            <div class="badge bg-success">Active</div>
                                            @else
                                            <div class="badge bg-danger">Inactive</div>
                                            @endif
                                        </td>
                                    </tr>

                                    @include('edit_company')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('new_company')
@endsection

@section('js')
    <script src="{{asset('js/company.js')}}"></script>
@endsection