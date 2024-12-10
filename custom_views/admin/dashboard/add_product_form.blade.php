@extends('layouts.app')
@section('title', 'ThemeLooks Test')
@section('content')
    <div class="container">
        <div class="row m-auto d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0">
                        <h5>@lang('Add Product')</h5>
                    </div>

                    <div class="card-body">

                        <div class="hrader-search-input select-option w-100 mb-4">
                            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="variantsComObj" id="getVariantsComObjInput" value="">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">@lang('Name')</label>
                                    <input type="text" name="name" class="@error('name') is-invalid @enderror"
                                           id="productName">
                                    @error('name')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="productSku" class="form-label">@lang('SKU')</label>
                                    <input type="text" name="sku" class="@error('sku') is-invalid @enderror"
                                           id="productSku">
                                    @error('sku')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="productUnit" class="form-label">@lang('Unit')</label>
                                    <div class="input-group mb-3">
                                        <input type="text" name="unit_quantity"
                                               onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                                               class="form-control @error('unit_quantity') is-invalid @enderror"
                                               placeholder="Ex. 5pieces, 1kg, 3litters" id="productUnit">
                                        <select class="input-group-text" name="unit_value">
                                            <option value="pieces">@lang('Pieces')</option>
                                            <option value="kg">@lang('Kg')</option>
                                            <option value="litters">@lang('Litters')</option>
                                        </select>
                                    </div>
                                    @error('unit_quantity')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="js-add-field card mb-3 mb-lg-5">
                                    <div class="card-header card-header-content-sm-between">
                                        <h5 class="card-header-title mb-2 mb-sm-0">@lang('Product Variants')</h5>
                                    </div>

                                    <div id="generate-variant-options">

                                    </div>

                                    <div class="card-footer">
                                        <button type="button" class="js-create-field btn btn-sm btn-primary"
                                                id="addNewOption">
                                            <i class="bi-plus"></i> @lang('Add variant')
                                        </button>
                                    </div>

                                    <div id="createdOptionValue">

                                    </div>

                                </div>


                                <div class="mb-3">
                                    <label for="productDiscount" class="form-label">@lang('Discount') (%)</label>
                                    <input type="text" name="discount"
                                           class="@error('discount') is-invalid @enderror"
                                           id="productDiscount">
                                    @error('discount')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="productTax" class="form-label">@lang('Tax') (%)</label>
                                    <input type="text" name="tax"
                                           class="@error('tax') is-invalid @enderror"
                                           id="productTax">
                                    @error('tax')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="productImage" class="form-label">@lang('Image')</label>
                                    <input type="file" name="image"
                                           class="@error('image') is-invalid @enderror"
                                           id="productImage">
                                    @error('image')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-1">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="edit-variants">
        <div class="modal fade" id="combinationModals" tabindex="-1" aria-labelledby="exampleModalLabel2"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel2"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="variants-prize">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="price-box">
                                        <span class="price">@lang('Purchase Price')</span>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="modalPurchasePrice"
                                                   placeholder="0.00">
                                        </div>
                                        <span class="validationMessage"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="price-box">
                                        <span class="price">@lang('Selling Price')</span>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="modalSellingPrice"
                                                   placeholder="0.00">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="price-box">
                                        <span>@lang('Variant SKU (Stock Keeping Unit)')</span>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="modalVariantSku"
                                                   placeholder="stock keeping unit">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="cencle" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="button" class="done"
                                id="updateCombinationObjSpecificByVariantsName">@lang('Done')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            renderVariantFromLocalStorage();
            $(document).on("click", "#addNewOption", function () {
                var newVariant = `<div class="variant-input">
                                    <div class="card-body variant-option" style="border-bottom:1px solid #d1cccc">
                                        <div class="mb-2">
                                            <label for="">Option name</label>
                                            <div class="mb-2 d-flex">
                                                <select class="form-select" name="option_name[]">
                                                    <option value="Color"> Color </option>
                                                    <option value="Size"> Size </option>
                                                    <option value="Weight"> Weight </option>
                                                </select>
                                                <a href="javascript:void(0)" class="text-danger remove-option p-2"><i class="fa-regular fa-trash-can deleteIcon" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="mb-2" id="newField">
                                            <label for="">Option values</label>
                                            <div class="mb-2 d-flex">
                                                <input type="text" class="form-control add_field" name="option_values[]" placeholder="">
                                                <a href="javascript:void(0)" class="text-danger removeNewInputOption"> <i class="fa-regular fa-trash-can mx-2 mt-2 deleteIcon" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;

                $("#generate-variant-options").append(newVariant);
            });
        });

        $(document).on('keyup', ".add_field", function (e) {
            let inputValue = $(this).val();
            var $variantInputs = $(this).closest('.variant-input').find('.add_field');
            var lastInputValue = $variantInputs.last().val();

            if (inputValue.length !== 0 && lastInputValue.length !== 0) {
                let markup = `<div class="mb-2 d-flex">
                                    <input type="text" class="form-control add_field" name="option_values[]" placeholder="">
                                    <a href="javascript:void(0)" class="text-danger removeNewInputOption p-2"><i class="fa-regular fa-trash-can deleteIcon" aria-hidden="true"></i></a>
                                </div>`;

                var $newField = $(markup);

                $(this).closest('.variant-input').find(".variant-option").append($newField);
                $(this).closest('.variant-input').find(".done-button").remove();

                var $doneButton = $('<button type="button" class="done-button">Done</button>');
                $(this).closest('.variant-input').find(".variant-option").append($doneButton);
            }
        });

        $("#generate-variant-options").on("click", ".remove-option", function () {
            $(this).parent().parent().parent().remove();
        });

        $(document).on("click", ".removeNewInputOption", function () {
            $(this).parent().remove();
        });

        $(document).on('click', '.done-button', function () {
            let $variantType = $(this).closest('.variant-input').find('option:selected').val();
            var nonEmptyValues = [];

            $(this).closest('.variant-input').find('.add_field').each(function () {
                var value = $(this).val().trim().toLowerCase();
                if (value !== "" && nonEmptyValues.indexOf(value) === -1) {
                    nonEmptyValues.push(value);
                }
            });
            const newVariants = nonEmptyValues.map(function (item, index) {
                return {
                    varient_type: $variantType,
                    varient_name: item,
                };
            });

            let Variants = {};
            Variants[$variantType] = newVariants;
            var newArr = JSON.parse(localStorage.getItem('variantsItem')) ?? [];
            var isUnique = !newArr.some(function (item) {
                return JSON.stringify(item).toLowerCase() === JSON.stringify(Variants).toLowerCase();
            });
            var keyExists = false;

            if (isUnique) {
                var sortedNewArr = newArr.map(function (item, key) {
                    if (Object.keys(item) == $variantType) {
                        keyExists = true;
                        item = Variants;
                    }
                    return item;
                });
                if (!keyExists) {
                    sortedNewArr.push(Variants);
                }
                localStorage.setItem('variantsItem', JSON.stringify(sortedNewArr));
            }
            $(this).parent().parent().remove();
            renderVariantFromLocalStorage();

            $('#getVariantsComObjInput').val(localStorage.getItem('variantsComObj') || []);
        });

        $("#generate-variant-options").on("click", ".remove-option-from-local-storage", function () {
            var $optionName = $(this).closest('.variant-option').find('select[name="option_name[]"]').val();
            var $optionValues = $(this).closest('.variant-option').find('.add_field').map(function () {
                return $(this).val();
            }).get();
            var storedData = JSON.parse(localStorage.getItem('variantsItem')) || [];
            var newData = storedData.filter(function (item) {
                return !(item[$optionName] && item[$optionName].every(function (value) {
                    return $optionValues.includes(value.varient_name);
                }));
            });
            localStorage.setItem('variantsItem', JSON.stringify(newData));
            $(this).closest('.variant-option').remove();
            renderVariantFromLocalStorage()

            var newVariantsComObj = createHTMLCombinationObj(null, newData);
            localStorage.setItem('variantsComObj', JSON.stringify(newVariantsComObj));
            $('#getVariantsComObjInput').val(JSON.stringify(localStorage.getItem('variantsComObj') || []));
        });

        $(document).on('click', '.combination-modal', function () {
            var combinationDetails = [];
            var variantName = '';

            $(this).closest('.variants').find('.variants-name').each(function () {
                combinationDetails.push($(this).text().trim());
                variantName += $(this).text().trim();
            });

            updateModalContent(combinationDetails);
            $('#combinationModals').modal('show');
        });

        $(document).on('click', '#updateCombinationObjSpecificByVariantsName', function () {
            let variantName = $('#combinationModals').data('variantName');
            let modalVariantSku = $('#modalVariantSku').val();
            let modalPurchasePrice = $('#modalPurchasePrice').val();
            let modalSellingPrice = $('#modalSellingPrice').val();

            let newVariantsComObj = JSON.parse(localStorage.getItem('variantsComObj')) || [];

            let variantIndex = newVariantsComObj.findIndex(variant => variant.variant_name === variantName);

            if (variantIndex !== -1) {
                // Update the specific variant
                newVariantsComObj[variantIndex].purchase_price = modalPurchasePrice;
                newVariantsComObj[variantIndex].selling_price = modalSellingPrice;
                newVariantsComObj[variantIndex].variants_sku = modalVariantSku;

                $('#combinationModals').modal('hide');

            }

            localStorage.setItem('variantsComObj', JSON.stringify(newVariantsComObj));

            $('#getVariantsComObjInput').val(localStorage.getItem('variantsComObj'));

            let variantSku = $(`.variants-name:contains('${variantName}')`).closest('.variants').find('.variants-sku p');
            variantSku.text(`SKU: ${modalVariantSku ? modalVariantSku : 'Not Set'}`);

        });


        // function
        function renderVariantFromLocalStorage() {
            $('#generate-variant-options').html('');
            var newAraaar = JSON.parse(localStorage.getItem('variantsItem')) ?? [];
            var combinations = createCombinations(newAraaar)
            $('#createdOptionValue').html('');

            var $createHTMLCombinationArr = []
            combinations.forEach(combination => {
                let htmlCode = createHTMLCombination(combination);
                let makeComObj = {
                    purchase_price: 0,
                    selling_price: 0,
                    variants_sku: '',
                }
                makeComObj.variants = {};

                let makeComObj_variant_name = ``;
                Object.keys(combination).forEach((key, index, array) => {
                    makeComObj_variant_name += `${combination[key] || ""}`;
                    if (index < array.length - 1) {
                        makeComObj_variant_name += ' / ';
                    }
                    makeComObj.variants[key] = combination[key];
                });
                makeComObj.variant_name = makeComObj_variant_name;

                let combOjb = createHTMLCombinationObj(combination);
                $createHTMLCombinationArr.push(combOjb)

                localStorage.setItem('variantsComObj', JSON.stringify($createHTMLCombinationArr));
                $('#createdOptionValue').append(htmlCode);
            });

            let $html = ``;

            newAraaar.map(function (item, outerIndex) {
                $html += `<div class="variants-option variants-listed p-3 mt-2">
                                            <div class="variants-option-box d-flex align-items-center justify-content-between" id="variants-option-box-edit">
                                                <div class="variant-icon d-flex align-items-center">
                                                    <div class="variants-color">
                                                        <h5>${Object.keys(item)}</h5> <div class="d-flex flex-wrap">`;

                Object.values(item).forEach(function (innerArray) {
                    innerArray.forEach(function (subItem) {
                        $html += `<span>${subItem.varient_name}</span>`;
                    });
                });
                $html += `</div>
                        </div>
                    </div>
                        <div class="variants-edit-btn">
                            <button type="button" id="generated-variant-options-edit">edit</button>
                        </div>
                    </div>
                </div>`;
            })
            $('#generate-variant-options').append($html);
        }

        $(document).on('click', '#generated-variant-options-edit', function () {
            let storedVariants = JSON.parse(localStorage.getItem('variantsItem')) || [];
            let variantType = $(this).closest('.variants-option-box').find('h5').text();
            let $parentElement = $(this).parent().parent().parent();
            let selectedVariants = storedVariants.find(item => Object.keys(item) == variantType);

            if (selectedVariants) {
                let $html = ``;
                $html += `<div class="variant-input">
                                <div class="card-body variant-option" style="border-bottom:1px solid #d1cccc">
                                    <div class="mb-2">
                                        <label for="">Option name</label>
                                        <div class="mb-2 d-flex">
                                            <select class="form-select" name="option_name[]">
                                                <option value="${variantType}">${variantType}</option>
                                            </select>
                                            <button class="btn-sm remove-option-from-local-storage p-2 bg-white text-danger" type="button"><i class="fa-regular fa-trash-can deleteIcon" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <div class="mb-2" id="newField">
                                         <label for="">Option values</label>`

                selectedVariants[variantType].forEach(variant => {
                    $html += `<div class="mb-2 d-flex">
                                             <input type="text" class="form-control add_field" name="option_values[]" value="${variant.varient_name}" placeholder="">
                                             <button class=" btn-sm removeNewInputOption p-2 text-danger bg-white"><i class="fa-regular fa-trash-can deleteIcon" aria-hidden="true"></i></button>
                                         </div>`;
                });

                $html += `<div class="mb-2 d-flex">
                                            <input type="text" class="form-control add_field" name="option_values[]" placeholder="">
                                            <button class="btn-sm removeNewInputOption p-2 text-danger bg-white"><i class="fa-regular fa-trash-can deleteIcon" aria-hidden="true"></i></button>
                                          </div>
                                          <button type="button" class="done-button">Done</button>
                                      </div>
                                    </div>
                                </div>`;
                $parentElement.after($html);
            }
            $parentElement.remove();
        });

        function createCombinations(data) {
            const combinations = [];
            data.forEach(category => {
                const key = Object.keys(category)[0];
                const variants = category[key];
                if (combinations.length === 0) {
                    combinations.push(...variants.map(variant => ({[key]: variant.varient_name})));
                } else {
                    const newCombinations = [];
                    combinations.forEach(combination => {
                        variants.forEach(variant => {
                            newCombinations.push({...combination, [key]: variant.varient_name});
                        });
                    });
                    combinations.length = 0;
                    combinations.push(...newCombinations);
                }
            });
            return combinations;
        }

        function createHTMLCombination(combination) {
            const combinationObj = JSON.stringify(combination);
            let combinationName = ''
            let htmlCode = '';

            Object.keys(combination).forEach((key, index, array) => {
                combinationName += combination[key];
                if (index < array.length - 1) {
                    combinationName += ' / ';
                }
            });

            htmlCode += `<div class="variants">
                            <div class="variants-box d-flex flex-wrap align-items-center justify-content-between p-2">
                                <div class="variant-content d-flex align-items-center">
                                    <div class="variants-name">${combinationName}</div>
                                </div>

                                <div class="variants-details">
                                    <div class="variants-sku">
                                        <p></p>
                                    </div>
                                </div>


                                <div class="variants-details variants-edit-btn">
                                    <button type='button' class="combination-modal" data-all-variant="${combinationObj}" data-toggle="modal" data-target="#combinationModals">Edit</button>
                                </div>
                            </div>
                        </div>`;
            return htmlCode;
        }

        function createHTMLCombinationObj(combination, makeComObj = null) {
            if (makeComObj == null) {
                let makeComObj = {
                    purchase_price: 0,
                    selling_price: 0,
                    variants_sku: '',
                }
                makeComObj.variants = {};

                let makeComObj_variant_name = ``;
                Object.keys(combination).forEach((key, index, array) => {
                    makeComObj_variant_name += `${combination[key] || ""}`;
                    if (index < array.length - 1) {
                        makeComObj_variant_name += ' / ';
                    }
                    makeComObj.variants[key] = combination[key];
                });
                makeComObj.variant_name = makeComObj_variant_name;

                return makeComObj;
            }

            return makeComObj;
        }

        function updateModalContent(combinationDetails) {
            $('#exampleModalLabel2').text(`Edit Variant : ${combinationDetails.join('/')}`);
            $('#combinationModals').data('variantName', combinationDetails.join(''));

            let variantsComObj = JSON.parse(localStorage.getItem('variantsComObj')) || [];
            let variantName = $('#combinationModals').data('variantName');
            let variantToUpdate = variantsComObj.find(function (variant) {
                return variant.variant_name === variantName;
            });

            if (variantToUpdate) {
                $('#modalPurchasePrice').val(variantToUpdate.purchase_price);
                $('#modalSellingPrice').val(variantToUpdate.selling_price);
                $('#modalVariantSku').val(variantToUpdate.variants_sku);
            }
        }

    </script>
@endpush
