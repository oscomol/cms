<form action="{{route('add-package')}}" method="POST"  id="package_submit">
    @csrf
    @method("post")
    <div class="modal fade" id="add-package" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Add Package</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
    
                    <div class="form-group">
                        <label for="package-name">Name</label>
                        <input type="text" class="form-control" id="package-name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
    
                    <div class="form-group">
                        <label for="allowedIndividuals">Maximum individuals</label>
                        <input type="number" class="form-control" id="allowedIndividuals" name="allowedIndividuals" required>
                    </div>
    
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="addpackageBtn">
                        <span id="span">Save</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>