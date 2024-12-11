<div class="cart-left-image w-50">
    <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="">
</div>

<div class="cart-left-content">
    <div class="product-details p-0">
        <div class="product-title">
            <h4 class="productTitle lh-sm mb-3">@lang($product->name)</h4>
            @if ($product->show_product_discount)
                <div class="prodcut-prize" id="specificVariantData">
                    <span class="productVariantPrice">TK{{ $product->show_product_discount_price }}</span>
                    <span class="productVariantComparePrice">TK{{ number_format($product->selling_price) }}</span>
                </div>
            @else
                <div class="prodcut-prize" id="specificVariantData">
                    <span class="productVariantPrice">TK{{ number_format($product->selling_price) }}</span>
                </div>
            @endif

            {{--            <form action="#" method="POST" enctype="multipart/form-data" class="addToCart">--}}
            {{--                @csrf--}}
            @foreach ($variants as $variantType => $variantValues)
                <div class="{{ strtolower($variantType) }}-box mb-0">
                    <h4 class="pt-2">{{ ucfirst($variantType) }}</h4>
                    @foreach ($variantValues as $index => $value)
                        @if($variantType == 'Color')
                            <input class="color-{{ $value }} form-check-input variant-check-value radioInput"
                                   type="radio" title="{{ $value }}"
                                   name="{{$variantType}}"
                                   id="exampleRadio{{ $index + 1 }}" value="{{ $value }}"
                                   {{ $index == 0 ? 'checked' : '' }}
                                   style="background-color: {{ $value }}; border: 2px solid #d3cccc;"/>
                        @else
                            <input type="radio" class="btn-check form-check-input variant-check-value"
                                   name="{{ $variantType}}" id="{{ $variantType.$index }}"
                                   value="{{ $value }}" autocomplete="off"
                                {{ $index == 0 ? 'checked' : '' }}
                            />
                            <label class="Variants {{ $index == 0 ? 'selectedClass' : '' }}"
                                   data-class="{{ $variantType }}"
                                   for="{{ $variantType.$index }}"> {{ ucfirst($value) }}</label>
                        @endif
                    @endforeach
                </div>
            @endforeach

            <div class="count-box">
                <div class="count d-flex">
                    <button type="button" class="decrement"><i class="fa-solid fa-minus"></i></button>
                    <input type="number" class="form-control product_qty text-center" id="countInput" name="quantity"
                           value="1" min="1">
                    <button type="button" class="increment"><i class="fa-solid fa-plus"></i></button>
                </div>
                <div class="cart-btn">
                    <button class="addToCart"
                            data-productid="{{ $product->id }}"
                            data-name="{{ $product->name }}" data-image="{{ $product->image }}"
                            data-discount="{{ $product->discount }}" data-tax="{{ $product->tax }}"><i
                            class="fa-solid fa-cart-plus"></i>@lang('add to cart')</button>
                </div>
            </div>

        </div>
    </div>
</div>


<script>

    $(document).ready(function () {
        $(document).off("click", ".increment").on("click", ".increment", function () {
            let input = $(this).siblings("input#countInput");
            let count = parseInt(input.val()) || 1;
            count++;
            input.val(count);
        });

        $(document).off("click", ".decrement").on("click", ".decrement", function () {
            let input = $(this).siblings("input#countInput");
            let count = parseInt(input.val()) || 1;
            if (count > 1) {
                count--;
            }
            input.val(count);
        });

        $(document).off("click", ".addToCart").on("click", ".addToCart", function () {
            let productId = $(this).data('productid'); // Get product ID
            let selectedValues = {};

            let qty = parseInt($(this).closest(".count-box").find("#countInput").val());

            $('.variant-check-value:checked').each(function () {
                let name = $(this).attr("name");
                let value = $(this).val();
                selectedValues[name] = value;
            });

            let csrfToken = "{{ csrf_token() }}";

            $.ajax({
                type: 'POST',
                url: "{{ route('product.cart.store') }}",
                data: {
                    id: productId,
                    variants: selectedValues,
                    qty: qty,
                    _token: csrfToken
                },
                success: function (response) {
                    if (response.message) {
                        Notiflix.Notify.failure(response.message);
                        return;
                    }

                    let cart = JSON.parse(localStorage.getItem('cart')) || [];

                    let existingProductIndex = cart.findIndex(item => item.variant_id === response.variant_id);

                    if (existingProductIndex !== -1) {
                        cart[existingProductIndex].product_qty = parseInt(cart[existingProductIndex].product_qty) + qty;
                    } else {
                        cart.push(response);
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));

                    displayCart();

                    Notiflix.Notify.success('Cart added successfully!');
                }
            });
        });


        function displayCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartContainer = document.getElementById('cart-items');


            let subTotal = 0;
            let totalDiscount = 0;
            let totalTax = 0;

            if (cart.length === 0) {
                $('.cart-calculation').addClass('d-none')
                $('.table-head').addClass('d-none')
                $('.place-order').addClass('d-none')
                $('.card-body-message').text = 'ok'
            } else {
                $('.cart-calculation').removeClass('d-none');
                $('.table-head').removeClass('d-none');
                $('.place-order').removeClass('d-none');
                cartContainer.innerHTML = '';



                cart.forEach(item => {
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
                        <button type="button" class="minus btn btn-sm border decrement">
                            <i aria-hidden="true" class="fal fa-minus"></i>
                        </button>
                        <input class="border text-center countInput" name="quantity" type="number" value="${item.product_qty}">
                        <button type="button" class="plus btn btn-sm border increment">
                            <i aria-hidden="true" class="fal fa-plus"></i>
                        </button>
                    </div>
                </td>
                <td class="text-center">
                    ৳ ${item.selling_price * item.product_qty}
                </td>
                <td class="text-center">
                    <a href="javascript:void(0)" class="remove-item" data-item-id="${item.variant_id}">
                        <i class="fa-light fa-trash"></i>
                    </a>
                </td>
            </tr>`;
                    cartContainer.innerHTML += itemHTML;
                });

                let grandTotal = (subTotal - totalDiscount) + totalTax;

                $('.subTotalAmount').text(`${subTotal.toFixed(2)} TK`);
                $('.discountAmount').text(`${totalDiscount.toFixed(2)} TK`);
                $('.taxAmount').text(`${totalTax.toFixed(2)} TK`);
                $('.grandTotalAmount').text(`${grandTotal.toFixed(2)} TK`);

                $('.subTotalInput').val(subTotal.toFixed(2));
                $('.discountInput').val(totalDiscount.toFixed(2));
                $('.taxInput').val(totalTax.toFixed(2));
                $('.grandTotalInput').val(grandTotal.toFixed(2));
            }
        }

        displayCart();


        $('.Variants').on('click', function () {
            let variantClass = $(this).data('class');
            let activeClass = variantClass + 'Active';
            $('.' + activeClass).not(this).removeClass(activeClass).removeAttr('style');

            $(this).addClass(activeClass);

            $('.' + activeClass).css({
                'background-color': '#f76b6a',
                'color': 'white'
            });
        })

        $('input[type=radio]').click(function () {
            $(this).siblings('label').addClass('selectedClass');
            $(this).siblings('label').not(this).siblings('label').removeClass('selectedClass');
        });


        if ($('.variant-check-value:checked').length > 0) {
            getSpecificProductByVariants();
        }

        $('.variant-check-value').on('change', function () {
            getSpecificProductByVariants();
        });


    });

    function getSpecificProductByVariants() {
        var selectedValues = {};

        $('.variant-check-value:checked').each(function () {
            let name = $(this).attr("name");
            let value = $(this).val();
            selectedValues[name] = value;
        });

        var productId = "{{ $product->id }}";
        var csrfToken = "{{ csrf_token() }}";
        $.ajax({
            type: 'POST',
            url: "{{ route('product.find') }}",
            data: {
                id: productId,
                variants: selectedValues,
                _token: csrfToken
            },
            success: function (response) {
                var hasProductDiscount = @json($product->show_product_discount);
                $('#selectedVariants').val(JSON.stringify(response.variants));

                if (hasProductDiscount) {
                    $('.productVariantPrice').text(`TK${response.show_product_variant_discount_price}`);
                    $('.productVariantComparePrice').text(`TK${response.selling_price}`);

                } else {
                    $('.productVariantPrice').text(`TK${response.selling_price}`);
                }
            }
        });
    }
</script>
