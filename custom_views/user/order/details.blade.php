@extends('layouts.app')
@section('title', 'Order Details')

@section('content')
    <div class="container">
        <div class="row m-auto d-flex justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header border-0">
                        <h5>@lang('Order Details')</h5>
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">@lang('Product')</th>
                                <th scope="col">@lang('Variant')</th>
                                <th scope="col">@lang('Quantity')</th>
                                <th scope="col">@lang('Price')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetails->purchase_details as $key => $purchase_details)
                                <tr>
                                    <th scope="row">
                                        {{ $purchase_details['product_name'] }}
                                    </th>
                                    <td>{{ $purchase_details['product_variant'] }}</td>
                                    <td>{{ $purchase_details['product_quantity'] }}</td>
                                    <td>{{ $purchase_details['product_price'] }} TK</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


