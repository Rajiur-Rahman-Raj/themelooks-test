@extends('layouts.app')
@section('title', 'ThemeLooks Test')
@section('content')
    <section class="shop-left">
        <div class="container">
            <div class="shop-offcanvas-container">
                <div class="shop-offcanvas-right me-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <h5>Product Section</h5>
                        </div>

                        <div class="card-body">
                            <div class="hrader-search-input select-option w-100 mb-4">
                                <input type="text" class="soValue optionSearch" id="searchInput" placeholder="Search here" aria-label="Search">
                            </div>

                            <div class="filter-body">
                                <div class="row" id="product-list">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="new-arrival-single wow fadeInUp animated" data-wow-delay="200ms"
                                             data-wow-duration="1000ms"
                                             style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                            <div class="new-arrival-image-container">
                                                <div class="new-arrival-image">
                                                    <a href="http://127.0.0.1/courier/test_vendor/product/cotton-t-shirt-for-mens"
                                                       class="productViewContent" data-id="1"
                                                       data-title="Cotton T Shirt For Men's" data-price="500.00"
                                                       data-category="Men's Fashion">
                                                        <img class="maxWidth"
                                                             src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <div class="ribon-container">
                                                    <ul>
                                                        <li>
                                                            <div class="ribon ribon-red">-23%</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="new-arrival-icon-list">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:void(0)" class="search-btn quickCart"
                                                               data-product-id="1"> <i
                                                                    class="fa-light fa-cart-shopping"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="new-arrival-content">
                                                <a href="http://127.0.0.1/courier/test_vendor/product/cotton-t-shirt-for-mens"
                                                   class="productViewContent" data-id="1" data-title="Cotton T Shirt For Men's"
                                                   data-price="500.00" data-category="Men's Fashion">Cotton T Shirt For
                                                    Men's</a>
                                                <p><span>TK650</span> TK500</p>
                                            </div>
                                            <input type="hidden" class="product_id" value="1">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="new-arrival-single wow fadeInUp animated" data-wow-delay="200ms"
                                             data-wow-duration="1000ms"
                                             style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                            <div class="new-arrival-image-container">
                                                <div class="new-arrival-image">
                                                    <a href="http://127.0.0.1/courier/test_vendor/product/versatile-hot-collection-stylish-and-fashionable-winter-and-summer-exclusive-sneakers"
                                                       class="productViewContent" data-id="3"
                                                       data-title="Versatile -Hot Collection Stylish and Fashionable Winter and Summer Exclusive Sneakers"
                                                       data-price="1200.00" data-category="Men's Fashion">
                                                        <img class="maxWidth"
                                                             src="http://127.0.0.1/courier/assets/upload/product/pbkgKw3AuL9GMaEBq55fI2djsz3QOf.webp"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <div class="ribon-container">
                                                    <ul>
                                                        <li>
                                                            <div class="ribon ribon-red">-20%</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="new-arrival-icon-list">
                                                    <ul>
                                                        <li>
                                                            <a class="cartsButton addToWishList" data-product_id="3"
                                                               data-name="Versatile -Hot Collection Stylish and Fashionable Winter and Summer Exclusive Sneakers"
                                                               data-price="1200.00" data-categoryname="Men's Fashion">
                                                                <i class="fa-light fa-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="http://127.0.0.1/courier/test_vendor/product/versatile-hot-collection-stylish-and-fashionable-winter-and-summer-exclusive-sneakers"
                                                               class="lightbox-image productViewContent" data-id="3"
                                                               data-title="Versatile -Hot Collection Stylish and Fashionable Winter and Summer Exclusive Sneakers"
                                                               data-price="1200.00" data-category="Men's Fashion">
                                                                <i class="fa-light fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="search-btn quickCart"
                                                               data-product-id="3"> <i
                                                                    class="fa-light fa-cart-shopping"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="new-arrival-content">
                                                <a href="http://127.0.0.1/courier/test_vendor/product/versatile-hot-collection-stylish-and-fashionable-winter-and-summer-exclusive-sneakers"
                                                   class="productViewContent" data-id="3"
                                                   data-title="Versatile -Hot Collection Stylish and Fashionable Winter and Summer Exclusive Sneakers"
                                                   data-price="1200.00" data-category="Men's Fashion">Versatile -Hot Collection
                                                    Styl...</a>
                                                <p><span>TK1,500</span> TK1,200</p>
                                            </div>
                                            <input type="hidden" class="product_id" value="3">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="new-arrival-single wow fadeInUp animated" data-wow-delay="200ms"
                                             data-wow-duration="1000ms"
                                             style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                            <div class="new-arrival-image-container">
                                                <div class="new-arrival-image">
                                                    <a href="http://127.0.0.1/courier/test_vendor/product/animal-pattern-print-nylon-shoulder-underarm-bag-ladies-small-purse-handbags-casual-women-bags-gift"
                                                       class="productViewContent" data-id="6"
                                                       data-title="Animal Pattern Print Nylon Shoulder Underarm Bag Ladies Small Purse Handbags Casual Women Bags Gift"
                                                       data-price="1020.00" data-category="Woman's Fashion">
                                                        <img class="maxWidth"
                                                             src="http://127.0.0.1/courier/assets/upload/product/JXeFTg3TrOISRswAE7PQkSJpdA36ay.webp"
                                                             alt="">
                                                    </a>
                                                </div>
                                                <div class="ribon-container">
                                                    <ul>
                                                        <li>
                                                            <div class="ribon ribon-red">-12%</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="new-arrival-icon-list">
                                                    <ul>
                                                        <li>
                                                            <a class="cartsButton addToWishList" data-product_id="6"
                                                               data-name="Animal Pattern Print Nylon Shoulder Underarm Bag Ladies Small Purse Handbags Casual Women Bags Gift"
                                                               data-price="1020.00" data-categoryname="Woman's Fashion">
                                                                <i class="fa-light fa-heart"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="http://127.0.0.1/courier/test_vendor/product/animal-pattern-print-nylon-shoulder-underarm-bag-ladies-small-purse-handbags-casual-women-bags-gift"
                                                               class="lightbox-image productViewContent" data-id="6"
                                                               data-title="Animal Pattern Print Nylon Shoulder Underarm Bag Ladies Small Purse Handbags Casual Women Bags Gift"
                                                               data-price="1020.00" data-category="Woman's Fashion">
                                                                <i class="fa-light fa-eye"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0)" class="search-btn quickCart"
                                                               data-product-id="6"> <i
                                                                    class="fa-light fa-cart-shopping"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="new-arrival-content">
                                                <a href="http://127.0.0.1/courier/test_vendor/product/animal-pattern-print-nylon-shoulder-underarm-bag-ladies-small-purse-handbags-casual-women-bags-gift"
                                                   class="productViewContent" data-id="6"
                                                   data-title="Animal Pattern Print Nylon Shoulder Underarm Bag Ladies Small Purse Handbags Casual Women Bags Gift"
                                                   data-price="1020.00" data-category="Woman's Fashion">Animal Pattern Print
                                                    Nylon Sho...</a>
                                                <p><span>TK1,160</span> TK1,020</p>
                                            </div>
                                            <input type="hidden" class="product_id" value="6">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
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
                                    <form action="http://127.0.0.1/courier/products" method="get" id="filterByRangeAndCategory">

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
                                                    <div class="product_quantity d-flex align-items-center justify-content-left">
                                                        <img src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp" alt="product_img" width="20%" me-3 class="img-fluid">
                                                        <p class="text-center">Cotton T Shirt..</p>
                                                    </div>

                                                </th>
                                                <td class="text-center">
                                                    <div class="product_quantity d-flex justify-content-center">
                                                        <button type="button" class="minus btn btn-sm border decrement"><i aria-hidden="true" class="fal fa-minus"></i></button>
                                                        <input class="border text-center countInput" name="quantity" type="number"  value="1">
                                                        <button type="button" class="plus btn btn-sm border increment"><i aria-hidden="true" class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    ৳ 35
                                                </td>

                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="remove-item" data-item-id="665"><i class="fa-light fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">
                                                    <div class="product_quantity d-flex align-items-center justify-content-left">
                                                        <img src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp" alt="product_img" width="20%" me-3 class="img-fluid">
                                                        <p class="text-center">Cotton T Shirt..</p>
                                                    </div>

                                                </th>
                                                <td class="text-center">
                                                    <div class="product_quantity d-flex justify-content-center">
                                                        <button type="button" class="minus btn btn-sm border decrement"><i aria-hidden="true" class="fal fa-minus"></i></button>
                                                        <input class="border text-center countInput" name="quantity" type="number"  value="1">
                                                        <button type="button" class="plus btn btn-sm border increment"><i aria-hidden="true" class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    ৳ 3500000
                                                </td>

                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="remove-item" data-item-id="665"><i class="fa-light fa-trash"></i></a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">
                                                    <div class="product_quantity d-flex align-items-center justify-content-left">
                                                        <img src="http://127.0.0.1/courier/assets/upload/product/aNBAJPrLZER8oMr2neEKindcLyxwNy.webp" alt="product_img" width="20%" me-3 class="img-fluid">
                                                        <p class="text-center">Cotton T Shirt..</p>
                                                    </div>

                                                </th>
                                                <td class="text-center">
                                                    <div class="product_quantity d-flex justify-content-center">
                                                        <button type="button" class="minus btn btn-sm border decrement"><i aria-hidden="true" class="fal fa-minus"></i></button>
                                                        <input class="border text-center countInput" name="quantity" type="number"  value="1">
                                                        <button type="button" class="plus btn btn-sm border increment"><i aria-hidden="true" class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    350 Tk
                                                </td>

                                                <td class="text-center">
                                                    <a href="javascript:void(0)" class="remove-item" data-item-id="665"><i class="fa-light fa-trash"></i></a>
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
@endsection

@push('script')
    <script>

    </script>
@endpush
