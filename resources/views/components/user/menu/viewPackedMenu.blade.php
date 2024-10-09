<div class="modal fade" id="view-packed-menu-{{ $pack->id }}" tabindex="-1" role="dialog"
    aria-labelledby="modal-default-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-default-label"> {{ ucfirst($category) }} menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card">
                  
                    <div class="card-body">
                        <div class="row">
                            @foreach ($pack->menus as $menu)
                            @if (isset($menu->id))
                            <div class="col-6 col-sm-4">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%; height: 90px;" class="rounded"/>
                                    </div>
                                    <div class="card-footer p-2 text-sm">
                                        {{$menu->name}}
                                    </div>
                                    
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                   
                    <div class="card-footer">
                        <h3 class="card-title text-md">{{ $pack->name }}</h3><br>
                        <p class="text-sm">{{$pack->description}}
                            <br>
                            Get it for only <span class="badge badge-danger">Php {{ $pack->price }}</span>
                        </p>
                    </div>
                    
                  </div>
                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
