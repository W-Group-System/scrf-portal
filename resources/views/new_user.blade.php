@component('components.modal', ['modal_title' => 'Add new user', 'modal_id' => 'new', 'url' => url('store_user'), 'submit_btn_name' => 'Save'])
    <div class="form-group mb-1">
        Name 
        <input type="text" name="name" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Email 
        <input type="email" name="email" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Company 
        <select name="company" class="form-control chosen-select" required>
            <option value="">Select company</option>
            @foreach ($company as $comp)
                <option value="{{$comp->id}}">{{$comp->code.' - '.$comp->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Department 
        <select name="department" class="form-control chosen-select" required>
            <option value="">Select department</option>
            @foreach ($department as $dept)
                <option value="{{$dept->id}}">{{$dept->code.' - '.$dept->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mb-1">
        Role 
        <select name="roles" class="form-control chosen-select" required>
            <option value="">Select role</option>
            @foreach ($roles as $key=>$role)
                <option value="{{$key}}">{{$role}}</option>
            @endforeach
        </select>
    </div>
@endcomponent