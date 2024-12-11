@extends('layouts.app')
@section('title', 'Order List')

@push('extra_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/flatpickr.min.css') }}"/>
@endpush

@section('content')
    <div class="container">
        <div class="row m-auto d-flex justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header border-0">
                        <h5>@lang('Order List')</h5>
                    </div>


                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="hrader-search-input select-option w-100 mb-4">
                                        <input type="text" name="purchase_code" class="soValue optionSearch"
                                               id="searchInput"
                                               placeholder="purchase code" aria-label="Search"
                                               value="{{ old('purchase_code', request()->purchase_code) }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="hrader-search-input select-option w-100 mb-4">
                                        <div class="input-group flatpickr">
                                            <input type="date" placeholder="@lang('From Date')"
                                                   class="form-control from_date" name="from_date"
                                                   value="{{ old('from_date',request()->from_date) }}" data-input/>
                                            <div class="input-group-append" readonly="">
                                                <div class="form-control">
                                                    <a class="input-button cursor-pointer" title="clear" data-clear>
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="hrader-search-input select-option w-100 mb-4 flatpickr">
                                        <div class="input-group">
                                            <input type="date" placeholder="@lang('To Date')"
                                                   class="form-control to_date" name="to_date"
                                                   value="{{ old('to_date',request()->to_date) }}" data-input/>
                                            <div class="input-group-append" readonly="">
                                                <div class="form-control">
                                                    <a class="input-button cursor-pointer" title="clear" data-clear>
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="hrader-search-input select-option w-100 mb-4">
                                        <button class="cmn_btn w-100" type="submit">
                                            <i class="fal fa-search" aria-hidden="true"></i>
                                            @lang('Search')
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">@lang('SL').</th>
                                <th scope="col">@lang('Purchase Code')</th>
                                <th scope="col">@lang('Sub Total')</th>
                                <th scope="col">@lang('Discount')</th>
                                <th scope="col">@lang('Tax')</th>
                                <th scope="col">@lang('Total')</th>
                                <th scope="col">@lang('Order Date')</th>
                                <th scope="col">@lang('action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $key => $order)
                                <tr>

                                    <th>{{ ++$key }}</th>
                                    <th scope="row">
                                        {{ $order->purchase_code }}
                                    </th>
                                    <td>৳{{ number_format($order->sub_total) }}</td>
                                    <td>৳{{ number_format($order->discount) }}</td>
                                    <td>৳{{ number_format($order->tax) }}</td>
                                    <td>৳{{ number_format($order->grand_total) }}</td>
                                    <td>{{ customDate($order->created_at) }}</td>
                                    <td>
                                        <a href="{{ route('admin.order.details', $order->id) }}" class="btn btn-sm text-white" style="background: #61ce70"> @lang('Details') </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center p-2 flex-column text-danger">
                                        @lang('Order not found')
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>

                        <div class="pagination_area">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{ $orders->appends($_GET)->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js-lib')
    <script src="{{ asset('assets/js/flatpickr.min.css') }}"></script>
@endpush

@push('script')
    <script>
        'use strict'
        $('.from_date').on('change', function () {
            $('.to_date').removeAttr('disabled');
        });

        $(document).ready(function () {
            $(".flatpickr").flatpickr({
                wrap: true,
                altInput: true,
                dateFormat: "Y-m-d H:i",
            });
        })

    </script>
@endpush
