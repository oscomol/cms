<div class="modal fade" id="delete-account" tabindex="-1" role="dialog" aria-labelledby="modal-default-p-logout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-default-p-logout">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this account ?</p>
            </div>

            <div class="modal-footer">
                <a href="{{route('delete-account')}}" class="btn btn-danger btn-sm deleteUserBtn">
                    Yes
                </a>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                    No
                </button>
            </div>
        </div>
    </div>
</div>