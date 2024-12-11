@component('components.modal', ['modal_title' => 'Edit company', 'modal_id' => 'edit'.$company->id, 'url' => url('update_company/'.$company->id), 'submit_btn_name' => 'Update'])
    <div class="form-group mb-1">
        Code 
        <input type="text" name="code" class="form-control form-control-sm" value="{{$company->code}}" required>
    </div>
    <div class="form-group mb-1">
        Name 
        <input type="text" name="name" class="form-control form-control-sm" value="{{$company->name}}" required>
    </div>
@endcomponent