

<form action="{{ route('update-theme', ['themeId' => $theme->id]) }}"
    method="POST" id="update-theme-{{$theme->id}}-form" class="update-theme" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="modal fade" id="update-theme-{{$theme->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
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
                            <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" id="preview-menu-{{$theme->id}}-edit" alt="Menu's photo" class="menu-edit-photo">

                            <input type="file" id="menu-photo-{{$theme->id}}" rowId="{{$theme->id}}" name="menuphoto" class="selectEditMenu" style="display: none;" accept="image/*">
                            
                            <label for="menu-photo-{{$theme->id}}" id="edit-photo-picker-{{$theme->id}}" class="btn btn-sm btn-info edit-menu-label">
                                <i class="fas fa-pen"></i>
                            </label>
                        </div>
                    </center>
    
                    <div class="form-group">
                        <label for="theme-name{{$theme->id}}">Theme</label>
                        <input type="text" class="form-control" id="theme-name{{$theme->id}}" name="theme" value="{{$theme->theme}}" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type of theme</label>
                        <select class="form-control" name="type" id="type-{{$theme->id}}" >
                            <option>Select type of theme</option>
                            <option value="Package" {{$theme->type === "Package" ? 'Selected':''}}>Package</option>
                            <option value="Cuztomizable" {{$theme->type === "Cuztomizable" ? 'Selected':''}}>Cuztomizable</option>
                          </select>
                    </div>
    
                    <div class="form-group">
                        <label for="description{{$theme->id}}">Description</label>
                        <textarea class="form-control" id="description{{$theme->id}}" name="description" required>{{$theme->description}}</textarea>
                    </div>

                    <input type="hidden" id="theme-existingPhoto{{$theme->id}}" value="{{$theme->photo}}" name="existingPhoto">

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm" id="addthemeBtn">
                        <span id="span">Update</span>
                    </button>
                    @if ($theme->type === "Package")
                        <a href="{{route('show-theme', [
                            'themeId' => $theme->id
                        ])}}" type="button" class="btn btn-secondary btn-sm" >Manage</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>