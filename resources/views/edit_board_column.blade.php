@component('components.modal', ['modal_title' => 'Edit board column', 'modal_id' => 'edit'.$board_column->id, 'url' => url('update-column/'.$board_column->id), 'submit_btn_name' => 'Save'])
    <div class="form-group mb-1">
        Column 
        <input type="hidden" name="project_id" value="{{$project->id}}">
        <input type="text" name="column" class="form-control form-control-sm" value="{{$board_column->column}}" required>
    </div>
@endcomponent