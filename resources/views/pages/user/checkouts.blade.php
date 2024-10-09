@extends('layout.userLayout')

@section('title')
    Checkouts 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Packages</h3>
                        <a href="{{route('add-checkout-form')}}" class="btn btn-success btn-sm float-right"><i
                                class="fas fa-plus"></i></a>
                    </div>
                    <div class="card-body">
                        <table id="checkoutDataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact person</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="checkoutData">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.viewCheckOut')
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
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let fetchData = [];
        
        const table = $('#checkoutDataTable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "stateSave": true,
            "ajax": {
                url: "{{ url('/reg/checkouts/getIndexData') }}",
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
                        return `<span class="badge ${data === 1 ? 'bg-secondary' : (data  > 1 && data < 7) ? 'bg-primary' :data === 7 ? 'bg-success':'bg-danger'}">
                                    ${data === 1 ? 'Pending' : (data  > 1 && data < 7) ? 'Approved' :data === 7 ? 'Done':'Cancelled'}
                                </span>`;
                    }
                },
                {
                    "data": null,
                    "render": function(data) {
                        return `<a href="checkouts/show/${data.id}" id="checkout-${data.id}" class="btn btn-sm btn-secondary">More</a>`;
                    }
                }
            ]
        });

        const baseUrl = "{{ url('/menus/uploaded/') }}";
        const themeBaseUrl = "{{ url('/themes/uploaded/') }}";

        $(document).on('click', '.checkout', function(){
            const rowId = $(this).attr('rowId');
            const viewData = fetchData.find(data => data.id == rowId);
           if(viewData){
            setClienDetails(viewData);
            $('#view-checkout').modal('show');
            if(viewData?.regular?.length){
                setRegularMenus(viewData.regular)
            }else{
                $('.regular').addClass('d-none');
            }

            if(viewData?.package?.length){
                setPackesMenu(viewData.package)
            }else{
                $('.package').addClass('d-none');
            }

           if(viewData?.theme?.id){
            displayTheme(viewData.theme)
           }else{
            $('.theme').addClass('d-none');
           }

           }

           function  displayTheme(theme){
            $('.theme').removeClass('d-none');
            let themeElem = `
                        <div class="card col-12">
                            <div class="card-body p-0 px-1">
                                <img src="${themeBaseUrl}/${theme.theme.photo}" alt="Theme" style="width: 100%;"/>
                            </div>
                            <div class="card-footer p-2">
                                ${theme.theme.theme}
                                (${theme?.subCategory?.name ?? "Customize"})
                            </div>
                        </div>
                        `;
            $('.themeBody').html(themeElem);
           }

           function setClienDetails(viewData){
            if(viewData.status == 1){
                $('#manageCheckoutBtn').html(
                    `<a href="{{ url('/reg/checkout/manage/${viewData.id}') }}" class="btn btn-sm btn btn-info">Manage</a>`
                );
            }
            $('#name').text(viewData.name);
            $('#contactPerson').text(viewData.contactPerson);
            $('#emailInfo').text(viewData.email);
            $('#phoneInfo').text(viewData.phone);
            $('#functionType').text(viewData.functionType);
            $('#functionDate').text(viewData.functionDate);
            $('#startTime').text(viewData.startTime);
            $('#foodTime').text(viewData.foodTime);
            $('#endTime').text(viewData.endTime);
            $('#guestsNumber').text(viewData.numOfGuests);
            $('#initPayment').text(viewData.initPayment ?? "None");
            $('#additionalPayment').text(viewData.additionalPayment ?? "None");
           }

           function setRegularMenus(viewData){
            $('.regular').removeClass('d-none');
                let regularElem = '';
                for(let x=0; x<viewData.length; x++){
                    const reg = viewData[x];
                    regularElem += `
                    <div class="col-6 col-sm-4">
                    <div class="card">
                        <div class="card-body p-0">
                             <img src="${baseUrl}/${reg.photo}" alt="User Image" style="width: 100%; height: 70px;" class="rounded"/>
                        </div>
                        <div class="card-footer px-2 pt-1">
                            <span style="font-size: 13px;">
                                ${reg.name}
                            </span><br>
                             <div class="d-flex justify-content-between">
                                <span class="badge bg-danger" style="font-size: 13px;">
                                    ${reg.price}
                                </span>
                                <span style="font-size: 13px;">
                                    ${reg.quantity}
                                </span>
                            </div>
                        </div>
                    </div>
                     </div>
                    `;
                }
                $('.regularMenu').html(regularElem);
           }

            function setPackesMenu(viewData){
                $('.package').removeClass('d-none');
                let packageElem = '';
                for(let x=0; x<viewData.length; x++){
                    const packed = viewData[x];
                    packageElem += `<div class="col-12 col-sm-6">
                    <div class="card">
                        <div class="card-header p-0 bg-warning">
                            <div class="card-title">
                                <span style="font-size: 15px; margin-left: 5px;">
                                    ${packed.name} (${packed.quantity}x)
                                </span>
                            </div>
                        </div>
                        <div class="card-footer p-1">
                            <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Menus(${packed?.menus?.length})
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                             ${displayPackageMenu(packed.menus)}
                                        </div>
                                    </div>
                        </div>
                    </div>
                     </div>
                    `;
                }

                function displayPackageMenu(menu) {
                        let packageMenu = '';
                        for (let x = 0; x < menu.length; x++) {
                            const men = menu[x];
                            packageMenu += `
                                <a href="#" class="dropdown-item" style="font-size: 13px;">${men.name}
                                <span class="float-right">
                                    <img src="${baseUrl}/${men.photo}" alt="User Image" style="width: 30px; height: 30px;" class="rounded"/>    
                                </span>    
                                </a>

                            `;
                        }
                        return packageMenu;
                    }

                $('.packageMenu').html(packageElem);
            }

        });
      
        setInterval(function() {
            table.ajax.reload(null, false); 
        }, 10000);

    });
</script>
@endsection
