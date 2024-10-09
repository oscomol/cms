<button class="btn btn-info btn-sm pt-1" data-toggle="modal" 
data-target="#update-menu-{{$menu->id}}" id="update-menu-btn-{{$menu->id}}">
    <i class="fa fa-pen"></i>
</button>

<form action="{{ route('update-menu', ['menu' => $menu->id]) }}"
    method="POST" id="update-menu-{{$menu->id}}-form" class="update-menu" enctype="multipart/form-data">
    @csrf
    @method("put")
    <div class="modal fade" id="update-menu-{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Update Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    <center>
                        <div class="menuSelect">
                            <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" id="preview-menu-{{$menu->id}}-edit" alt="Menu's photo" class="menu-edit-photo">
                            <input type="file" id="menu-photo-{{$menu->id}}" rowId="{{$menu->id}}" name="menuphoto" class="selectEditMenu" style="display: none;" accept="image/*">
                            <label for="menu-photo-{{$menu->id}}" id="edit-photo-picker-{{$menu->id}}" class="btn btn-sm btn-info edit-menu-label">
                                <i class="fas fa-pen"></i>
                            </label>
                        </div>
                    </center>
    
                    <div class="form-group">
                        <label for="menu-name{{$menu->id}}">Name</label>
                        <input type="text" class="form-control" id="menu-name{{$menu->id}}" name="name" value="{{$menu->name}}" required>
                    </div>
    
                    <input type="hidden" id="menu-existingPhoto{{$menu->id}}" value="{{$menu->photo}}" name="existingPhoto">
    
                    <div class="form-group">
                        <label for="description{{$menu->id}}">Description</label>
                        <textarea class="form-control" id="description{{$menu->id}}" name="description" required>{{$menu->description}}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm" id="addMenuBtn">
                        <span id="span">Update</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
