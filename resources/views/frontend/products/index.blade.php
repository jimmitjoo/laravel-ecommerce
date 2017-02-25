@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <td>{{ __('products.name') }}</td>
                                <td>{{ __('products.price') }}</td>
                            </tr>
                            </thead>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('frontend.products.show', ['id' => $product->id]) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->price }} {{ env('ECOMMERCE_CURRENCY_SIGN') }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="text-center"> {{ $products->links() }} </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection