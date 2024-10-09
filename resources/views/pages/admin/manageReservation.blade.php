@extends('layout.adminLayout')

@section('title')
    {{ $checkout->name }} 
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
                    <div class="card-body">
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
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <form action="{{route('statusUpdate-admin')}}" method="POST">
                                @csrf
                                @method('put')
                                <input type="hidden" name="updateStatus" value="{{$checkout->status - 1}}"/>
                                <input type="hidden" name="reservationId" value="{{$checkout->id}}"/>
                                    <button type="submit" class="btn btn-sm btn btn-secondary" {{ ($checkout->status < 3 || $checkout->status > 7) ? 'disabled':'' }}>
                                        Previous
                                    </button>
                               </form>

                          @if ($checkout->status === 1)
                          <form action="{{route('statusUpdate-admin')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal fade" id="additional-payment" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-default-label">Additional payment form</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="additionalPayment">Leave blank if no additonal payment</label>
                                                <input type="number" class="form-control" id="additionalPayment" name="additionalPayment">
                                            </div>
                        
                                            <input type="hidden" name="updateStatus" value="{{$checkout->status + 1}}"/>
                                            <input type="hidden" name="reservationId" value="{{$checkout->id}}"/>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Save
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </form>
                           <button type="button" class="btn btn-sm btn btn-success additional-payment-next-btn" {{ $checkout->status > 6 ? 'disabled':'' }} data-toggle="modal" 
                            data-target="additional-payment">
                            Next
                        </button>

                          @else
                          <form action="{{route('statusUpdate-admin')}}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="updateStatus" value="{{$checkout->status + 1}}"/>
                            <input type="hidden" name="reservationId" value="{{$checkout->id}}"/>
                                <button type="submit" class="btn btn-sm btn btn-success" {{ $checkout->status > 6 ? 'disabled':'' }}>
                                    Next
                                </button>
                           </form>
                          @endif
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Cancel Reservation</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body pt-3">
                        @if ($checkout->status < 3 && $checkout->isFullyPaid === "No")
                        If you feel doubt about this, you can still cancel it by <span class="text-danger" style="font-size: 17px; cursor: pointer;" data-toggle="modal" 
                        data-target="#cancel-admin-reservation">
                            clicking here!
                        </span>

                        <form action="{{route('statusUpdate-admin')}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="modal fade" id="cancel-admin-reservation" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-default-label">Confirm Cancel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to cancel reservation ?
                                            <input type="hidden" name="updateStatus" value="{{8}}"/>
                                            <input type="hidden" name="reservationId" value="{{$checkout->id}}"/>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Save
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </form>


                        @else
                            Unable to cancel. Reservation paid and approved!
                        @endif
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
                        <div class="col-12">
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
@endsection

@section('script')
    <script type="module">
        $(function(){
            $('.additional-payment-next-btn').click(function(){
               $('#additional-payment').modal('show');
            })
        })
    </script>
@endsection