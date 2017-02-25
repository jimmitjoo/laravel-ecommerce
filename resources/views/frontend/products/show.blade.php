@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">

                        Bild

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{ $product->name }}</h1></div>

                    <div class="panel-body">

                        {{ $product->price }} {{ env('ECOMMERCE_CURRENCY_SIGN') }}

                        <hr>

                        <addtocart product-id="{{ $product->id }}" product-amount="1"></addtocart>

                        <hr>

                        {{ $product->description }}

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">

                        @if (auth()->check())
                            <div class="btn btn-default">Redigera</div>@endif

                        @include('frontend.products.partials.categories', $product)

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection