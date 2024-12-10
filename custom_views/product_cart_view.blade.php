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

            <form action="#" method="POST" enctype="multipart/form-data" class="addToCart">
                @csrf
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
                        <input type="text" class="form-control product_qty text-center" id="countInput" name="quantity"
                               value="1">
                        <button type="button" class="increment"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="cart-btn">
                        <button class="addToCart"
                                data-product_id="{{ $product->id }}"
                                data-name="{{ $product->name }}" data-price="{{ $product->selling_price }}"><i
                                    class="fa-solid fa-cart-plus"></i>@lang('add to cart')</button>
                    </div>
                </div>

                <input type="hidden" value="{{ $product->id }}" name="id">
                <input type="hidden" value="{{ $product->title }}" name="name">
                <input type="hidden" value="{{ $product->image }}" name="image">
                <input type="hidden" value="{{ $product->selling_price }}" name="price">
                <input type="hidden" value="" name="variants" id="selectedVariants">
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

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


        var count = 1;

        $(".increment").on("click", function () {
            count++;
            updateInputValue();
        });

        $(".decrement").on("click", function () {
            if (count > 1) {
                count--;
                updateInputValue();
            }
        });

        function updateInputValue() {
            $("#countInput").val(count);
        }


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

                if (hasProductDiscount){
                    $('.productVariantPrice').text(`TK${response.show_product_variant_discount_price}`);
                    $('.productVariantComparePrice').text(`TK${response.selling_price}`);

                } else {
                    $('.productVariantPrice').text(`TK${response.selling_price}`);
                }
            }
        });
    }
</script>
