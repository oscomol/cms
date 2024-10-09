@extends('layout.adminLayout')

@section('title')
    {{$package->name}} 
@endsection

@section('option')

<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <button class="btn text-light" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-th-large"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    
            <h6 class="pl-2 pt-2">Manage package</h6>
            <a class="dropdown-item" data-toggle="modal" data-target="#update-package-{{$package->id}}">
                <i class="fa fa-edit mr-2"></i> Update
            </a>
           
                <a class="dropdown-item"  data-toggle="modal" 
                data-target="#delete-package-{{$package->id}}">
                    <i class="fa fa-trash mr-2"></i> Delete 
                </a>

                <div class="dropdown-divider"></div>
    
                

        </div>
    </li>
</ul>
@include('components.admin.package.deletePackage')
@include('components.admin.package.updatePackage')

@endsection

@section('content')
    @include('components.admin.singlePackage.bar')
    @include('components.admin.singlePackage.selectMenu')
    @include('components.admin.singlePackage.selectTheme')
@endsection

@section('script')
    <script type="module">
        $(function(){
            diplayDataTable();

            $('.delete-package').submit(function(){
                $(this).find('#deletepackageBtn').prop('disabled', true);
                $(this).find('#span').text('Deleting...');
            });

            $('#package-update').submit(function(){
                $(this).find('#deletePackageBtn').prop('disabled', true);
                $(this).find('#span').text('Updating...');
            });

            $('.selectedMenuForm').submit(function(){
                $(this).find('button').prop('disabled', true).text('Submitting...');
            });

            $('.delete-selected-menu-form').submit(function(){
                $(this).find('#deleteSelectedMenu').prop('disabled', true).text('Deleting...');
            });

            let previousMenuId = undefined;

            $(document).on('click', '.select-menu', function() {
                const id = $(this).attr('rowId');
                console.log(id);
                
                $(`#select-menu-row-${id}`).addClass('bg-warning');
                
                if(previousMenuId){
                    $(`#select-menu-row-${previousMenuId}`).removeClass('bg-warning');
                }
                
                $('.selected-menu-inp').val(id);
                
                $('#selectMenuBtn').prop('disabled', false);
                
                previousMenuId = id;
            });


            $('.selectedform').submit(function(){
                $(this).find('#selectThemeBtn').prop('disabled', true).text('Updating....')
            })

            let previousTheme = undefined;
            let previousSubTheme = undefined;

            $(document).on('click', '.select-theme', function(){
                $('#selectThemeBtn').prop('disabled', true);
                $('.selected-theme-inp').val('');
                $('.selected-subCategoryId-inp').val('');

                const id = $(this).attr('rowId');
                const type = $(this).attr('rowType');
               
                $(`.selectedThemeRow`).removeClass('bg-warning');

                $(`#select-theme-row-${id}`).addClass('bg-warning');

                $('.selected-theme-inp').val(id);

                if(type === "Package"){
                    $('#selectThemeBtn').prop('disabled', true);
                }else{
                    $('#selectThemeBtn').prop('disabled', false);
                }
            })

            $(document).on('click', '.subTheme', function(){
                $('.selected-subCategoryId-inp').val('');
                const subcategoryId = $(this).attr('subcategory');
                $('.selected-subCategoryId-inp').val(subcategoryId);
                $('#selectThemeBtn').prop('disabled', false);
            })

        })

        function diplayDataTable(){
            $('#selectThemeTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#menuSelectedData').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "pageLength": 5
            });
            $('#includedMenuDataTable').DataTable({
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
    .customCont{
        width: 100%;
        height: 60vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }
    .customDetailsContainer{
        display: flex;
        flex-direction: column;
        justify-content: end;
        gap: 10px;
    }
</style>