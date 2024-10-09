@extends('layout.adminLayout')

@section('title')
    Administrators 
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Administrator</h3>
                    <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#add-admin"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="adminDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Date created</th>
                            </tr>
                        </thead>
                        <tbody id="adminData">
                            @foreach ($admins as $admin)
                                <tr>
                                    <td >
                                       {{$admin->name}}
                                       @if ($user->id === $admin->id)
                                           <span class="badge bg-info ml-3">You</span>
                                       @endif
                                    </td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->address }}</td>
                                    <td>{{ $admin->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.admin.administrator.addAdmin')

@endsection

@section('script')
    <script type="module">
        $(function(){
            diplayDataTable();

            $('.add-admin-form').submit(function(){
                $(this).find('#addAdminBtn').prop('disabled', true).text('Saving...');
            });

        });

        function diplayDataTable(){
            $('#adminDataTable').DataTable({
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