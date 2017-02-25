@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h1>Kategori: {{ $category->name }}</h1>
            </div>
        </div>

        <div id="products" class="row list-group">
            @foreach($category->products as $product)
                <div class="item  col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="row">
                        <img class="col-xs-12" src="http://placehold.it/400x250/000/fff" alt=""/>
                    </div>
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            <a href="{{ route('frontend.products.show', $product->id) }}">{{ $product->name }}</a></h4>
                        <p class="group inner list-group-item-text">
                            {{ $product->description }}</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    {{ $product->price }} {{ env('ECOMMERCE_CURRENCY_SIGN') }}</p>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" style="width: 100%" href="#">Köp</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection