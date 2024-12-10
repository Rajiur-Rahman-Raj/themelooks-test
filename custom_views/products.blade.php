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
                                            <div class="new-arrival-single wow fadeInUp animated" data-wow-delay="200ms"
                                                 data-wow-duration="1000ms"
                                                 style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
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

                        <div class="card-body pt-0">
                            <div class="shop-left-aside">

                                <!--Accordian Box-->
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <form action="http://127.0.0.1/courier/products" method="get"
                                          id="filterByRangeAndCategory">

                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">@lang('Item')</th>
                                                <th scope="col" class="text-center">@lang('Qty')</th>
                                                <th scope="col" class="text-center">@lang('Price')</th>
                                                <th scope="col" class="text-center">@lang('Action')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <div
                                                        class="product_quantity d-flex align-items-center justify-content-left">
                                                        <img
                                                            src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp"
                                                            alt="product_img" width="20%" me-3 class="img-fluid">
                                                        <p class="text-center">Cotton T Shirt..</p>
                                                    </div>

                                                </th>
                                                <td class="text-center">
                                                    <div class="product_quantity d-flex justify-content-center">
                                                        <button type="button" class="minus btn btn-sm border decrement">
                                                            <i aria-hidden="true" class="fal fa-minus"></i></button>
                                                        <input class="border text-center countInput" name="quantity"
                                                               type="number" value="1">
                                                        <button type="button" class="plus btn btn-sm border increment">
                                                            <i aria-hidden="true" class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    ৳ 35
                                                </td>

                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="remove-item" data-item-id="665"><i
                                                            class="fa-light fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">
                                                    <div
                                                        class="product_quantity d-flex align-items-center justify-content-left">
                                                        <img
                                                            src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp"
                                                            alt="product_img" width="20%" me-3 class="img-fluid">
                                                        <p class="text-center">Cotton T Shirt..</p>
                                                    </div>

                                                </th>
                                                <td class="text-center">
                                                    <div class="product_quantity d-flex justify-content-center">
                                                        <button type="button" class="minus btn btn-sm border decrement">
                                                            <i aria-hidden="true" class="fal fa-minus"></i></button>
                                                        <input class="border text-center countInput" name="quantity"
                                                               type="number" value="1">
                                                        <button type="button" class="plus btn btn-sm border increment">
                                                            <i aria-hidden="true" class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    ৳ 3500000
                                                </td>

                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="remove-item" data-item-id="665"><i
                                                            class="fa-light fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">
                                                    <div
                                                        class="product_quantity d-flex align-items-center justify-content-left">
                                                        <img
                                                            src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp"
                                                            alt="product_img" width="20%" me-3 class="img-fluid">
                                                        <p class="text-center">Cotton T Shirt..</p>
                                                    </div>

                                                </th>
                                                <td class="text-center">
                                                    <div class="product_quantity d-flex justify-content-center">
                                                        <button type="button" class="minus btn btn-sm border decrement">
                                                            <i aria-hidden="true" class="fal fa-minus"></i></button>
                                                        <input class="border text-center countInput" name="quantity"
                                                               type="number" value="1">
                                                        <button type="button" class="plus btn btn-sm border increment">
                                                            <i aria-hidden="true" class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    350 Tk
                                                </td>

                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="remove-item" data-item-id="665"><i
                                                            class="fa-light fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="calculation">
                                                    <ul class="">
                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">Sub Total: </span>
                                                            <span> 100 Tk</span>
                                                        </li>
                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">Discount: </span>
                                                            <span> 20 Tk</span>
                                                        </li>

                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">Tax: </span>
                                                            <span> 10 Tk</span>
                                                        </li>

                                                        <li class="d-flex justify-content-between mb-3">
                                                            <span class="fw-bold">Total: </span>
                                                            <span> 4500 Tk</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn w-100 btn-1"> Place Order</button>
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

    <!-- product quick view Modal -->
    <div id="search-popup-two" class="search-popup-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login-container">
                        <div class="close-search theme-btn"><span class="fal fa-times"></span></div>
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
