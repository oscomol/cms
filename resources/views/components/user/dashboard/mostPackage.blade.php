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
                <h6 class="text-md">{{ $package->name }}</h6>
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
  @endforeach
</div>
