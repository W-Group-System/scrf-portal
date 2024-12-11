@component('components.modal', ['modal_title' => 'Edit user', 'modal_id' => 'edit'.$user->id, 'url' => url('update_user/'.$user->id), 'submit_btn_name' => 'Update'])
    <div class="form-group mb-1">
        Name 
        <input type="text" name="name" class="form-control form-control-sm" value="{{$user->name}}" required>
    </div>
    <div class="form-group mb-1">
        Email 
        <input type="email" name="email" class="form-control form-control-sm" value="{{$user->email}}" required>
    </div>
    <div class="form-group mb-1">
        Company 
        <select name="company" class="form-control chosen-select" required>
            <option value="">Select company</option>
            @foreach ($company as $comp)
                <option value="{{$comp->id}}" @if($comp->id === $user->company_id) selected @endif>{{$comp->code.' - '.$comp->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Department 
        <select name="department" class="form-control chosen-select" required>
            <option value="">Select department</option>
            @foreach ($department as $dept)
                <option value="{{$dept->id}}"  @if($dept->id === $user->department_id) selected @endif>{{$dept->code.' - '.$dept->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Role 
        <select name="roles" class="form-control chosen-select" required>
            <option value="">Select role</option>
            @foreach ($roles as $key=>$role)
                <option value="{{$key}}"  @if($key == $user->role) selected @endif>{{$role}}</option>
            @endforeach
        </select>
    </div>
@endcomponent