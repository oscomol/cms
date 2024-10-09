<div class="card">

    <div class="card-header">
        <div class="card-title">
            Regular menus
        </div>
    </div>
    <div class="card-body">
        <div class="row orderedMenus">
            @foreach ($regular as $menu)
            <div class="col-12 col-sm-4 col-md-3" id="selected-menu-update-{{$menu->id}}">
                <div class="card" >
                    <div class="card-body p-0">
                        <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%; height: 120px;" class="rounded"/>
                    </div>
                    <div class="card-footer px-2 py-1">
                        <span class="text-md">{{$menu->name}} {{$menu->id}}</span>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-danger badge-sm">Php {{$menu->price}}</span>
                            <span class="text-md" style="cursor: pointer;">
                                
                                <span id="regularMenuDecUpdateQuantity-{{$menu->id}}" class="text-md regularMenuDecUpdateQuantity" menuId="{{$menu->id}}" reservationId="{{$checkout->id}}">-</span>
                                <span class="text-md mx-2 regularMenuUpdateQuantity" id="regularMenuUpdateQuantity-{{$menu->id}}">{{$menu->quantity}}</span>
                                <span id="regularMenuIncUpdateQuantity-{{$menu->id}}" class="text-md regularMenuIncUpdateQuantity" menuId="{{$menu->id}}" reservationId="{{$checkout->id}}">+</span>
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
                    @foreach ($menus as $menu)
                    <div class="col-12 col-sm-4 col-md-3" id="update-reg-reg-menu-{{$menu->id}}">
                        <div class="card" >
                            <div class="card-body p-0">
                                <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%; height: 120px;" class="rounded"/>
                            </div>
                            <div class="card-footer px-2 py-1">
                                <span class="text-md" id="update-name-reg-menu-{{$menu->id}}">{{$menu->name}}</span>
                                <input type="hidden"  id="update-price-reg-menu-{{$menu->id}}" value="{{$menu->price}}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-danger badge-sm">Php {{$menu->price}}</span>
                                    <span id="update-add-reg-menu-{{$menu->id}}" class="update-add-reg-menu" menuId="{{$menu->id}}">
                                        <li class="fa fa-plus"></li>
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
        <div class="float-right">
            <button class="btn btn-sm btn-success updateRegularRecords" disabled>Save changes</button>
        </div>
    </div>

</div>