<div class="mt-3">
    <h6>Regular Menus</h6>

    <div class="row">
         @foreach ($menus as $menu)
         <div class="col-6 col-md-4 col-lg-3">
          <div class="card">
              <div class="card-body p-0">
                
                  <img src="{{ url('/menus/uploaded/' . $menu->photo) }}" alt="User Image" style="width: 100%; height: 150px;" class="rounded"/>
   
              </div>
              <div class="card-footer p-2">
                <h6 >{{$menu->name}}</h6>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="badge bg-danger">Php {{$menu->price}}</span>
                  <label class="float-right mt-2" style="font-size: 13px;">Sold: {{$menu->sold}}</label>
                </div>
               
              </div>
            </div>
      </div>
         @endforeach
    </div>

</div>