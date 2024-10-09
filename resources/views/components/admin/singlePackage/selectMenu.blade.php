<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Menus</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="menuSelectedData" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="menuData">
                    @foreach ($menus as $menu)
                        <tr id="select-menu-row-{{ $menu->id }}"
                            class="{{ $menu->isSelected ? 'bg-warning' : '' }}">
                            <td>
                                <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image"
                                    style="width: 35px; height: 35px;" />
                            </td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->category }}</td>
                            <td >
                                <button
                                    class="btn btn-sm btn-info select-menu"
                                    id="select-theme-{{ $menu->id }}" rowId="{{ $menu->id }}">
                                    {{ $menu->isSelected ? 'Unselect' : 'Select' }}
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <form action="{{ route('select-menu', ['packageId' => $packageId]) }}" method="POST"
                class="selectedMenuForm">
                @csrf
                @method('post')
                <input type="hidden" class="selected-menu-inp" name="menuId" />
                <button type="submit" class="btn btn-success btn-sm float-right" id="selectMenuBtn" disabled>Submit</button>
            </form>
        </div>
    </div>
</div>