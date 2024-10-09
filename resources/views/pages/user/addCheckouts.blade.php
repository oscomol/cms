@extends('layout.userLayout')

@section('title')
    Create checkout 
@endsection

@section('content')
    <div class="container-fluid ">
        @include('components.user.checkouts.addCheckout')
    </div>

    @include('layout.terms&&Cond')


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


@section('script')
    <script type="module">
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            getData();

            let menuData = [];
            let packageData = [];
            let themeData = [];

            let selectedMenu = [];
            let selectedPackage = [];
            let selectedTheme = {};

            function getData() {
                $.ajax({
                    url: "{{ url('/reg/checkouts/data') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const {
                            packages,
                            regularMenus,
                            themes
                        } = response;
                        menuData = regularMenus;
                        packageData = packages;
                        themeData = themes;
                        displayMenuSelect(menuData);
                        displayPackaged(packageData);
                        displayThemes(themeData)
                    },
                    error: function(err) {
                        getData();
                    }
                });
            }

            $(document).on('click', '.incQuantity', function() {
                
                let menuId = $(this).attr('menuId');
                let quantityElement = $('#quantity-' + menuId);
                let currentQuantity = parseInt(quantityElement.text());

                quantityElement.text(currentQuantity + 1);

                updateSelectedMenu(menuId, currentQuantity + 1);
            });

            $(document).on('click', '.decQuantity', function() {
                
                let menuId = $(this).attr('menuId');
                let quantityElement = $('#quantity-' + menuId);
                let currentQuantity = parseInt(quantityElement.text());

                if (currentQuantity > 0) {
                    quantityElement.text(currentQuantity - 1);
                    updateSelectedMenu(menuId, currentQuantity - 1);
                }
            });
            $(document).on('click', '.decSelectedQuantity', function() {
                let menuId = $(this).attr('menuId');
                let quantityElement = $('#quantity-' + menuId);
                let currentQuantity = parseInt(quantityElement.text());

                if (currentQuantity > 0) {
                    quantityElement.text(currentQuantity - 1);
                    updateSelectedMenu(menuId, currentQuantity - 1);
                }
            });
            $(document).on('click', '.incSelectedQuantity', function() {
                let menuId = $(this).attr('menuId');
                let quantityElement = $('#quantity-' + menuId);
                let currentQuantity = parseInt(quantityElement.text());

                quantityElement.text(currentQuantity + 1);

                updateSelectedMenu(menuId, currentQuantity + 1);
            });

            $(document).on('click', '.incPackageQuantity', function() {
                let packId = $(this).attr('packId');
                let quantityElement = $('#packQuantity-' + packId);
                let currentQuantity = parseInt(quantityElement.text());

                quantityElement.text(currentQuantity + 1);

                updateSelectedPackage(packId, currentQuantity + 1);
            });

            $(document).on('click', '.incPackageQuantity2', function() {
                let packId = $(this).attr('packId');
                let quantityElement = $('#packQuantity-' + packId);
                let currentQuantity = parseInt(quantityElement.text());

                quantityElement.text(currentQuantity + 1);

                updateSelectedPackage(packId, currentQuantity + 1);
            });

            $(document).on('click', '.decPackageQuantity', function() {
                let packId = $(this).attr('packId');
                let quantityElement = $('#packQuantity-' + packId);
                let currentQuantity = parseInt(quantityElement.text());

                if (currentQuantity > 0) {
                    quantityElement.text(currentQuantity - 1);
                }

                updateSelectedPackage(packId, currentQuantity - 1);
            });

            $(document).on('click', '.decPackageQuantity2', function() {
                let packId = $(this).attr('packId');
                let quantityElement = $('#packQuantity-' + packId);
                let currentQuantity = parseInt(quantityElement.text());

                quantityElement.text(currentQuantity - 1);

                updateSelectedPackage(packId, currentQuantity - 1);
            });

            $(document).on('click', '.choose-theme', function() {
                let themeId = $(this).attr('themeId');

                if (selectedTheme?.id) {
                    $(`#choose-theme-${selectedTheme?.id}`).removeClass('text-danger');
                    if (themeId == selectedTheme?.id) {
                        selectedTheme = {};
                    } else {
                        $(`#choose-theme-${themeId}`).addClass('text-danger');
                        const findTheme = themeData.find(theme => theme.id == themeId);
                        if (findTheme) {
                            selectedTheme = {
                                ...findTheme
                            };
                        }
                    }
                } else {
                    $(`#choose-theme-${themeId}`).addClass('text-danger');
                    const findTheme = themeData.find(theme => theme.id == themeId);
                    if (findTheme) {
                        selectedTheme = {
                            ...findTheme
                        };
                    }
                }

                displaySelectedTheme(selectedTheme)
            });

            $(document).on('click', '.choose-selected-theme', function() {
                if (selectedTheme?.id) {
                    $(`#choose-theme-${selectedTheme?.id}`).removeClass('text-danger');
                }
                selectedTheme = {};
                displaySelectedTheme(selectedTheme)
            });

            $(document).on('click', '.subcategorySelect', function() {
                if (selectedTheme?.id) {
                    $(`#choose-theme-${selectedTheme?.id}`).removeClass('text-danger');
                }
                selectedTheme = {};
                const subCategoryId = $(this).attr('subcategoryId')
                const categoryId = $(this).attr('categoryId')
                $(`#choose-theme-${categoryId}`).addClass('text-danger');
                const findTheme = themeData.find(theme => theme.id == categoryId);
                if (findTheme) {
                    selectedTheme = {
                        ...findTheme,
                        selectedSubCat: subCategoryId
                    };
                    displaySelectedTheme(selectedTheme)
                }

            });


            function updateSelectedPackage(packId, newQuantity) {
                const packageIndex = selectedPackage.findIndex(pack => pack.id == packId);
                const selected = packageData.find(pack => pack.id == packId);

                if (packageIndex > -1) {
                    if (newQuantity > 0) {
                        selectedPackage[packageIndex].quantity = newQuantity;
                    } else {
                        selectedPackage.splice(packageIndex, 1);
                    }
                } else if (selected && newQuantity > 0) {
                    selectedPackage.push({
                        ...selected,
                        quantity: newQuantity
                    });
                }

                let selectedPackages = '';
                for (let x = 0; x < selectedPackage.length; x++) {
                    selectedPackages += dispaySelectedPackage(selectedPackage[x]);
                }

                $('.selected-package-menu').html(selectedPackages);
                hasMenus()
            }

            function updateSelectedMenu(menuId, newQuantity) {
                const menuIndex = selectedMenu.findIndex(menu => menu.id == menuId);
                const selected = menuData.find(menu => menu.id == menuId);

                if (menuIndex > -1) {
                    if (newQuantity > 0) {
                        selectedMenu[menuIndex].quantity = newQuantity;
                    } else {
                        selectedMenu.splice(menuIndex, 1);
                    }
                } else if (selected && newQuantity > 0) {
                    selectedMenu.push({
                        ...selected,
                        quantity: newQuantity
                    });
                }

                let selectedRegMenu = "";
                for (let x = 0; x < selectedMenu.length; x++) {
                    selectedRegMenu += displayMenuSelected(selectedMenu[x]);
                }
                $('.selected-reg-menu').html(selectedRegMenu);
                hasMenus()
            }

            $('#policy').change(function() {
                hasMenus()
            });

            function hasMenus() {
                const isAgree = $('#policy').val();

                var isChecked = $('#policy').is(':checked');

                if ((selectedMenu?.length || selectedPackage?.length) && isChecked) {
                    $('#submitFormCheck').prop('disabled', false);
                } else {
                    $('#submitFormCheck').prop('disabled', true);
                }
            }

            $('#submitFormCheck').click(function() {
                let initialAmount = 0;
                if (selectedMenu?.length) {
                    for (let x = 0; x < selectedMenu.length; x++) {
                        initialAmount += selectedMenu[x].price * selectedMenu[x].quantity;
                    }
                }
                $('#confirm-text').text(initialAmount > 0 ?
                    `Are you sure to continue with initial amount of ${initialAmount} ?` :
                    'Are you sure to continue ?')
                $('#confirm-checkout').modal('show');
            })

            $('.checkoutForm').submit(function(event) {
                event.preventDefault();
                $(this).find('#submitFormCheck').prop('disabled', true).text('Submitting...')
                $(this).find('#confirmCheckOut').prop('disabled', true).text('Submitting...')
                const formData = new FormData(this);
                const name = formData.get('name');
                const contactPerson = formData.get('contactPerson');
                const phone = formData.get('phone');
                const email = formData.get('email');
                const functionDate = formData.get('functionDate');
                const startTime = formData.get('startTime');
                const foodTime = formData.get('foodTime');
                const endTime = formData.get('endTime');
                const functionType = formData.get('functionType');
                const numOfGuests = formData.get('numOfGuests');
                const suggestion = formData.get('suggestion');
                const isSurprised = formData.get('isSurprised');

                let menus = null;
                let packages = null;
                let theme = null;
                let initialAmount = null;

                if (selectedMenu?.length) {
                    menus = selectedMenu.map(menu => {
                        initialAmount += menu.price * menu.quantity;
                        return {
                            menuId: menu.id,
                            quantity: menu.quantity
                        }
                    });
                }

                if (selectedPackage?.length) {
                    packages = selectedPackage.map(pack => {
                        return {
                            packageId: pack.id,
                            quantity: pack.quantity
                        }
                    });
                }

                if (selectedTheme?.id) {
                    theme = {
                        themeId: selectedTheme.id,
                        subCategory: selectedTheme?.selectedSubCat ?? null
                    };
                }

                const data = {
                    name,
                    contactPerson,
                    phone,
                    email,
                    functionDate,
                    startTime,
                    foodTime,
                    endTime,
                    functionType,
                    numOfGuests,
                    suggestion,
                    isSurprised,
                    menus,
                    packages,
                    theme,
                    initialAmount
                };

                if (data) {
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: data,
                        dataType: 'json',
                        success: function(response) {
                            selectedMenu = [];
                            selectedPackage = [];
                            selectedTheme = {};
                            $('.checkoutForm')[0].reset();

                            Swal.fire({
                                icon: "success",
                                text: response,
                                timer: 3000,
                                willClose: () => {
                                    window.location.href =
                                        "{{ url('/reg/checkouts') }}";
                                }
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: "error",
                                text: xhr.responseJSON && xhr.responseJSON.error ? xhr
                                    .responseJSON.error :
                                    "An unexpected error occurred. Please try again later.",
                                timer: 3000
                            });
                        }
                    });

                }

            })

            $('#clearForm').click(function() {
                $('.checkoutForm')[0].reset();
            })


        });

        const baseUrl = "{{ url('/menus/uploaded/') }}";
        const themeUrl = "{{ url('/themes/uploaded/') }}";

        function displaySubTheme(theme) {
            let htmlElem = '';

            if (theme.type === "Package") {
                if (theme?.subCategory?.length) {
                    htmlElem = `<div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                Category
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                ${displaySubcategory(theme?.subCategory)}
                            </div>
                        </div>`;

                    function displaySubcategory(subCategory) {
                        let subCategoryElem = '';
                        for (let x = 0; x < subCategory.length; x++) {
                            subCategoryElem += `
                                <a class="dropdown-item subcategorySelect ${(theme?.selectedSubCat && theme?.selectedSubCat == subCategory[x].id) ? 'bg-warning':''}" id="subcategory-${subCategory[x].id}" subcategoryId="${subCategory[x].id}" categoryId="${theme.id}">
                                <span style="font-size: 13px;">
                                ${subCategory[x].name}
                                <span class="float-right">
                                     <img src="${themeUrl}/${subCategory[x].photo}" alt="User Image" style="width: 30px; height: 30px;"/>
                                </span>
                                </span>    
                                </a>
                                `
                        }
                        return subCategoryElem;
                    }

                } else {
                    htmlElem = '<span style="font-size: 13px;">Package</span>'
                }
            } else {
                htmlElem = '<span style="font-size: 13px;">Costumize</span>'
            }

            return htmlElem;
        }

        function displaySelectedTheme(theme) {
            let themeElem = '';

            if (theme?.theme) {
                themeElem = `
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-header bg-warning p-1">
                                <div class="card-title" style="font-size: 16px;">
                                    ${theme.theme}
                                </div>
                            </div>
                             <div class="card-body p-0">
                                    <img src="${themeUrl}/${theme.photo}" alt="User Image" style="width: 100%; height: 80px;"/>
                            </div>
                            <div class="card-footer px-2 py-1">
                                <div class="d-flex justify-content-between">
                                    
                                ${displaySubTheme(theme)}
                                    <span  style="font-size: 13px;" id="choose-selected-theme-${theme.id}" class="choose-selected-theme text-danger" themeId="${theme.id}">
                                        <li class="fa fa-heart"></li>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

            } else {
                theme = '';
            }

            $('.selected-theme').html(themeElem);
        }

        function displayThemes(themes) {
            let availThemes = '';
            for (let x = 0; x < themes.length; x++) {
                const theme = themes[x];
                availThemes += `
                    <div class="col-6 col-md-3">
                        <div class="card">
                            <div class="card-header bg-warning p-1">
                                <div class="card-title" style="font-size: 16px;">
                                    ${theme.theme}
                                </div>
                            </div>
                             <div class="card-body p-0">
                                    <img src="${themeUrl}/${theme.photo}" alt="User Image" style="width: 100%; height: 80px;"/>
                            </div>
                            <div class="card-footer px-2 py-1">
                                <div class="d-flex justify-content-between">
                                    
                                ${displaySubTheme(theme)}
                                    <span  style="font-size: 13px;" id="choose-theme-${theme.id}" class="choose-theme" themeId="${theme.id}">
                                        <li class="fa fa-heart"></li>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            }
            $('.theme-store').html(availThemes);
        }

        function displayMenuSelect(menu) {

            let menuList = '';
            for (let x = 0; x < menu.length; x++) {
                const men = menu[x];
                menuList += `
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="${baseUrl}/${men.photo}" alt="User Image" style="width: 100%; height: 100px;" class="rounded"/>
                            </div>
                            <div class="card-footer px-2 py-1">
                                <span>${men.name}</span><br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-danger">${men.price}</span>
                                    <span style="cursor:pointer;">
                                        <span id="dec-${men.id}" menuId="${men.id}" class="decQuantity">-</span>
                                        <span id="quantity-${men.id}" class="quantity mx-2">0</span>
                                        <span id="inc-${men.id}" menuId="${men.id}" class="incQuantity">+</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;

            }
            $('.menu-store').html(menuList);

        }

        function displayMenuSelected(men) {
            return `
                    <div class="col-6 col-sm-4 col-md-3">
                        <div class="card">
                            <div class="card-body p-0">
                                <img src="${baseUrl}/${men.photo}" alt="User Image" style="width: 100%; height: 100px;" class="rounded"/>
                            </div>
                            <div class="card-footer px-2 py-1">
                                <span>${men.name}</span> <br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-danger">${men.price}</span>
                                    <span style="cursor:pointer;">
                                        <span id="dec-selected-${men.id}" menuId="${men.id}" class="decSelectedQuantity">-</span>
                                        <span id="quantity-selected-${men.id}" class="selectedQuantity mx-2">${men.quantity}</span>
                                        <span id="inc-selected-${men.id}" menuId="${men.id}" class="incSelectedQuantity">+</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
        }

        function displayPackageMenu(menu) {
            let packageMenu = '';

            for (let x = 0; x < menu.length; x++) {
                const men = menu[x];
                packageMenu += `
                        <a href="#" class="dropdown-item" style="font-size: 13px;">${men.name}
                        <span class="float-right">
                            <img src="${baseUrl}/${men.photo}" alt="User Image" style="width: 30px; height: 30px;" class="rounded"/>    
                        </span>    
                        </a>

                    `;
            }

            return packageMenu;
        }

        function displayPackaged(packages) {
            let packageMenu = '';
            for (let x = 0; x < packages.length; x++) {
                const pack = packages[x];
                packageMenu += `
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card">
                            <div class="card-header bg-warning p-1">
                                <div class="card-title" style="font-size: 16px;">
                                    ${pack.name}
                                </div>
                            </div>
                            <div class="card-footer p-0 pr-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn text-light dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Menus(${pack?.menus?.length})
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            ${displayPackageMenu(pack.menus)}
                                        </div>
                                    </div>

                                    <span style="cursor: pointer;">
                                        <span id="dec-Pack-${pack.id}" packId="${pack.id}" class="decPackageQuantity">-</span>    
                                        <span id="packQuantity-${pack.id}" class="mx-2" class="packQuantity mx-2">0</span>    
                                        <span id="inc-Pack-${pack.id}" packId="${pack.id}" class="incPackageQuantity">+</span> 
                                    </span>

                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                `;
            }
            $('.package-store').html(packageMenu);
        }

        function dispaySelectedPackage(pack) {
            return `
             <div class="col-12 col-sm-6 col-md-4">
                        <div class="card">
                            <div class="card-header bg-warning p-1">
                                <div class="card-title" style="font-size: 16px;">
                                    ${pack.name}
                                </div>
                            </div>
                            <div class="card-footer p-0 pr-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn text-light dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Menus(${pack?.menus?.length})
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            ${displayPackageMenu(pack.menus)}
                                        </div>
                                    </div>

                                    <span style="cursor: pointer;">
                                          <span id="dec-Pack2-${pack.id}" packId="${pack.id}" class="decPackageQuantity2">-</span>   
                                        <span id="packQuantity2-${pack.id}" class="packQuantity2 mx-2">${pack.quantity}</span>    
                                        <span id="inc-Pack2-${pack.id}" packId="${pack.id}" class="incPackageQuantity2">+</span>
                                    </span>

                                </div>
                                
                                
                            </div>
                        </div>
                    </div>`
        }
    </script>
@endsection
