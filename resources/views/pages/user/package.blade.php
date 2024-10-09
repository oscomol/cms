@extends('layout.userLayout')

@section('title')
    Packages 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($packages as $package)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body pb-0 ">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-body p-2">
                                            <img src="{{ url('/themes/uploaded/' . $package->theme->photo) }}"
                                                alt="User Image" style="width: 100%; height: 140px;" class="rounded" />
                                        </div>
                                        <div class="card-footer pb-0 px-2 pt-2" style="line-height: 15px;">
                                            <h6 class="text-md">{{ $package->theme->theme }}</h6>
                                            <p class="text-sm">
                                                @if (isset($package->theme->description))
                                                    @if (strlen($package->theme->description) > 35)
                                                        {{ substr($package->theme->description, 0, 30) }}...
                                                    @else
                                                        {{ $package->theme->description }}
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="row">
                                        @foreach ($package->menus as $menu)
                                            @if ($loop->index < 3)
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-body pb-0 px-2 pt-2">
                                                            <img src="{{ url('/menus/uploaded/' . $menu->photo) }}"
                                                                alt="User Image" style="width: 100%; height: 52px;"
                                                                class="rounded" />
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer p-2 text-sm" style="font-size: 12px;">
                                                            @if (isset($menu->name))
                                                                @if (strlen($menu->name) > 15)
                                                                    {{ substr($menu->name, 0, 12) }}..
                                                                @else
                                                                    {{ $menu->name }}
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <!-- /.card-footer -->
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($loop->index === 3)
                                                <div class="col-6">
                                                    <div class="card">
                                                        <div class="card-body d-flex justify-content-center align-items-center"
                                                            style="min-height: 96px;">
                                                            And more
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer pb-0">
                            <div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="text-md">{{ $package->name }}</h6>
                                    <label class="text-info" data-toggle="modal"
                                        data-target="#reg-view-package-{{ $package->id }}">More</label>
                                </div>
                                <p class="text-sm">
                                    @if (isset($package->description))
                                        @if (strlen($package->description) > 90)
                                            {{ substr($package->description, 0, 87) }}...
                                        @else
                                            {{ $package->description }}
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>





                </div>



                <div class="modal fade" id="reg-view-package-{{ $package->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-default-label">Viewing package</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="card">
                                    <div class="card-body p-2">
                                        <img src="{{ url('/themes/uploaded/' . $package->theme->photo) }}" alt="User Image"
                                            style="width: 100%; max-height: 200px;" class="rounded" />
                                    </div>
                                    <div class="card-footer pb-0 px-2 pt-2">
                                        <h6 class="text-md">{{ $package->theme->theme }}</h6>
                                        <p class="text-sm">
                                            {{ $package->theme->description }}
                                        </p>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            Menus
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($package->menus as $menu)
                                                <div class="col-6 col-sm-4">
                                                    <div class="card">
                                                        <div class="card-body pb-0 px-2 pt-2">
                                                            <img src="{{ url('/menus/uploaded/' . $menu->photo) }}"
                                                                alt="User Image" style="width: 100%; height: 52px;"
                                                                class="rounded" />
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer p-2 text-sm" style="font-size: 12px;">
                                                            @if (isset($menu->name))
                                                                @if (strlen($menu->name) > 15)
                                                                    {{ substr($menu->name, 0, 12) }}..
                                                                @else
                                                                    {{ $menu->name }}
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <!-- /.card-footer -->
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Package details</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Package Name: </th>
                                                        <td>{{$package->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Allowed Individuals: </th>
                                                        <td>{{$package->allowedIndividuals}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Details: </th>
                                                        <td>{{$package->description}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
