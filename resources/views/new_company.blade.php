@component('components.modal', ['modal_title' => 'Add new company', 'modal_id' => 'new', 'url' => url('store_company'), 'submit_btn_name' => 'Save'])
    <div class="form-group mb-1">
        Code 
        <input type="text" name="code" class="form-control form-control-sm" required>
    </div>
    <div class="form-group mb-1">
        Name 
        <input type="text" name="name" class="form-control form-control-sm" required>
    </div>
@endcomponent