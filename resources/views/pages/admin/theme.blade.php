@extends('layout.adminLayout')

@section('title')
    Themes 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Themes</h3>
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal"
                            data-target="#add-theme"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="themeTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Theme</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="themeData">
                                @foreach ($themes as $theme)
                                    <tr>
                                        <td>
                                            <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" alt="User Image"
                                                style="width: 35px; height: 35px;" />
                                        </td>
                                        <td>{{ $theme->theme }}</td>
                                        <td>{{ $theme->slicedDes }}</td>
                                        <td class="customTd">
                                            <button class="btn btn-info btn-sm pt-1" data-toggle="modal"
                                                data-target="#update-theme-{{ $theme->id }}"
                                                id="update-theme-btn-{{ $theme->id }}">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                            <button class="btn btn-danger btn btn-sm" data-toggle="modal"
                                                data-target="#delete-theme-{{ $theme->id }}">
                                                <li class="fa fa-trash"></li>
                                            </button>

                                        </td>
                                    </tr>
                                    <div>
                                        @include('components.admin.theme.updateTheme')
                                        @include('components.admin.theme.deleteTheme')
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (session('message'))
        <script>
            Swal.fire({
                icon: "success",
                text: "{{ session('message') }}",
                timer: 3000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: "error",
                text: "{{ session('error') }}",
                timer: 3000
            });
        </script>
    @endif

    @include('components.admin.theme.addTheme')
@endsection

@section('script')
    <script type="module">
        $(function() {
            diplayDataTable();


            $("#theme-photo").change(function() {
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


            $('.delete-theme').submit(function() {
                $(this).find("#addthemeBtn").prop('disabled', true);
                $(this).find("#span").text("Deleting...");
            });

            $('.submit-theme').submit(function() {
                $(this).find("#addthemeBtn").prop('disabled', true);
                $(this).find("#span").text("Saving...");
            });

            $('.update-theme').submit(function() {
                $(this).find("#addthemeBtn").prop('disabled', true);
                $(this).find("#span").text("Saving...");
            });

        });

        function diplayDataTable() {
            $('#themeTable').DataTable({
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
    .customTd {
        display: flex;
        min-width: 150px;
        gap: 15px;
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

    #photo-preview-menu,
    .menu-edit-photo {
        width: 100%;
        height: 100%;
    }

    #edit-photo-picker-label,
    .edit-menu-label {
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
