<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Included Menus</h3>
            </div>
            <div class="card-body">
                <table id="includedMenuDataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="menuData">
                        @foreach ($selectedMenu as $menu)
                            <tr>
                                <td>
                                    <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image"
                                        style="width: 35px; height: 35px;" />
                                </td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->slicedDes }}</td>
                                <td>
                                    <span class="badge bg-danger">{{ $menu->price }}</span>
                                </td>
                                <td class="d-flex">
                                    <button class="btn btn-sm btn btn-danger" data-toggle="modal"
                                        data-target="#delete-selected-menu-{{ $menu->id }}">
                                        <li class="	fa fa-close"></li>
                                    </button>


                                    <form action="{{ route('delete-selected-menu', ['packageId' => $packageId]) }}" method="POST"
                                        id="delete-selecte-menu-{{ $menu->id }}-form" class="delete-selected-menu-form">
                                        @csrf
                                        @method('delete')
                                        <div class="modal fade" id="delete-selected-menu-{{ $menu->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal-default-label">Confirm delete
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete this selected menu?
                                                        <input type="hidden" value="{{ $menu->id }}" name="menuId">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            id="deleteSelectedMenu">Delete
                                                        </button>
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>




                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
