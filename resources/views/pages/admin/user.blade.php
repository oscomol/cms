@extends('layout.adminLayout')

@section('title')
    Users 
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Users</h3>
                </div>
                <div class="card-body">
                    <table id="userDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Date created</th>
                            </tr>
                        </thead>
                        <tbody id="userData">
                            @foreach ($users as $user)
                                <tr>
                                    <td >
                                       {{$user->name}}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="module">
        $(function(){
            diplayDataTable();

        });

        function diplayDataTable(){
            $('#userDataTable').DataTable({
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