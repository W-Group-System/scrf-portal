@component('components.modal', ['modal_title' => 'Edit task', 'modal_id' => 'editTask'.$task->id, 'url' => url('update-project-task/'.$task->id), 'submit_btn_name' => 'Update', 'has_enctype' => true])
<div class="form-group mb-1">
    Title
    <input type="text" name="title" class="form-control form-control-sm" value="{{$task->title}}" required>
</div>
<div class="form-group mb-1">
    Priority
    <select data-placeholder="Select Priority" name="priority" class="form-select form-control-sm chosen-select" style="width: 100%;" required>
        <option value=""></option>
        <option value="Low" @if($task->priority == 'Low') selected @endif>Low</option>
        <option value="Medium" @if($task->priority == 'Medium') selected @endif>Medium</option>
        <option value="High" @if($task->priority == 'High') selected @endif>High</option>
    </select>
</div>
<div class="form-group mb-1">
    Description
    <textarea name="description" id="" cols="30" rows="10" class="form-control" required>{{$task->description}}</textarea>
</div>
<div class="form-group mb-1">
    Assigned To 
    <select data-placeholder="Assigned To" name="assigned_to" class="form-control chosen-select" required>
        <option value=""></option>
        @foreach ($users as $key=>$user)
            <option value="{{$key}}" @if($key == $task->assigned_to) selected @endif>{{$user}}</option>
        @endforeach
    </select>
</div>
<div class="form-group mb-1">
    Due Date
    <input type="date" name="due_date" class="form-control form-control-sm" value="{{$task->due_date}}" required>
</div>
<div class="form-group mb-1">
    Attachments
    <input type="file" name="file[]" class="form-control form-control-sm" multiple >
</div>
@endcomponent