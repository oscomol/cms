<form action="{{route('add-menu', ['category' => $category, 'subCategory' => $subCategory])}}" id="menu_submit" method="POST" enctype="multipart/form-data">
    @csrf
    @method("post")
    <div class="modal fade" id="add-menu" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">{{$subCategory}} menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
                    <center>
                        <div class="menuSelect">
                            <label for="menu-photo" id="photo-picker-label" style="font-size: 40px; font-weight: bold;">
                                <li class="fa fa-birthday-cake"></li>
                                <p style="font-size: 16px; font-weight: normal; margin-top: 7px;">Click to add</p>
                            </label>
                            <img src="" class="d-none" id="photo-preview-menu" alt="Menu's photo">

                            <input type="file" id="menu-photo" style="display: none;" name="menuphoto" accept="image/*">
    
                            <label for="menu-photo" id="edit-photo-picker-label" class="d-none btn btn-sm btn btn-info">
                                <li class="fas fa-pen"></li>
                            </label>
                        </div>
                    </center>
    
                    <div class="form-group">
                        <label for="menu-name">Name</label>
                        <input type="text" class="form-control" id="menu-name" name="name" required>
                    </div>
    
                    <div class="form-group">
                        <label for="menu-price">Price</label>
                        <input type="number" class="form-control" id="menu-price" name="price" required>
                    </div>
    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
    
    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="addMenuBtn">
                        <span id="span">Save</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>