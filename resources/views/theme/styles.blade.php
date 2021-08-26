<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css">
<link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css">
@yield('styles')
<link href="assets/css/components/cards/card.css" rel="stylesheet" type="text/css">
<link href="assets/css/elements/search.css" rel="stylesheet" type="text/css">
<link href="plugins/notification/snackbar/snackbar.min.css" rel="stylesheet" type="text/css">
<link href="plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css">
<link href="plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css">
 @livewireStyles 
{{-- 
 <div class="searchable-items grid">
    @foreach ($productos as $product)
        <div class="items">
            <div class="item-content">
                <div class="user-profile">
                    <img src="{{ asset('storage/products/' . $product->image) }}" class="w-100 h-100" alt="avatar">

                    <div class="user-meta-info">
                        <p class="user-name" data-name="Alan Green">{{ $product->nombre }}</p>
                        <p class="user-work" data-occupation="Web Developer">{{ $product->codigo }}</p>
                    </div>
                </div>
                <div class="user-email">
                    <p class="info-title">Categoria: </p>
                    <p class="usr-email-addr" data-email="alan@mail.com">{{ $product->idCategoriaProducto }}
                    </p>
                </div>
                <div class="user-location">
                    <p class="info-title">Precio: </p>
                    <p class="usr-location" data-location="Boston, USA">{{ $product->idAlmacen }}</p>
                </div>
                <div class="user-phone">
                    <p class="info-title">Stock: </p>
                    <p class="usr-ph-no" data-phone="+1 (070) 123-4567">{{ $product->cantidad }}</p>
                </div>
                <div class="action-btn">
                    <svg wire:click="Edit({{ $product->idProducto }})" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-edit-2 edit">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg>

                    <svg onclick="Confirm('{{ $product->idProducto }}')"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-user-minus delete">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <line x1="23" y1="11" x2="17" y2="11"></line>
                    </svg>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}