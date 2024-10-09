


<form action="{{ route('delete-theme', ['theme' => $theme->id]) }}"
    method="POST" id="delete-theme-{{$theme->id}}-form" class="delete-theme">
    @csrf
    @method("delete")
    <div class="modal fade" id="delete-theme-{{$theme->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Confirm delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this theme ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-sm" id="addthemeBtn">
                        <span id="span">Delete</span>
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>