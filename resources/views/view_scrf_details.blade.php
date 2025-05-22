@component('components.modal', [
    'modal_title' => 'View request', 
    'modal_id' => 'view'.$project_task->id, 
    'url' => url('update-system-change-request/'.$project_task->id), 
    'submit_btn_name' => 'Update',
    'view' => true
    ])
    
    <dl class="row">
        <dt class="col-sm-3">
            SCRF No. :
        </dt>
        <dd class="col-sm-9">
            SCRF {{str_pad($project_task->id, '2', 0, STR_PAD_LEFT)}}
        </dd>
        <dt class="col-sm-3">
            Project :
        </dt>
        <dd class="col-sm-9">
            {{$project_task->project->project_name}}
        </dd>
        <dt class="col-sm-3">
            Type of Request :
        </dt>
        <dd class="col-sm-9">
            {{$project_task->type_of_request}}
        </dd>
        <dt class="col-sm-3">
            Date Needed :
        </dt>
        <dd class="col-sm-9">
            {{date('M d Y', strtotime($project_task->date_needed))}}
        </dd>
        <dt class="col-sm-3">
            Activity Task :
        </dt>
        <dd class="col-sm-9">
            {!! nl2br(e($project_task->activity_task)) !!}
        </dd>
        <dt class="col-sm-3">
            Reason for changes :
        </dt>
        <dd class="col-sm-9">
            {!! nl2br(e($project_task->reason_for_changes)) !!}
        </dd>
        <dt class="col-sm-3">
            Goals :
        </dt>
        <dd class="col-sm-9">
            {!! nl2br(e($project_task->goal)) !!}
        </dd>
        <dt class="col-sm-3">
            View Attachments :
        </dt>
        <dd class="col-sm-9">
            @foreach ($project_task->project_task_attachment as $attachment)
                <a href="{{url($attachment->file)}}" class="btn btn-sm btn-danger mb-1" target="_blank">
                    View Attachments
                </a>
                <br>
            @endforeach
        </dd>
    </dl>
@endcomponent