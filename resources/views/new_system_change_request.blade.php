@component('components.modal', ['modal_title' => 'Add new system change request', 'modal_id' => 'new', 'url' => url('store-system-change-request'), 'submit_btn_name' => 'Save'])
    <div class="form-group mb-1">
        Project
        <select data-placeholder="Select project" name="project" class="form-control chosen-select">
            <option value=""></option>
            @foreach ($projects as $key=>$project)
                <option value="{{$key}}">{{$project}}</option>
            @endforeach
        </select>
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
        <input type="date" name="date_needed" class="form-control form-control-sm" required>
    </div>
    {{-- <div class="form-group mb-1">
        Date Accomplished
        <input type="date" name="date_accomplished" class="form-control form-control-sm" required>
    </div> --}}
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
@endcomponent