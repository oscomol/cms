<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Recently Added Reservations</h3>

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
                    <table id="recentReservation" class="table m-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contact Person</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentReservations as $reserve)
                                <tr>
                                    <th>{{ $reserve->name }}</th>
                                    <td>{{ $reserve->contactPerson }}</td>
                                    <td>{{ $reserve->email }}</td>
                                    <td>{{ $reserve->phone }}</td>
                                    <td>{{ $reserve->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>
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
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach ($topMenus as $item)
                        <li class="item">
                            <div class="product-img">
                                <img src="{{ url('/menus/uploaded/' . $item['menu']->photo) }}" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">{{$item['menu']->name}}
                                    <span class="badge badge-warning float-right">{{ $item['total_quantity'] }} sold</span></a>
                                <span class="product-description">
                                    {{$item['menu']->description}}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
