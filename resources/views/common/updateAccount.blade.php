<form action="{{route('update-account', ["userId" => $user->id])}}" method="POST" class="add-admin-form">
    @csrf
    @method('put')
    <div class="modal fade" id="update-account" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Account update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name-edit">Full name</label>
                        <input type="text" class="form-control" id="name-edit" name="name" value="{{$user->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="address-edit">Address</label>
                        <input type="text" class="form-control" id="address-edit" name="address" value="{{$user->address}}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone-edit">Phone</label>
                        <input type="text" class="form-control" id="phone-edit" name="phone" value="{{$user->phone}}" required>
                    </div>

                    <div class="form-group">
                        <label for="email-edit">Email</label>
                        <input type="text" class="form-control" id="email-edit" name="email" value="{{$user->email}}" required>
                    </div>

                    <div class="form-group">
                        <label for="password-edit">New Password</label>
                        <input type="password" class="form-control" id="password-edit" name="password">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="addAdminBtn">
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>


