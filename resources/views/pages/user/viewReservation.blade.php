@extends('layout.userLayout')

@section('title')
    {{ $checkout->name }} 
@endsection

@section('option')
    {{-- <div class="d-flex g-3">
        <a href="{{url('reg/checkout/manage', ['reservationId' => $checkout->id])}}" class="btn btn-sm btn-info mx-2">Manage</a>
        <button class="btn btn-sm btn-danger cancel-reservation" 
        @if (isset($checkout) && $checkout->status > 1)
            disabled
        @endif
        >Cancel</button>
    </div> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Reservation details</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $checkout->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact person</td>
                                        <td>{{ $checkout->contactPerson }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $checkout->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $checkout->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Funcation date</td>
                                        <td>{{ $checkout->functionDate }}</td>
                                    </tr>
                                    <tr>
                                        <td>Start time</td>
                                        <td>{{ $checkout->startTime }}</td>
                                    </tr>
                                    <tr>
                                        <td>Food time</td>
                                        <td>{{ $checkout->foodTime }}</td>
                                    </tr>
                                    <tr>
                                        <td>End time</td>
                                        <td>{{ $checkout->endTime }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of guests</td>
                                        <td>{{ $checkout->numOfGuests }}</td>
                                    </tr>
                                    <tr>
                                        <td>Suggestion</td>
                                        <td>{{ $checkout->suggestion }}</td>
                                    </tr>
                                    <tr>
                                        <td>Payment</td>
                                        <td>
                                             Initial ({{$checkout->initPayment ?? 0}}),
                                             Additional({{$checkout->additionalPayment ?? "?"}})
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Is Fully Paid</td>
                                        <td>
                                            <span class="badge {{$checkout->isFullyPaid === "No" ? 'bg-danger':'bg-success'}}">
                                                {{ $checkout->isFullyPaid }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Status update
                            @if ($checkout->status > 7)
                                <span class="badge bg-danger">Cancelled</span>
                            @endif
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body {{$checkout->status < 8 ? 'userStatusUpdate':''}}" reservationId="{{ $checkout->id }}">
                        @foreach ($givenStatus as $status)
                        @if ($status['status'] <= $checkout->status && $checkout->status < 8)
                            <div class="progress-group mt-3">
                                {{$status['label']}}
                                <span class="float-right"><b>{{$status['percent']}}</b></span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: {{$status['percent']}}"></div>
                                </div>
                            </div>
                        @else
                        <div class="progress progress-xl mt-3 p-3">
                            <div class="progress-bar bg-primary"></div>
                        </div>
                        @endif
                    @endforeach
                    </div>

                </div>

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">More actions</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" reservationId="{{ $checkout->id }}">
                       <div class="row">
                        <a href="{{url('reg/checkout/manage', ['reservationId' => $checkout->id])}}" class="btn btn-md btn-info w-100">Manage</a><br>
                        <button class="btn btn-md btn-danger w-100 mt-3 cancel-reservation" 
                        @if (isset($checkout) && $checkout->status > 1)
                            disabled
                        @endif
                        >Cancel</button>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-4">
                <h6>Regular menus</h6>
                <div class="row">
                    @foreach ($checkout->regular as $regular)
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img src="{{ url('/menus/uploaded/' . $regular->photo) }}" alt="User Image"
                                        style="width: 100%; height: 150px;" />
                                </div>
                                <div class="card-footer p-2">
                                    <span class="text-md">
                                        {{ $regular->name }}
                                    </span><br>
                                    <span class="badge bg-danger " style="font-size: 13px;"> {{ $regular->price }} x
                                        {{ $regular->quantity }} = Php {{ $regular->price * $regular->quantity }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-4">
                <h6>Package menus</h6>
                <div class="row">
                    @foreach ($checkout->package as $package)
                        <div class="col-12 ">
                            <div class="card">
                                <div class="card-header p-1 bg-warning">
                                    <div class="card-title">
                                        {{ $package->name }}
                                    </div>
                                </div>
                                <div class="card-body p-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-tool dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                                Menus({{ $package->menus->count() }})
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu" style="">

                                                @foreach ($package->menus as $menu)
                                                    <a class="dropdown-item" style="font-size: 13px;">{{ $menu->name }}
                                                        <span class="float-right">
                                                            <img src="{{ url('/menus/uploaded/' . $menu->photo) }}"
                                                                alt="User Image" style="width: 27px; height: 27px;"
                                                                class="rounded" />
                                                        </span>
                                                    </a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <span class="text-sm">
                                            Quantity: {{ $package->quantity }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-md-4">
                <h6>Theme</h6>
                <div class="card">
                    <div class="card-body p-0">
                        <img src="{{ url('/themes/uploaded/' . $checkout->theme->theme->photo) }}" alt="User Image"
                            style="width: 100%; max-height: 180px;" class="rounded" />
                    </div>
                    <div class="card-footer p-2">
                        {{ $checkout->theme->theme->theme }}(
                        @if (isset($checkout->theme->subCategory->name))
                            {{ $checkout->theme->subCategory->name }}
                        @else
                            Costumized
                        @endif
                        )
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                text: "{{ session('success') }}",
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


    <div class="modal fade" id="cancel-reservation-modal" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Confirm cancel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure to delete this cancel reservation ?
                </div>
                <div class="modal-footer">
                   <form action="{{route('client-cancel-reservation')}}" method="POST" id="cancel-reservation-form" checkoutId="{{$checkout->id}}">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-danger btn-sm">
                        Yes
                    </button>
                   </form>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
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

@endsection

@section('script')
    <script type="module">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const reservation = $('.userStatusUpdate');
            const id = reservation.attr('reservationId');
            const givenStatus = [{
                    label: 'Pending',
                    percent: '0%',
                    status: 1
                },
                {
                    label: 'Approved',
                    percent: '0%',
                    status: 2
                },
                {
                    label: 'Approved',
                    percent: '25%',
                    status: 3
                },
                {
                    label: 'Approved',
                    percent: '50%',
                    status: 4
                },
                {
                    label: 'Approved',
                    percent: '75%',
                    status: 5
                },
                {
                    label: 'Approved',
                    percent: '100%',
                    status: 6
                },
                {
                    label: 'Reservation ready',
                    percent: '100%',
                    status: 7
                }
            ];

            getStatus(id, givenStatus)

            setInterval(() => {
                getStatus(id, givenStatus)
            }, 3000);

            function getStatus(id, givenStatus) {
                $.ajax({
                    url: `{{ url('/reg/checkouts/getStatusData/${id}') }}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let htmlElem = '';
                        for(let x=0; x<givenStatus.length; x++){
                            const status = givenStatus[x];
                            if(status.status <= response){
                                htmlElem += `
                                  <div class="progress-group mt-3">
                                    ${status.label}
                                    <span class="float-right"><b>${status.percent}</b></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: ${status.percent}"></div>
                                    </div>
                                </div>
                                `;
                            }else{
                                htmlElem += `<div class="progress progress-xl mt-3 p-3">
                            <div class="progress-bar bg-primary"></div>
                        </div>`;
                            }
                            $('.userStatusUpdate').html(htmlElem);
                        }
                    },
                    error: function(err) {
                        getData();
                    }
                });
            }

            $('.cancel-reservation').click(function(){
                $(`#cancel-reservation-modal`).modal('show');
            })

            $('#cancel-reservation-form').submit(function(event){
                event.preventDefault();
                
                const checkoutId = $(this).attr('checkoutId');
                const url = $(this).attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        data: checkoutId
                    },
                    dataType: 'json',
                    success: function(response) {
    
                        Swal.fire({
                            icon: "success",
                            text: "Cancelled succesfully",
                            timer: 3000,
                            willClose: () => {
                                    window.location.href =
                                        "{{ url('/reg/checkouts') }}";
                                }
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: "error",
                            text:  "An unexpected error occurred. Please try again later.",
                            timer: 3000,
                           
                        });
                    }
                });
            })
        })
    </script>
@endsection
