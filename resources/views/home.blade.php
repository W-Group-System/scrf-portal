@extends('layouts.header')

@section('content')
    @if(auth()->user()->role == 'IT Personnel')
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-format-list-bulleted widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0">Total Projects</h5>
                                <h3 class="mt-3 mb-3">{{count($projects)}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-check widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0">Total SCRF Done</h5>
                                @php
                                    $total_done = 0;
        
                                    foreach ($projects as $project) {
                                        $total_done += count(($project->projectTask)->where('assigned_to', auth()->user()->id)->where('progress', 'Done'));
                                    }
                                @endphp
                                <h3 class="mt-3 mb-3">{{$total_done}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card widget-flat">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-exclamation-thick widget-icon"></i>
                                </div>
                                <h5 class="text-muted fw-normal mt-0">Total Delays</h5>
                                @php
                                    $total_delays = 0;
        
                                    foreach ($projects as $key => $project) {
                                        $total_delays += count(($project->projectTask)->where('date_needed' ,'<',now())->where('assigned_to', auth()->user()->id));
                                    }
                                @endphp
                                <h3 class="mt-3 mb-3">{{$total_delays}}</h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap">as of ({{date('F Y')}})</span>  
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        List of delay SCRF
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped tables">
                                <thead>
                                    <tr>
                                        <th>SCRF No</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        @php
                                            $scrf_delays = ($project->projectTask)->where('date_needed' ,'<',now())->where('assigned_to', auth()->user()->id);
                                        @endphp

                                        @foreach ($scrf_delays as $delay)
                                            <tr>
                                                <td>SYSDEV-{{str_pad($delay->id, 2,'0',STR_PAD_LEFT)}}</td>
                                                <td><span class="badge bg-danger">Delay</span></td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')
<script src="{{asset('js/home.js')}}"></script>
@endsection
