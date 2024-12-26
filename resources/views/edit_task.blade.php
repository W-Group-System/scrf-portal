@component('components.modal', ['modal_title' => 'Edit task', 'modal_id' => 'editTask'.$task->id, 'url' => url('update-project-task/'.$task->id), 'submit_btn_name' => 'Update', 'has_enctype' => true])
{{-- <div class="form-group mb-1">
    <label for="task_name">System Change Completion</label>
    <input type="file" name="scrf_files[]" class="form-control form-control-sm" multiple required>
</div> --}}
<div class="form-group mb-1">
    <label for="assignedTo">Assigned To</label>
    <select data-placeholder="Select IT Personnel" name="assigned_to" class="form-control form-control-sm chosen-select" required>
        <option value=""></option>
        @foreach ($users as $key=>$user)
            <option value="{{$key}}" @if($key == $task->assigned_to) selected @endif>{{$user}}</option>
        @endforeach
    </select>
</div>
@endcomponent