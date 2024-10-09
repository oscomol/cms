<form action="{{route('add-packed', ['category' => $category])}}" id="submit-packed" method="POST">
    @csrf
    @method("post")
    <div class="modal fade" id="add-packed" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">{{ucfirst($category)}} menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

    
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
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>