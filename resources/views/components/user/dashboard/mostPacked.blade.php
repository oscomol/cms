<div class="mt-3">
    <h6>Package Menus</h6>

    <div class="row">
        @foreach ($packs as $pack)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card card-widget widget-user-2 shadow-sm">

                <div class="widget-user-header bg-warning py-0" style="line-height: 10px;">
                    <h6 class="widget-user-username text-lg" style="margin-left: -7px;">{{$pack->name}}</h6>
                    <p  style="margin-left: -7px;" class="text-md">{{$pack->description}}</p>
                </div>
                <div class="card-footer p-0">
                    <ul class="nav flex-column">
                        @foreach ($pack->menus as $menu)
                        <li class="nav-item">
                            <a class="nav-link text-light text-sm">
                                {{$menu->name}} 
                                @if ($menu->photo !== "NA")
                                <span class="float-right">
                                    <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>
                                </span>
                                @endif
                            </a>
                        </li>
                        @endforeach
                        <li class="nav-item d-flex justify-content-between align-items-center">
                            <label style="font-size: 13px;" class="pl-2 mt-2">Sold: {{$pack->sold}}</label>
                            <a class="nav-link float-right text-light text-sm" href="{{ route('packed-category-menu', ['category' => $pack->category]) }}">
                                View more
                            </a>                            
                        </li>
                        
                    </ul>
                </div>
            </div>


        </div>
    @endforeach
    </div>

</div>
