@component('components.modal', ['modal_title' => 'Add new task', 'modal_id' => 'newTask', 'url' => url('store-project-task'), 'submit_btn_name' => 'Save', 'has_enctype' => true])
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class="form-group mb-1">
        Title
        <input type="text" name="title" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Priority
        <select data-placeholder="Select Priority" name="priority" class="form-control form-control-sm chosen-select" required>
            <option value=""></option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>
    <div class="form-group mb-1">
        Description
        <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-1">
        Assigned To 
        <select data-placeholder="Assigned To" name="assigned_to" class="form-control chosen-select" required>
            <option value=""></option>
            @foreach ($users as $key=>$user)
                <option value="{{$key}}">{{$user}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Due Date
        <input type="date" name="due_date" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Attachments
        <input type="file" name="file[]" class="form-control form-control-sm" multiple required>
    </div>
@endcomponent