@extends('layouts.app')
@section('title', 'ThemeLooks Test')
@section('content')
    <section class="shop-left">
        <div class="container">
            <div class="shop-offcanvas-container">
                <div class="shop-offcanvas-right me-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <h5>@lang('Product Section')</h5>
                        </div>

                        <div class="card-body">
                            <div class="hrader-search-input select-option w-100 mb-4">
                                <input type="text" class="soValue optionSearch" id="searchInput"
                                       placeholder="Search here" aria-label="Search">
                            </div>

                            <div class="filter-body">
                                <div class="row" id="product-list">
                                    @forelse($products as $key => $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="new-arrival-single">
                                                <div class="new-arrival-image-container">
                                                    <div class="new-arrival-image">
                                                        <a href="#"
                                                           class="productViewContent" data-id="1"
                                                           data-title="{{ $product->name }}" data-price="500.00">
                                                            <img class="maxWidth"
                                                                 src="{{ asset('assets/uploads/product/'.$product->image) }}"
                                                                 alt="@lang('product_img')">
                                                        </a>
                                                    </div>

                                                    @if ($product->show_product_discount)
                                                        <div class="ribon-container">
                                                            <ul>
                                                                <li>
                                                                    <div
                                                                        class="ribon ribon-red"> {{ $product->show_product_discount }}</div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <div class="new-arrival-icon-list">
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:void(0)"
                                                                   class="search-btn quickCart"
                                                                   data-product-id="{{ $product->id }}"> <i
                                                                        class="fa-light fa-cart-shopping"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="new-arrival-content">
                                                    <a href="#"
                                                       class="productViewContent" data-id="1"
                                                       data-title="{{ $product->name }}"
                                                       data-price="500.00"
                                                       data-category="Men's Fashion"> {{ $product->name }}</a>
                                                    @if ($product->show_product_discount)
                                                        <p><span>TK{{ number_format($product->selling_price) }}</span>
                                                            TK{{ $product->show_product_discount_price }}</p>
                                                    @else
                                                        <p>TK{{ number_format($product->selling_price) }}</p>
                                                    @endif

                                                </div>
                                                <input type="hidden" class="product_id" value="1">
                                            </div>
                                        </div>
                                    @empty
                                        <div class="notFound text-center p-3 ">
                                            <h5 class="mb-0 h5 mt-3 text-danger">@lang('Products not found')</h5>
                                        </div>
                                    @endforelse

                                </div>
                            </div>

                            <div class="pagination_area">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        {{ $products->appends($_GET)->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="shop-offcanvas-left">
                    <div class="card">
                        <div class="card-header border-0">
                            <h5>Billing Details</h5>
                        </div>


                        <div class="card-body pt-0" id="card-body-message">
                            <div class="shop-left-aside">
                                <!--Accordian Box-->
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <form action="http://127.0.0.1/courier/products" method="get"
                                          id="filterByRangeAndCategory">

                                        <table class="table table-bordered cart-table">
                                            <thead class="table-head">
                                            <tr>
                                                <th scope="col">@lang('Item')</th>
                                                <th scope="col" class="text-center">@lang('Qty')</th>
                                                <th scope="col" class="text-center">@lang('Price')</th>
                                                <th scope="col" class="text-center">@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody id="cart-items">

                                            </tbody>
                                        </table>

                                        <div class="row mt-5 cart-calculation">
                                            <div class="col-md-12">
                                                <div class="calculation">
                                                    <ul class="">
                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">@lang('Sub Total'): </span>
                                                            <input type="hidden" name="cart_sub_total"
                                                                   class="subTotalInput">
                                                            <span class="subTotalAmount"></span>
                                                        </li>
                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">@lang('Discount'): </span>
                                                            <input type="hidden" name="cart_discount"
                                                                   class="discountInput">
                                                            <span class="discountAmount"></span>
                                                        </li>

                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">@lang('Tax'): </span>
                                                            <input type="hidden" name="cart_tax" class="taxInput">
                                                            <span class="taxAmount"></span>
                                                        </li>

                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">@lang('Total'): </span>
                                                            <input type="hidden" name="cart_grand_total"
                                                                   class="grandTotalInput">
                                                            <span class="grandTotalAmount"> </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button"
                                                        class="btn w-100 btn-1 place-order"> @lang('Place Order')
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </section>

    <div id="search-popup-two" class="search-popup-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-container">
                        <div class="close-search theme-btn cart-modal-close"><span
                                class="fal fa-times cart-modal-close"></span></div>
                        <div class="cart-single cart-single-1" id="quick_product_cart_view">
                            <!--product details show here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {

            displayCart();

            function displayCart() {
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                let cartContainer = document.getElementById("cart-items");

                let subTotal = 0;
                let totalDiscount = 0;
                let totalTax = 0;

                if (cart.length === 0) {
                    $(".cart-calculation").addClass("d-none");
                    $(".table-head").addClass("d-none");
                    $(".place-order").addClass("d-none");
                    cartContainer.innerHTML = '<h5 class="text-danger text-center">Your cart is empty.</h5>';
                } else {
                    $(".cart-calculation").removeClass("d-none");
                    $(".table-head").removeClass("d-none");
                    $(".place-order").removeClass("d-none");

                    cartContainer.innerHTML = "";

                    cart.forEach((item, index) => {
                        let itemTotal = item.selling_price * item.product_qty;
                        let itemDiscount = itemTotal * (item.discount || 0) / 100;
                        let itemTax = itemTotal * (item.tax || 0) / 100;

                        subTotal += itemTotal;
                        totalDiscount += itemDiscount;
                        totalTax += itemTax;

                        let itemHTML = `
                <tr>
                    <td scope="row">
                        <div class="product_quantity d-flex align-items-center justify-content-left">
                            <img src="${item.product_image}" alt="product_img" width="20%" class="img-fluid">
                            <p class="text-center">${item.product_name}</p>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="product_quantity d-flex justify-content-center">
                            <button type="button" class="minus btn btn-sm border decrement" data-index="${index}">
                                <i aria-hidden="true" class="fal fa-minus"></i>
                            </button>
                            <input class="border text-center countInput" name="quantity" type="number" value="${item.product_qty}" data-index="${index}">
                            <button type="button" class="plus btn btn-sm border increment" data-index="${index}">
                                <i aria-hidden="true" class="fal fa-plus"></i>
                            </button>
                        </div>
                    </td>
                    <td class="text-center">
                        ৳ ${(item.selling_price * item.product_qty).toFixed(2)}
                    </td>
                    <td class="text-center">
                        <a href="javascript:void(0)" class="remove-item" data-variantid="${item.variant_id}">
                            <i class="fa-light fa-trash"></i>
                        </a>
                    </td>
                </tr>`;
                        cartContainer.innerHTML += itemHTML;
                    });

                    let grandTotal = (subTotal - totalDiscount) + totalTax;

                    $(".subTotalAmount").text(`${subTotal.toFixed(2)} TK`);
                    $(".discountAmount").text(`${totalDiscount.toFixed(2)} TK`);
                    $(".taxAmount").text(`${totalTax.toFixed(2)} TK`);
                    $(".grandTotalAmount").text(`${grandTotal.toFixed(2)} TK`);

                    $(".subTotalInput").val(subTotal.toFixed(2));
                    $(".discountInput").val(totalDiscount.toFixed(2));
                    $(".taxInput").val(totalTax.toFixed(2));
                    $(".grandTotalInput").val(grandTotal.toFixed(2));
                }
            }

            $(document).on("click", ".remove-item", function () {
                let variantId = $(this).data("variantid");
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                cart = cart.filter(item => item.variant_id !== variantId);
                localStorage.setItem("cart", JSON.stringify(cart));
                Notiflix.Notify.success("Item removed successfully!");
                displayCart();
            });

            $(document).on('click', '.increment', function () {
                let index = $(this).data('index');
                updateQuantity(index, 1);
            });

            $(document).on('click', '.decrement', function () {
                let index = $(this).data('index');
                updateQuantity(index, -1);
            });

            $(document).on('change', '.countInput', function () {
                let index = $(this).data('index');
                let newQty = parseInt($(this).val());
                if (newQty > 0) {
                    updateQuantity(index, 0, newQty);
                } else {
                    Notiflix.Notify.failure('Quantity must be at least 1');
                    displayCart();
                }
            });

            function updateQuantity(index, change, newQty = null) {
                let cart = JSON.parse(localStorage.getItem('cart')) || [];
                console.log(cart);
                if (cart[index]) {
                    if (newQty !== null) {
                        cart[index].product_qty = newQty;
                    } else {
                        cart[index].product_qty += change;
                    }

                    if (cart[index].product_qty <= 0) {
                        cart[index].product_qty = 1;
                        Notiflix.Notify.failure('Quantity must be at least 1');
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));
                    displayCart();
                }
            }
        });

        $(document).on('click', '.cart-modal-close', function () {
            window.location.reload();
        });


        $(document).on('click', '.search-btn', function () {
            $('#search-popup-two').addClass('popup-visible');
        });

        $('.close-search,.search-popup-two .overlay-layer').on('click', function () {
            $('#search-popup-two').removeClass('popup-visible');
        });

        $(document).on('click', '.quickCart', function (event) {
            event.preventDefault();
            let product_id = $(this).data('product-id');
            let $modalBody = $('#quick_product_cart_view');
            $modalBody.empty();
            Notiflix.Block.dots('#quick_product_cart_view');

            $.ajax({
                url: "{{ route('product.cart.view') }}",
                method: 'GET',
                data: {
                    product_id: product_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $modalBody.html(response);
                },
            });
        });

    </script>
@endpush
