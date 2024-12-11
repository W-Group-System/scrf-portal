@component('components.modal', [
    'modal_title' => 'Edit project', 
    'modal_id' => 'edit', 
    'url' => url('update_project/'.$project->id), 
    'submit_btn_name' => 'Update'
    ])

    <div class="form-group mb-1">
        Project Name
        <input type="text" name="project_name" class="form-control form-control-sm" value="{{$project->project_name}}" required>
    </div>
    <div class="form-group mb-1">
        Members 
        <select name="members[]" class="form-control chosen-select" multiple required>
            <option value="">Select users</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Department 
        <select name="department" class="form-control chosen-select" required>
            <option value="">Select departments</option>
            @foreach ($departments as $department)
                <option value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Description 
        <textarea name="description" class="form-control" cols="30" rows="10" required></textarea>
    </div>
@endcomponent