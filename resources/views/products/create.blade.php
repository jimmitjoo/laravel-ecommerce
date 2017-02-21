@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('admin.products.store') }}" method="post">
                {{ csrf_field() }}

                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('products.product information') }}</div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="name">{{ __('products.name') }}</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="{{ __('products.name') }}">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" rows="5" placeholder="{{ __('products.description') }}"></textarea>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{ __('default.save') }}">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ __('products.product meta') }}</div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label for="categories">{{ __('categories.category') }}</label>

                                <select class="form-control selectpicker" title="{{ __('default.choose') }}" name="categories[]" id="categories" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('products.price') }}</label>
                                <div class="input-group">
                                    <input class="form-control" type="number" min="0.00" max="9999999.00" name="price" id="price">
                                    <div class="input-group-addon">{{ env('ECOMMERCE_CURRENCY_SIGN') }}</div>
                                </div>
                            </div>

                            <input class="btn btn-primary" type="submit" value="{{ __('default.save') }}">

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection