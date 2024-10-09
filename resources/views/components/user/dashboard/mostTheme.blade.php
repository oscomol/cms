<div class="mt-3">
    <h6>Themes</h6>
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
                      <a href="{{route('user-theme')}}" class="text-info" style="margin-top: 10px;">More</a>
                  </div>
              </div>
          </div>
      </div>
         @endforeach
    </div>

</div>