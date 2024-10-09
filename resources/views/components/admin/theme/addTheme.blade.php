<form action="{{route('add-theme')}}" id="submit-theme" method="POST" enctype="multipart/form-data">
    @csrf
    @method("post")
<div class="modal fade" id="add-theme" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Add Theme</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <center>
                        <div class="menuSelect">
                            <label for="theme-photo" id="photo-picker-label" style="font-size: 60px; font-weight: bold;">
                                <li class="fa fa-tree"></li>
                                <p style="font-size: 16px; font-weight: normal; margin-top: 7px;">Click to add</p>
                            </label>
                            <img src="" class="d-none" id="photo-preview-menu" alt="Menu's photo">

                            <input type="file" id="theme-photo" style="display: none;" name="themePhoto" accept="image/*">
    
                            <label for="theme-photo" id="edit-photo-picker-label" class="d-none btn btn-sm btn btn-info">
                                <li class="fas fa-pen"></li>
                            </label>
                        </div>
                    </center>

                    <div class="form-group">
                        <label for="theme">Theme</label>
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type of theme</label>
                        <select class="form-control" name="type" id="addThemeType">
                            <option selected>Select type of theme</option>
                            <option value="Package">Package</option>
                            <option value="Cuztomizable">Cuztomizable</option>
                          </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="addThemeBtn">
                        <span id="span">Save</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

</form>