@extends('layout.adminLayout')

@section('title')
    Menu 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Menus</h3>
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#add-menu"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
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
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td >
                                            <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 35px; height: 35px;"/>
                                        </td>
                                        <td>{{ $menu->name }}</td>
                                        <td>{{ $menu->slicedDes }}</td>
                                        <td>
                                            <span class="badge bg-danger">{{ $menu->price }}</span>
                                        </td>
                                        <td class="d-flex customTd">
                                            @include('components.admin.menu.updateMenu')
                                            @include('components.admin.menu.deleteMenu')
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- @include('components.admin.menu.addMenu') --}}
@endsection

@section('script')
    <script type="module">
        $(function(){
            diplayDataTable();

            $("#menu-photo").change(function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#photo-picker-label').addClass('d-none');
                        $('#edit-photo-picker-label').removeClass('d-none');
                        $('#photo-preview-menu').removeClass('d-none');
                        $('#photo-preview-menu').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            $(".selectEditMenu").change(function() {

                const file = this.files[0];
                if (file) {
                    const id = $(this).attr('rowId');
                    const reader = new FileReader();
                    reader.onload = function(e) {
                    $(`#preview-menu-${id}-edit`).attr('src', '');
                    $(`#preview-menu-${id}-edit`).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

            $("#menu_submit").submit(function(){
                $(this).find('#addMenuBtn').prop('disabled', true);
                $(this).find('#span').text('Saving...');
            });

            $(".update-menu").submit(function(){
                $(this).find('#addMenuBtn').prop('disabled', true);
                $(this).find('#span').text('Updating...');
            });

            $(".delete-menu").submit(function(){
                $(this).find('#addMenuBtn').prop('disabled', true);
                $(this).find('#span').text('Deleting');
            });
        });

        function diplayDataTable(){
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        }
    </script>
@endsection

<style>
    .customTd{
        gap: 5px;
    }
    .menuSelect {
        border: 1px solid gray;
        border-radius: 10px;
        width: 80%;
        height: 180px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    #photo-preview-menu, .menu-edit-photo{
        width: 100%;
        height: 100%;
    }

    #edit-photo-picker-label, .edit-menu-label {
        position: absolute;
        right: 10px;
        bottom: 10px;
        z-index: 999;
        font-size: 24px;
        cursor: pointer;
        background: transparent;
        border: transparent;
        color: green;
    }
</style>