@extends('layout.adminLayout')

@section('title')
    Package
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Packages</h3>
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#add-package"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-body">
                        <table id="packageDataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Max individuals</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="menuData">
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->description }}</td>
                                        <td>{{ $package->allowedIndividuals }} </td>
                                        <td>
                                            <span class="badge bg-danger">{{ $package->price }}</span>
                                        </td>
                                        <td class="d-flex customTd">
                                            <a href="{{ url('/package-list/show/' . $package->id) }}" class="btn btn-sm btn btn-info">More</a>

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
    @include('components.admin.package.addPackage')
@endsection


@section('script')
    <script type="module">
        $(function(){
            diplayDataTable();
        });

        $('#package_submit').submit(function(){
            $(this).find('#addpackageBtn').prop('disabled', true);
            $(this).find('#span').text("Saving...");
        });

        function diplayDataTable(){
            $('#packageDataTable').DataTable({
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
