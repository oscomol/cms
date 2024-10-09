<form action="{{route('update-packed', ['packedId' => $pack->id])}}" id="update-packed-form-{{$pack->id}}" class="update-packed" method="POST">
    @csrf
    @method("put")
    <div class="modal fade" id="update-packed-{{$pack->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">{{$category}} menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

    
                    <div class="form-group">
                        <label for="menu-name-{{$pack->id}}">Name</label>
                        <input type="text" class="form-control" id="menu-name-{{$pack->id}}" name="name" value="{{$pack->name}}" required>
                    </div>
    
                    <div class="form-group">
                        <label for="menu-price-{{$pack->id}}">Price</label>
                        <input type="number" class="form-control" id="menu-price-{{$pack->id}}" name="price" value="{{$pack->price}}" required>
                    </div>
    
                    <div class="form-group">
                        <label for="description-{{$pack->id}}">Description</label>
                        <textarea class="form-control" id="description-{{$pack->id}}" name="description" required>{{$pack->description}}</textarea>
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