@extends('layout.adminLayout')

@section('title')
   {{ ucfirst($category) }} reservations 
 
@endsection

@section('content')
<input type="hidden" id="categoryReservation" value="{{ $category }}">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Packages</h3>
                </div>
                <div class="card-body">
                    <table id="checkoutAdminDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Person</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let fetchData = [];

        const category = $('#categoryReservation').val(); 

        const table = $('#checkoutAdminDataTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "stateSave": true,
            "ajax": {
                url: `{{ url('/reservations/getData') }}/${category}`,
                type: 'GET',
                dataSrc: function (json) {
                    fetchData = json; 
                    return json;
                },
                dataType: 'json'
            },
            "columns": [
                { "data": "name" },
                { "data": "contactPerson" },
                { "data": "email" },
                { "data": "functionDate" },
                {
                    "data": "status",
                    "render": function(data) {
                        return `<span class="badge ${data === 1 ? 'bg-secondary' : (data  > 1 && data < 7) ? 'bg-primary' : (data  === 7) ? 'bg-success':'bg-danger'}">

                                    ${data === 1 ? 'Pending' : (data  > 1 && data < 8) ? 'Approved': (data  === 7) ? 'Done' : 'Cancelled'}

                                </span>`;
                    }
                },
                {
                    "data": null,
                    "render": function(data) {
                        return `<a href="show/${data.id}" id="checkout-${data.id}" class="btn btn-sm btn-secondary">More</a>`;
                    }
                }
            ]
        });

        setInterval(function() {
            table.ajax.reload(null, false); 
        }, 10000);
    });
</script>
@endsection
