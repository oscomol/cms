@extends('layout.adminLayout')

@section('title')
{{ ucfirst($category) }} Menu 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Menus</h3>
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#add-packed">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Add table-responsive wrapper here -->
                        <div class="table-responsive">
                            <table id="regularMenuDataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th  style="min-width: 100px;">Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="menuData">
                                    @foreach ($packs as $pack)
                                        <tr>
                                            <td  style="min-width: 100px;">{{ $pack->name }}</td>
                                            <td>{{ $pack->description }}</td>
                                            <td>
                                                <span class="badge bg-danger">{{ $pack->price }}</span>
                                            </td>
                                            <td class="customTd">
                                               <a href="{{ route('show-packed', [
                                               'category' => $pack->category,
                                               'packedId' => $pack->id
                                               ]) }}" class="btn btn-sm btn-info">More</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- End table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('components.admin.menu.packed.addPacked')

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
@endsection

@section('script')
    <script type="module">
        $(function(){
            diplayDataTable();

            $("#submit-packed").submit(function(){
                $(this).find('#addMenuBtn').prop('disabled', true).text('Saving...');
            });
        });

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
        display: flex;
        gap: 15px;
    }
</style>
