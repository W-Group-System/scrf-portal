@component('components.modal', ['modal_title' => 'Edit department', 'modal_id' => 'edit'.$department->id, 'url' => url('update_department/'.$department->id), 'submit_btn_name' => 'Update'])
    <div class="form-group mb-1">
        Code 
        <input type="text" name="code" class="form-control form-control-sm" value="{{$department->code}}" required>
    </div>
    <div class="form-group mb-1">
        Name 
        <input type="text" name="name" class="form-control form-control-sm" value="{{$department->name}}" required>
    </div>
    <div class="form-group mb-1">
        Department Head 
        <select name="department_head" class="form-control chosen-select" required>
            <option value="">Select user</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}" @if($user->id === $department->user_id) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>
    </div>
@endcomponent