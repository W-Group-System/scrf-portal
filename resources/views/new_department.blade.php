@component('components.modal', ['modal_title' => 'Add new department', 'modal_id' => 'new', 'url' => url('store_department'), 'submit_btn_name' => 'Save'])
    <div class="form-group mb-1">
        Code 
        <input type="text" name="code" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Name 
        <input type="text" name="name" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Department Head 
        <select name="department_head" class="form-control chosen-select">
            <option value="">Select user</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
@endcomponent