@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-0">@lang('Hello'), {{ auth()->guard('web')->user()->name }} </div>

                    <div class="card-body">
                        {{   __('Welcome to your Dashboard') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
