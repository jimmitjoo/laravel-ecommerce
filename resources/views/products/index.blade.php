@extends('layouts.serverside')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Product meta</div>

                    <div class="panel-body">


                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>

                    <div class="panel-body">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>{{ __('products.name') }}</td>
                                    <td>{{ __('products.price') }}</td>
                                    <td class="text-right">{{ __('default.edit') }}</td>
                                    <td class="text-right">{{ __('default.delete') }}</td>
                                </tr>
                            </thead>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('admin.products.show', ['id' => $product->id]) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->price }} {{ env('ECOMMERCE_CURRENCY_SIGN') }}</td>
                                    <td class="text-right"><a href="{{ route('admin.products.edit', ['id' => $product->id]) }}">{{ __('default.edit') }}</a></td>
                                    <td class="text-right"><a href="{{ route('admin.products.delete', ['id' => $product->id]) }}">{{ __('default.delete') }}</a></td>
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