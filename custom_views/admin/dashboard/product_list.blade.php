@extends('layouts.app')
@section('title', 'ThemeLooks Test')
@section('content')
    <div class="container">
        <div class="row m-auto d-flex justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0">
                        <h5>@lang('Product List')</h5>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">@lang('SL').</th>
                                <th scope="col">@lang('Product')</th>
                                <th scope="col">@lang('SKU')</th>
                                <th scope="col">@lang('Total Variants')</th>
                                <th scope="col">@lang('Created Time')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $key => $product)
                                <tr>

                                    <th>{{ ++$key }}</th>
                                    <th scope="row">
                                        <div class="product_quantity d-flex align-items-center justify-content-left">
                                            <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="product_img" width="10%" height="10%" me-3="" class="img-fluid me-3">
                                            <p class="text-center">{{ $product->name }}</p>
                                        </div>

                                    </th>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->total_variants }}</td>
                                    <td>{{ customDate($product->created_at) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center p-2 flex-column text-danger">
                                        @lang('Product not found')
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>

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
        </div>
    </div>

@endsection

@push('script')

@endpush
