@component('components.modal', ['modal_title' => 'Add new board column', 'modal_id' => 'new', 'url' => url('add-column'), 'submit_btn_name' => 'Save'])
    <div class="form-group mb-1">
        Column 
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="text" name="column" class="form-control form-control-sm" required>
    </div>
@endcomponent