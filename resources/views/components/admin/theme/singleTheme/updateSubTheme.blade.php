<button class="btn btn-info btn-sm pt-1" data-toggle="modal" 
data-target="#update-subTheme-{{$subTheme->id}}" id="update-theme-btn-{{$subTheme->id}}">
    <i class="fa fa-pen"></i>
</button>

<form action="{{ route('update-subTheme', ['themeId' => $subTheme->id]) }}"
    method="POST" id="update-subTheme-{{$subTheme->id}}-form" class="update-subTheme" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="modal fade" id="update-subTheme-{{$subTheme->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Update theme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <center>
                        <div class="menuSelect">
                            <img src="{{ url('/themes/uploaded/' . $subTheme->photo) }}" id="preview-menu-{{$subTheme->id}}-edit" alt="Menu's photo" class="menu-edit-photo">

                            <input type="file" id="menu-photo-{{$subTheme->id}}" rowId="{{$subTheme->id}}" name="menuphoto" class="selectEditMenu" style="display: none;">
                            
                            <label for="menu-photo-{{$subTheme->id}}" id="edit-photo-picker-{{$subTheme->id}}" class="btn btn-sm btn-info edit-menu-label">
                                <i class="fas fa-pen"></i>
                            </label>
                        </div>
                    </center>
    
                    <div class="form-group">
                        <label for="theme-name{{$subTheme->id}}">Theme</label>
                        <input type="text" class="form-control" id="theme-name{{$theme->id}}" name="name" value="{{$subTheme->name}}" required>
                    </div>
    
                    <div class="form-group">
                        <label for="description{{$theme->id}}">Description</label>
                        <textarea class="form-control" id="description{{$subTheme->id}}" name="description" required>{{$subTheme->description}}</textarea>
                    </div>

                    <input type="hidden" id="theme-existingPhoto{{$theme->id}}" value="{{$theme->photo}}" name="existingPhoto">

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm" id="addthemeBtn">
                        Update
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>