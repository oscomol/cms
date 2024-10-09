<button class="btn btn-danger btn btn-sm" data-toggle="modal" 
data-target="#delete-menu-{{$menu->id}}">
    <li class="fa fa-trash"></li>
</button>

<form action="{{ route('delete-menu', ['menu' => $menu->id]) }}"
    method="POST" id="delete-menu-{{$menu->id}}-form" class="delete-menu">
    @csrf
    @method("delete")
    <div class="modal fade" id="delete-menu-{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Confirm delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this menu ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm" id="addMenuBtn">
                        <span id="span">Delete</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>