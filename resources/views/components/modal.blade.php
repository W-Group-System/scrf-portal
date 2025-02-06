<div class="modal" id="{{$modal_id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$modal_title}}</h5>
            </div>
            <form method="POST" action="{{$url}}" @if(isset($has_enctype)) enctype="multipart/form-data" @endif onsubmit="show()">
                @csrf
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    @if(!isset($view))
                    <button type="submit" class="btn btn-primary">{{$submit_btn_name}}</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>