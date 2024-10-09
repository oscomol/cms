<div class="card">
    <div class="card-header">
        <div class="card-title">
           Theme
        </div>
    </div>
    <div class="card-body">
        <div class="row themeSelectedContainer">
            <div class="col-6 col-md-4 themeCurSelected">
                <div class="card">
                    <div class="card-header bg-warning p-1">
                        <div class="card-title" style="font-size: 16px;">
                           {{$themes->theme}}
                        </div>
                    </div>
                     <div class="card-body p-0">
                            <img src="{{ url('/themes/uploaded/' . $themes->photo) }}" alt="User Image" style="width: 100%; height: 160px;" class="rounded"/>
                    </div>
                    <div class="card-footer p-2">
                        <div class="d-flex justify-content-between">
                            @if ($themes->selectedSubCategory)
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    @foreach ($themes->subCategory as $theme)
                                        <a id="theme-update-{{$theme->id}}" class="dropdown-item {{$theme->id == $themes->selectedSubCategory ? 'bg-warning':'theme-update'}}" style="font-size: 13px;" themeId={{$themes->id}} subCategoryId="{{$theme->id}}">{{$theme->name}}
                                            <span class="float-right">
                                                <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>   
                                            </span>    
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <span>
                                <li class="fa fa-heart text-md text-danger active-update-heart"></li>
                            </span>
                            @else
                            <span class="text-md">Costumize</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Theme list
                </div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row ">
                    @foreach ($allThemes as $soSelectedTheme)
                    <div class="col-6 col-md-4" id="available-theme-update-{{$soSelectedTheme->id}}">
                        <div class="card">
                            <div class="card-header bg-warning p-1">
                                <div class="card-title" style="font-size: 16px;">
                                   {{$soSelectedTheme->theme}}
                                </div>
                            </div>
                             <div class="card-body p-0">
                                    <img src="{{ url('/themes/uploaded/' . $soSelectedTheme->photo) }}" alt="User Image" style="width: 100%; height: 160px;" class="rounded"/>
                            </div>
                            <div class="card-footer p-2">
                                <div class="d-flex justify-content-between">
                                    @if ($soSelectedTheme->subCategory)
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Category
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            @foreach ($soSelectedTheme->subCategory as $subCategory)
                                                <a id="theme-update-{{$subCategory->id}}" class="dropdown-item" style="font-size: 13px;">{{$subCategory->name}}
                                                    <span class="float-right">
                                                        <img src="{{ url('/themes/uploaded/' . $subCategory->photo) }}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>   
                                                    </span>    
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <span class="text-md">Costumize</span>
                                    @endif
                                    <span id="update-new-theme-select-{{$soSelectedTheme->id}}" themeId="{{$soSelectedTheme}}" class="update-new-theme-select">
                                        <li class="fa fa-heart text-md"></li>
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
        <div class="float-right " >
            <button class="btn btn-sm btn-success updateThemeRecords" disabled>
                Save changes
            </button>
        </div>
    </div>

</div>