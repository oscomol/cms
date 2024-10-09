@extends('layout.userLayout')

@section('title')
    Themes 
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($themes as $theme)
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="card-body p-0">
                            <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" alt="User Image"
                                style="width: 100%; height: 160px;" class="rounded" />
                        </div>
                        <div class="card-footer p-2">
                            <h6 class="text-md">{{ $theme->theme }}</h6>
                            <p class="text-sm" style="margin-top: -4px;">{{ $theme->slicedDes }}</p>
                            <div class="d-flex justify-content-between pr-2" style="margin-top: -10px;">
                                @if ($theme->type === 'Package')
                                    <div class="btn-group" style="margin-left: -7px;">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Subcategory({{ $theme->subCategory->count() }})
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                            @foreach ($theme->subCategory as $item)
                                                <a href="#" class="dropdown-item">
                                                    <span style="font-size: 12px;">{{ $item->name }}</span>
                                                    <img src="{{ url('/themes/uploaded/' . $item->photo) }}"
                                                        alt="User Image" style="width: 25px; height: 25px;"
                                                        class="float-right rounded" />
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="mt-2">
                                        {{ $theme->type }}
                                    </div>
                                @endif
                                <label class="text-info" style="margin-top: 10px;" data-toggle="modal" data-target="#reg-theme-view-{{ $theme->id }}">More</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="reg-theme-view-{{ $theme->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default-label" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-default-label">Theme</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" alt="User Image"
                                    style="width: 100%; max-height: 200px;" class="rounded" />
                                <h6 class="text-md">{{ $theme->theme }}
                                    @if ($theme->type === 'Cuztomizable')
                                        (Cuztomizable)
                                    @endif
                                </h6>
                                <p class="text-sm">{{ $theme->description }}</p>

                                @if ($theme->type === 'Package')

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
                                        @foreach ($theme->subCategory as $item)
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="{{ url('/themes/uploaded/' . $item->photo) }}" alt="Product Image" class="img-size-50">
                                                </div>
                                                <div class="product-info">
                                                    <a href="javascript:void(0)" class="product-title">{{$item->name}}</a>
                                                    <span class="product-description">
                                                        {{$item->description}}
                                                    </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                </div>
                                @endif


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
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
