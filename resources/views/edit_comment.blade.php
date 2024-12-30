@component('components.modal', ['modal_title' => 'Edit comment', 'modal_id' => 'editComment'.$comment->id, 'url' => url('update_comment/'.$comment->id), 'submit_btn_name' => 'Update'])
    <div class="form-group mb-1">
        <div class="border rounded">
            <form action="{{url('update-comment/'.$comment->id)}}" class="comment-area-box" onsubmit="show()" method="POST" enctype="multipart/form-data">
                @csrf 
                <input type="hidden" name="project_task_id" value="{{$project_task->id}}">
                <textarea rows="3" name="comment" class="form-control border-0 resize-none" placeholder="Your comment..." required>{{$comment->comment}}</textarea>
                <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                    <div>
                        <input type="file" id="imageUpload" name="image_comment[]" accept="image/*" style="display: none;" onchange="previewImage(event)" multiple>

                        <a href="#" class="btn btn-sm px-1 btn-light" onclick="document.getElementById('imageUpload').click()"><i class='mdi mdi-upload'></i></a>
                        {{-- <a href="#" class="btn btn-sm px-1 btn-light"><i class='mdi mdi-at'></i></a> --}}
                    </div>
                    <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Submit</button>
                </div>

                <div id="previewContainer" class="mt-2" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>

            </form>
        </div> <!-- end .border-->
    </div>
@endcomponent