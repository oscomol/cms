@extends('layout.userLayout')

@section('title')
    Manage Checkout 
@endsection

@section('content')
    <input type="hidden" id="reservationIdG" value="{{ $checkout->id }}">
    <div class="container-fluid">
        @include('components.user.manageCheckout.checkoutDetails')
        @include('components.user.manageCheckout.regularMenuDetails')
        @include('components.user.manageCheckout.packageMenuDetails')
        @include('components.user.manageCheckout.themeDetails')
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                text: "{{ session('success') }}",
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

           

            $('#confirmCheckoutUpdateBtn').click(function() {
                $('#confirm-checkout-update').modal('show');
            })

            $(".checkoutDetailsFormUpdate").submit(function() {
                $("#confirmCheckOutBtnUpdate").prop('disabled', true).text('Updating...')
            });

            let regularMenuChanges = [];
            let newAddedMenu = [];

            $('.regularMenuDecUpdateQuantity').click(function() {
                const menuId = $(this).attr('menuId');
                const reservationId = $(this).attr('reservationId');
                updateQuantities(-1, menuId, reservationId);
            });

            $('.regularMenuIncUpdateQuantity').click(function() {
                const menuId = $(this).attr('menuId');
                const reservationId = $(this).attr('reservationId');
                updateQuantities(1, menuId, reservationId);
            });

            function updateQuantities(change, menuId, reservationId) {

                const quantityElement = $(`#regularMenuUpdateQuantity-${menuId}`);
                const currentVal = parseInt(quantityElement.text());

                const newQuantity = currentVal + change;

                if (change > 0) {
                    quantityElement.text(newQuantity);
                } else {
                    if (currentVal > 0) {
                        quantityElement.text(newQuantity);
                    }
                }

                const isExist = regularMenuChanges.find(menu => menu.menuId == menuId && menu.reservationId ==
                    reservationId);

                if (isExist) {
                    regularMenuChanges = regularMenuChanges.map(menu =>
                        menu.menuId == menuId && menu.reservationId == reservationId ? {
                            ...menu,
                            quantity: newQuantity
                        } :
                        menu
                    );
                } else {
                    regularMenuChanges = [...regularMenuChanges, {
                        menuId,
                        reservationId,
                        quantity: newQuantity
                    }];
                }
                checkeMenuUpdateBtn()
            }

            $('.updateRegularRecords').click(function() {
                let data = [...regularMenuChanges, ...newAddedMenu];

                $('.updateRegularRecords').prop('disabled', true).text('Updating...');
                $.ajax({
                    url: "{{ url('/reg/checkout/regmenu/update/') }}",
                    type: 'POST',
                    data: {
                        data
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.updateRegularRecords').prop('disabled', false).text('Update');
                        Swal.fire({
                            icon: "success",
                            text: "Updated succesfully",
                            timer: 3000,
                            willClose: () => {
                                window.location.reload();
                            }
                        });
                    },
                    error: function(response) {
                        $('.updateRegularRecords').prop('disabled', false).text('Update');
                        Swal.fire({
                            icon: "error",
                            text: xhr.responseJSON && xhr.responseJSON.error ? xhr
                                .responseJSON.error :
                                "An unexpected error occurred. Please try again later.",
                            timer: 3000
                        });
                    }
                });
            });

            $(document).on('click', '.regularMenuIncUpdateAddedQuantity', function() {
                const menuId = $(this).attr('menuId');
                const curQuantity = $(`#regularMenuUpdateAddedQuantity-${menuId}`);
                let quantityVal = parseInt(curQuantity.text());

                curQuantity.text(quantityVal + 1);

                const isExist = newAddedMenu.find(menu => menu.menuId === menuId);

                if (isExist) {
                    newAddedMenu = newAddedMenu.map(menu =>
                        menu.menuId === menuId ? {
                            ...menu,
                            quantity: menu.quantity + 1
                        } : menu
                    );
                } else {
                    newAddedMenu.push({
                        menuId,
                        quantity: 1,
                    });
                }
                checkeMenuUpdateBtn()
            });

            $(document).on('click', '.regularMenuDecUpdateAddedQuantity', function() {
                const menuId = $(this).attr('menuId');
                const curQuantity = $(`#regularMenuUpdateAddedQuantity-${menuId}`);
                let quantityVal = parseInt(curQuantity.text());

                if (quantityVal > 0) {
                    const newVal = quantityVal - 1;
                    curQuantity.text(newVal);
                    if (newVal > 0) {
                        const isExist = newAddedMenu.find(menu => menu.menuId === menuId);
                        if (isExist) {
                            newAddedMenu = newAddedMenu.map(menu =>
                                menu.menuId === menuId ? {
                                    ...menu,
                                    quantity: menu.quantity - 1
                                } : menu
                            );
                        }
                    } else {
                        newAddedMenu = newAddedMenu.filter(menu => menu.menuId !== menuId);
                        $(`#update-reg-reg-menu-${menuId}`).removeClass('d-none');
                        $(`#reg-menu-list-card-${menuId}`).remove();
                    }
                }

                checkeMenuUpdateBtn()
            });

            $('.update-add-reg-menu').click(function() {
                const menuId = $(this).attr('menuId');
                const card = $(`#update-reg-reg-menu-${menuId}`);
                const img = card.find('img').attr('src');
                const name = card.find(`#update-name-reg-menu-${menuId}`).text();
                const price = card.find(`#update-price-reg-menu-${menuId}`).val();
                const newMenuAdded = {
                    menuId,
                    quantity: 1,
                    isNew: true,
                    reservationId: parseInt($('#reservationIdG').val())
                };
                newAddedMenu = [...newAddedMenu, newMenuAdded]
                $('.orderedMenus').append(`
                <div class="col-6 col-sm-4 col-lg-3" id="reg-menu-list-card-${menuId}" >
                <div class="card" >
                    <div class="card-body p-0">
                        <img src="${img}" alt="User Image" style="width: 100%; height: 120px;" class="rounded"/>
                    </div>
                    <div class="card-footer px-2 py-1">
                        <span class="text-md">${name}</span>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-danger badge-sm">Php ${price}</span>

                             <span class="text-md" style="cursor: pointer;">
                                <span id="regularMenuDecUpdateAddedQuantity-${menuId}" class="regularMenuDecUpdateAddedQuantity" menuId="${menuId}">-</span>
                                <span class="text-md mx-2 regularMenuUpdateAddedQuantity" id="regularMenuUpdateAddedQuantity-${menuId}">1</span>
                                <span id="regularMenuIncUpdateAddedQuantity-${menuId}" class="text-md regularMenuIncUpdateAddedQuantity" menuId="${menuId}">+</span>
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>
                `);
                card.addClass('d-none');
                checkeMenuUpdateBtn()
            })

            function checkeMenuUpdateBtn(){
                const isTrue = regularMenuChanges?.length > 0 || newAddedMenu?.length > 0;
                $('.updateRegularRecords').prop('disabled', !isTrue);
            }

            let packageMenusUpdate = [];
            let newlyAddedPackage = [];

            $(document).on('click', '.dec-update-add-pack', function() {
                const packageId = $(this).attr('packId');
                const curVal = $(`#packUpdateAddQuantity2-${packageId}`);
                let quantity = parseInt(curVal.text());

                if (quantity > 0) {
                    curVal.text(quantity - 1);
                    quantity -= 1;

                    const isExist = newlyAddedPackage.find(pack => pack.packageId == packageId);
                    if (isExist) {
                        if (quantity > 0) {
                            newlyAddedPackage = [...newlyAddedPackage.filter(pack => pack.packageId !==
                                packageId), {
                                ...isExist,
                                quantity
                            }];
                        } else {
                            $(`#package-menu-new-added-card-${packageId}`).remove();
                            $(`#package-update-card-${packageId}`).removeClass('d-none');
                            newlyAddedPackage = newlyAddedPackage.filter(pack => pack.packageId !==
                                packageId);
                        }
                    } else {
                        newlyAddedPackage = [...newlyAddedPackage, {
                            packageId,
                            quantity,
                            reservationId: $("#reservationIdG").val(),
                            isNew: true
                        }];
                    }
                }
                checkPackageBtn()
            });

            $(document).on('click', '.inc-update-add-pack', function() {
                const packageId = $(this).attr('packId');
                const curVal = $(`#packUpdateAddQuantity2-${packageId}`);
                let quantity = parseInt(curVal.text()) + 1;
                curVal.text(quantity);

                const isExist = newlyAddedPackage.find(pack => pack.packageId == packageId);
                if (isExist) {
                    newlyAddedPackage = [...newlyAddedPackage.filter(pack => pack.packageId !==
                        packageId), {
                        ...isExist,
                        quantity
                    }];
                } else {
                    newlyAddedPackage = [...newlyAddedPackage, {
                        packageId,
                        quantity,
                        reservationId: $("#reservationIdG").val(),
                        isNew: true
                    }];
                }
                checkPackageBtn()
            });

            // Handle decrement
            $('.dec-update-pack').click(function() {
                const packageId = $(this).attr('packId');
                const curVal = $(`#packUpdateQuantity2-${packageId}`);
                let quantity = parseInt(curVal.text());

                if (quantity > 0) {
                    curVal.text(quantity - 1);
                    quantity -= 1;

                    const isExist = packageMenusUpdate.find(pack => pack.packageId == packageId);
                    if (isExist) {
                        if (quantity > 0) {
                            packageMenusUpdate = [...packageMenusUpdate.filter(pack => pack.packageId !==
                                packageId), {
                                ...isExist,
                                quantity
                            }];
                        }
                    } else {
                        packageMenusUpdate = [...packageMenusUpdate, {
                            packageId,
                            quantity,
                            reservationId: $("#reservationIdG").val()
                        }];
                    }
                }
                checkPackageBtn()
            });
            // Handle increment
            $('.inc-update-pack').click(function() {
                const packageId = $(this).attr('packId');
                const curVal = $(`#packUpdateQuantity2-${packageId}`);
                let quantity = parseInt(curVal.text()) + 1;

                curVal.text(quantity);

                const isExist = packageMenusUpdate.find(pack => pack.packageId == packageId);
                if (isExist) {
                    packageMenusUpdate = [...packageMenusUpdate.filter(pack => pack.packageId !==
                        packageId), {
                        ...isExist,
                        quantity
                    }];
                } else {
                    packageMenusUpdate = [...packageMenusUpdate, {
                        packageId,
                        quantity,
                        reservationId: $("#reservationIdG").val()
                    }];
                }
                checkPackageBtn()
            });

            $(document).on('click', '.package-update-add-new', function() {
                const packageId = $(this).attr('packageId');
                const card = $(`#package-update-card-${packageId}`);

                const name = card.find('.card-title').text();

                const menuItems = card.find('.dropdown-item');

                const newPackage = {
                    packageId,
                    quantity: 1,
                    reservationId: parseInt($('#reservationIdG').val()),
                    isNew: true
                };
                newlyAddedPackage = [...newlyAddedPackage, newPackage];

                let menus = [];

                menuItems.each(function() {
                    const name = $(this).text().trim();
                    const img = $(this).find('img').attr('src');
                    menus = [...menus, {
                        img,
                        name
                    }]

                    checkPackageBtn()
                });

                $('.packageMenuUpdteContainer').append(`
                 <div class="col-6 col-md-2" id="package-menu-new-added-card-${packageId}">
                <div class="card">
                    <div class="card-header bg-warning p-1">
                        <div class="card-title" style="font-size: 16px;">
                            ${name}
                        </div>
                    </div>
                    <div class="card-footer p-0 pr-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Menus(${menus.length})
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                 ${menuDisplay(menus)}
                                </div>
                            </div>
                           <span style="cursor: pointer;">
                                  <span id="dec-update-add-pack-${packageId}" packId="${packageId}" class="dec-update-add-pack">-</span>   
                                <span id="packUpdateAddQuantity2-${packageId}" class="packUpdateAddQuantity2 mx-2">1</span>    
                                <span id="inc-update-add-pack-${packageId}" packId="${packageId}" class="inc-update-add-pack">+</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
                `);

                function menuDisplay(menu) {
                    let menuHtml = '';

                    for (let x = 0; x < menu.length; x++) {
                        const men = menu[x];
                        menuHtml += `
                         <a class="dropdown-item" style="font-size: 13px;">${men.name}
                                                    <span class="float-right">
                                                        <img src="${men.img}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>   
                                                    </span>    
                                                </a>
                                                `;
                    }
                    return menuHtml;
                }

                card.addClass('d-none');


            });

            function checkPackageBtn(){
                const isTrue = packageMenusUpdate?.length > 0 || newlyAddedPackage?.length > 0;
                $('.updatePackageRecords').prop('disabled', !isTrue);
            }

            $('.updatePackageRecords').click(function() {
                $('.updatePackageRecords').prop('disabled', true).text('Updating...');
                const data = [...newlyAddedPackage, ...packageMenusUpdate]
                $.ajax({
                    url: "{{ url('/reg/checkout/packedmenu/update/') }}",
                    type: 'POST',
                    data: {
                        data
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            text: "Updated succesfully",
                            timer: 3000,
                            willClose: () => {
                                window.location.reload();
                            }
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: "error",
                            text: "An unexpected error occurred. Please try again later.",
                            timer: 3000
                        });
                    }
                });
            });

            let themeUpdates = null;
            let newThemeUpdate = null;

            $(document).on('click', '.new-subCategory-selector', function(){
                const subCategory = $(this).attr('subCategory');
                if(newThemeUpdate){
                    newThemeUpdate = {...newThemeUpdate, subCategory: subCategory}
                }
                $('.updateThemeRecords').prop('disabled', false);
            })

            $('.theme-update').click(function() {
                const themeId = $(this).attr('themeId');
                const subCategoryId = $(this).attr('subCategoryId');
                themeUpdates = {
                    themeId,
                    subCategory: subCategoryId,
                    reservationId: parseInt($(`#reservationIdG`).val())
                };
                $('.updateThemeRecords').prop('disabled', false);
            })

            $('.update-new-theme-select').click(function() {
                const theme = JSON.parse($(this).attr('themeId'));
                $(`.themeNewSelected`).remove();
                $(`#available-theme-update-${theme.id}`).addClass('d-none');
                $(`#available-theme-update-${newThemeUpdate?.themeId}`).removeClass('d-none');
                $('.active-update-heart').removeClass('text-danger');
                newThemeUpdate = {themeId: theme.id, subCategory: null, reservationId: parseInt($('#reservationIdG').val()), isNew: true};
                $('.updateThemeRecords').prop('disabled', false);
                $('.themeSelectedContainer').append(`
        <div class="col-6 col-md-4 themeNewSelected" id="themeNewSelected-${theme.id}">
            <div class="card">
                <div class="card-header bg-warning p-1">
                    <div class="card-title" style="font-size: 16px;">
                       ${theme.theme}
                    </div>
                </div>
                <div class="card-body p-0">
                    <img src="{{ url('/themes/uploaded/${theme.photo}') }}" alt="Theme Image" style="width: 100%; height: 160px;" class="rounded"/>
                </div>
                <div class="card-footer p-2">
                    <div class="d-flex justify-content-between">
                        ${theme.subCategory ? 
                        `<div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Category
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                  ${displaySubTheme(theme.subCategory)}
                                </div>
                            </div>`
                        :'<span class="text-md">Costumize</span>'}
                        <span>
                            <li class="fa fa-heart text-md text-danger"></li>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    `);
            });

            function displaySubTheme(theme){
               let htmlElem = '';
               for(let x=0; x<theme.length; x++){
                htmlElem += `
                 <a class="dropdown-item new-subCategory-selector" id="new-subCategory-selector-${theme[x].id}" subCategory="${theme[x].id}">${theme[x].name}
                     <span class="float-right">
                        <img src="{{ url('/themes/uploaded/${theme[x].photo}') }}" alt="User Image" style="width: 27px; height: 27px;" class="rounded"/>   
                    </span>    
                </a>
                `;
               }
               return htmlElem;
            }


            $('.updateThemeRecords').click(function() {
                $('.updateThemeRecords').prop('disabled', false).text('Updating...');
                $.ajax({
                    url: "{{ url('/reg/checkout/theme/update/') }}",
                    type: 'POST',
                    data: {
                        data: newThemeUpdate !== null ? newThemeUpdate:themeUpdates
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.updateThemeRecords').prop('disabled', false).text('Save changes');
                        Swal.fire({
                            icon: "success",
                            text: "Updated succesfully",
                            timer: 3000,
                            willClose: () => {
                                window.location.reload();
                            }
                        });
                    },
                    error: function(response) {
                        $('.updateThemeRecords').prop('disabled', false).text('Save changes');
                        console.log(response)
                        Swal.fire({
                            icon: "error",
                            text: xhr.responseJSON && xhr.responseJSON.error ? xhr
                                .responseJSON.error :
                                "An unexpected error occurred. Please try again later.",
                            timer: 3000
                        });
                    }
                });
            })
        })
    </script>
@endsection