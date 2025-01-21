@component('components.modal', [
    'modal_title' => 'Add new system change request', 
    'modal_id' => 'new', 
    'url' => url('store-system-change-request'), 
    'submit_btn_name' => 'Save',
    'has_enctype' => true
    ])
    {{-- <div class="form-group mb-1">
        Project
        <select data-placeholder="Select project" name="project" class="form-control chosen-select">
            <option value=""></option>
            @foreach ($projects as $key=>$project)
                <option value="{{$key}}">{{$project}}</option>
            @endforeach
        </select>
    </div> --}}
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class="form-group mb-1">
        Project name
        <input type="text" name="project_name" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Type of Request
        <select data-placeholder="Select type of request" name="type_of_request" class="form-control chosen-select" required>
            <option value=""></option>
            <option value="Modification">Modification</option>
            <option value="New Report">New Report</option>
            <option value="New Functions">New Functions</option>
        </select>
    </div>
    <div class="form-group mb-1">
        Date Needed
        <input type="date" name="date_needed" class="form-control form-control-sm" min="{{date('Y-m-d', strtotime("+1 day"))}}" required>
    </div>
    <div class="form-group mb-1">
        Priority
        <select data-placeholder="Select priority" name="priority" class="form-control chosen-select">
            <option value=""></option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>
    <div class="form-group mb-1">
        Activity Task
        <textarea name="activity_task" class="form-control form-control-sm" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group mb-1">
        Reason for changes
        <textarea name="reason_for_changes" class="form-control form-control-sm" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group mb-1">
        Goals
        <textarea name="goals" class="form-control form-control-sm" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group mb-1">
        Attach File
        <input type="file" name="scrf_attachments[]" class="form-control form-control-sm" required multiple>
    </div
@endcomponent