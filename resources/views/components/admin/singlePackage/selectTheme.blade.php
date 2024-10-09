<div class="container-fluid">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Select theme
                   (
                    @if ($selectedTheme)
                        {{$selectedTheme->theme}}
                        @if (isset($selectedTheme->subCategory))
                            : {{$selectedTheme->subCategory->name}}
                        @endif
                    @else
                        None
                    @endif
                   )
                </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
    
            <div class="card-body">
                <table id="selectThemeTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Theme</th>
                            <th>Subcategory</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="themeData">
                        @foreach ($themes as $theme)
                      
                            <tr id="select-theme-row-{{$theme->id}}"
                                class="{{ isset($selectedTheme) && $theme->id === $selectedTheme->id ? 'bg-warning' : '' }} selectedThemeRow"
                                >
                                <td >
                                    <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" alt="User Image" style="width: 35px; height: 35px;"/>
                                </td>
                                <td>{{ $theme->theme }}</td>

                                <td>
                                    {{$theme->type}}
                                </td>

                                <td>

                                    @if ($theme->type === "Package")
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown">
                                            <button class="btn btn-sm btn btn-info select-theme" data-toggle="dropdown" aria-expanded="false" id="select-theme-{{$theme->id}}" rowType="{{$theme->type}}" rowId="{{$theme->id}}">Select</button>
                                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                                    
                                                    <h6 class="pl-2 pt-2">Select subcategory</h6>
                                                    @foreach ($theme->subCategory as $subcategory)

                                                    <button class="dropdown-item subTheme {{(isset($selectedTheme->subCategory->id) && $selectedTheme->subCategory->id === $subcategory->id) ? 'bg-warning':''}}" id="subTheme-{{$subcategory->id}}" subcategory="{{$subcategory->id}}">
                                                        <img src="{{ url('/themes/uploaded/' . $theme->photo) }}" alt="User Image" style="width: 30px; height: 30px; margin-right: 4px;"/>
                                                         {{$subcategory->name}}
                                                    </button>

                                    
                                                    <div class="dropdown-divider"></div>
                                                    @endforeach
                                             </div>
                                        </li>
                                    </ul>

                                        
                                    @else
                                        <button class="btn btn-sm btn-info select-theme"  {{ isset($selectedTheme) && $theme->id === $selectedTheme->id ? 'disabled' : '' }} id="select-theme-{{$theme->id}}" rowId={{$theme->id}}>
                                            Select
                                        </button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <form action="{{ route('select-theme', ['packageId' => $packageId]) }}"
                    method="POST" class="selectedform">
                    @csrf
                    @method('post')
                    <input type="hidden" class="selected-theme-inp" name="themeId"/>
                    <input type="hidden" class="selected-subCategoryId-inp" name="subCategoryId"/>
                    <button type="submit" class="btn btn-success btn-sm float-right" id="selectThemeBtn" disabled>Submit</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .select-theme {
    z-index: 1000 !important; /* Ensure the dropdown is in front */
}
    </style>