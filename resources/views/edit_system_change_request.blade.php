@component('components.modal', ['modal_title' => 'Edit change request', 'modal_id' => 'edit'.$project_task->id, 'url' => url('update-system-change-request/'.$project_task->id), 'submit_btn_name' => 'Update'])
    {{-- <div class="form-group mb-1">
        Project
        <select data-placeholder="Select project" name="project" class="form-control chosen-select">
            <option value=""></option>
            @foreach ($projects as $key=>$project)
                <option value="{{$key}}" @if($project_task->project_id == $key) selected @endif>{{$project}}</option>
            @endforeach
        </select>
    </div> --}}
    <div class="form-group mb-1">
        Project name
        <input type="text" name="project_name" class="form-control form-control-sm" value="{{$project_task->project_name}}" required>
    </div>
    <div class="form-group mb-1">
        Type of Request
        <select data-placeholder="Select type of request" name="type_of_request" class="form-control chosen-select" required>
            <option value=""></option>
            <option value="Modification" @if($project_task->type_of_request == "Modification") selected @endif>Modification</option>
            <option value="New Report" @if($project_task->type_of_request == "New Report") selected @endif>New Report</option>
            <option value="New Functions" @if($project_task->type_of_request == "New Functions") selected @endif>New Functions</option>
        </select>
    </div>
    <div class="form-group mb-1">
        Date Needed
        <input type="date" name="date_needed" class="form-control form-control-sm" value="{{$project_task->date_needed}}" required>
    </div>
    <div class="form-group mb-1">
        Priority
        <select data-placeholder="Select priority" name="priority" class="form-control chosen-select">
            <option value=""></option>
            <option value="Low" @if($project_task->priority == "Low") selected @endif>Low</option>
            <option value="Medium" @if($project_task->priority == "Medium") selected @endif>Medium</option>
            <option value="High" @if($project_task->priority == "High") selected @endif>High</option>
        </select>
    </div>
    <div class="form-group mb-1">
        Activity Task
        <textarea name="activity_task" class="form-control form-control-sm" cols="30" rows="10">{{$project_task->activity_task}}</textarea>
    </div>
    <div class="form-group mb-1">
        Reason for changes
        <textarea name="reason_for_changes" class="form-control form-control-sm" cols="30" rows="10">{{$project_task->reason_for_changes}}</textarea>
    </div>
    <div class="form-group mb-1">
        Goals
        <textarea name="goals" class="form-control form-control-sm" cols="30" rows="10">{{$project_task->goal}}</textarea>
    </div>
    <div class="form-group mb-1">
        Attach File
        <input type="file" name="scrf_attachments" class="form-control form-control-sm" required multiple>
    </div
@endcomponent