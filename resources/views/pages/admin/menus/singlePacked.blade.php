@extends('layout.adminLayout')

@section('title')
    {{ucfirst($category)}}: {{ucfirst($pack->name)}} 
@endsection

@section('option')

<div class="mt-2">
    <button class="btn btn-sm btn-info mr-1" data-toggle="modal" 
    data-target="#update-packed-{{$pack->id}}">
        <li class="fa fa-pen"></li>
</button>
    <button class="btn btn-sm btn-danger"  data-toggle="modal" 
    data-target="#delete-pack-{{$pack->id}}">
        <li class="fa fa-trash"></li>
    </button>

    @include('components.admin.menu.packed.updatePacked')
    @include('components.admin.menu.packed.deletePack')
</div>

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
                    <table id="regularMenuDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Description</th>
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
                                    <td>{{ $menu->description }}</td>
                                    <td class="cushrefmTd">
                                        @include('components.admin.menu.packed.updateMenuPacked')
                                        @include('components.admin.menu.deleteMenu')
                                    </td>
                                </tr>
                                <div></div>
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

@include('components.admin.menu.packed.addMenuPacked')
@endsection

@section('script')
    <script type="module">
        $(function(){

            const titleText = $('.titleText');
            const text = titleText.text().trim();
            if(text.length > 15){
            titleText.text(`${text.slice(0, 15)}...`)
            }
    
            function handleResize() {
                if ($(window).width() <= 480) {
                    if(text.length > 15){
                        titleText.text(`${text.slice(0, 15)}...`)
                    }
                } else {
                    titleText.text(text)
                }
            }

            $(window).resize(handleResize);
            handleResize()
            
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

            $(".delete-pack").submit(function(){
                $(this).find('#deleteBtn').prop('disabled', true).text("Deleting...");
            });

            $('.update-packed').submit(function(){
                $(this).find('#addMenBtn').prop('disabled', true).text('Updating...')
            })

            $('.delete-menu').submit(function(){
                $(this).find('#addMenBtn').prop('disabled', true);
                $(this).find('#span').text('Deleting...')
            })
        })

        function diplayDataTable(){
            $('#regularMenuDataTable').DataTable({
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
    .cushrefmTd{
        display: flex;
        gap: 5px;
        min-width: 150px;
    }
</style>