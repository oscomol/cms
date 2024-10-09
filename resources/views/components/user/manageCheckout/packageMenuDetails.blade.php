<div class="card">
    <div class="card-header">
        <div class="card-title">
            Package menus
        </div>
    </div>
    <div class="card-body">
        <div class="row packageMenuUpdteContainer">
            @foreach ($packages as $package)
            <div class="col-6 col-md-2">
                <div class="card">
                    <div class="card-header bg-warning p-1">
                        <div class="card-title" style="font-size: 16px;">
                            {{$package->name}}{{$package->id}}
                        </div>
                    </div>
                    <div class="card-footer p-0 pr-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Menus({{$package->menus->count()}})
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    @foreach ($package->menus as $menu)
                                        <a class="dropdown-item" style="font-size: 13px;">{{$menu->name}}
                                            <span class="float-right">
                                                <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>   
                                            </span>    
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <span style="cursor: pointer;">
                                  <span id="dec-update-pack-{{$package->id}}" packId="{{$package->id}}" class="dec-update-pack">-</span>   
                                <span id="packUpdateQuantity2-{{$package->id}}" class="packUpdateQuantity2 mx-2">{{$package->quantity}}</span>    
                                <span id="inc-update-pack-{{$package->id}}" packId="{{$package->id}}" class="inc-update-pack">+</span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Menu list
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($allPackages as $package)
                    <div class="col-12 col-sm-4 col-md-3" id="package-update-card-{{$package->id}}">
                        <div class="card">
                            <div class="card-header bg-warning p-1">
                                <div class="card-title" style="font-size: 16px;">
                                    {{$package->name}}
                                </div>
                            </div>
                            <div class="card-footer p-0 pr-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Menus({{$package->menus->count()}})
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            @foreach ($package->menus as $menu)
                                                <a class="dropdown-item" style="font-size: 13px;">{{$menu->name}}
                                                    <span class="float-right">
                                                        <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>   
                                                    </span>    
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <span style="cursor: pointer;">
                                         <span class="package-update-add-new" id="package-update-add-new-{{$package->id}}" packageId="{{$package->id}}">
                                            <li class="fa fa-plus"></li>
                                         </span>
                                    </span>
        
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
    <div class="card-footer">
        <div class=" float-right" >
            <button class="btn btn-sm btn-success updatePackageRecords" disabled>Save changes</button>
        </div>
    </div>

</div>